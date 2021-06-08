<?php


namespace Controllers\Admin;


use Controllers\BaseController;
use Database;
use NotFoundHttpException;
use Request;
use Response;
use SessionManager;

class UsersController extends BaseController
{
    private Database $database;
    private SessionManager $sessionManager;

    public function __construct(Database $database, SessionManager $sessionManager)
    {
        $this->database = $database;
        $this->sessionManager = $sessionManager;
    }

    public function index(Request $request): Response
    {
        $pageSize = $request->input('pageSize');
        $pageNumber = $request->input('pageNumber', 1);
        $searchTerm = $request->input('searchTerm', '');
        $searchTermSql = strtolower("%$searchTerm%");
        $stmt = $this->database->prepare("SELECT COUNT(*) FROM users WHERE lower(username) LIKE ? OR lower( fname ) LIKE ? OR lower(lname) LIKE ?");
        $stmt->bind_param('sss', $searchTermSql, $searchTermSql, $searchTermSql);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_row();

        $pageSize = is_numeric($pageSize) ? intval($pageSize) : 20;
        $pageNumber = is_numeric($pageNumber) ? intval($pageNumber) : 1;

        $count = $result[0];
        $totalPages = (int)ceil($count / $pageSize);

        $pageNumber = max(1, min($pageNumber, $totalPages));
        $stmt = $this->database->prepare(
            "SELECT * FROM (SELECT username, fname, lname, email, id, (ROW_NUMBER() OVER (ORDER BY username ASC)) AS R FROM users WHERE lower(username) LIKE ? OR lower( fname ) LIKE ? OR lower(lname) LIKE ?) a WHERE a.R BETWEEN (? - 1) * ? + 1 AND ? * ?;");
        $stmt->bind_param("sssiiii", $searchTermSql, $searchTermSql, $searchTermSql, $pageNumber, $pageSize, $pageNumber, $pageSize);
        $stmt->execute();

        $users = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        $pagination = [
            'next' => $pageNumber < $totalPages,
            'prev' => $pageNumber > 1,
            'current' => $pageNumber,
            'display' => pagination($pageNumber, $totalPages)
        ];

        return $this->view('admin.users.list', [
            'title' => 'Users',
            'users' => $users,
            'pagination' => $pagination,
            'searchTerm' => $searchTerm
        ]);
    }

    /**
     * @throws NotFoundHttpException
     */
    public function show($id)
    {
        $id = intval($id);
        $stmt = $this->database->prepare(
            "SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $user = $stmt->get_result()->fetch_assoc();

        if (!$user) {
            throw new NotFoundHttpException;
        }

        return $this->view("admin.users.show", ['user' => $user]);
    }

    /**
     * @throws NotFoundHttpException
     */
    public function create()
    {
        return $this->view("admin.users.create");
    }

    public function store(Request $request)
    {
    }

    public function update($id, Request $request)
    {
    }

    public function delete($id)
    {
        $stmt = $this->database->prepare('DELETE FROM users WHERE id = ?');
        $stmt->bind_param('i', $id);

        if (!$stmt->execute()) {
            return json_encode(["error" => "Unexpected error occurred.Please try again later."]);
        }

        return json_encode(["success" => true]);
    }
}