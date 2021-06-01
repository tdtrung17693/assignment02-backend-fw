<?php


namespace Controllers\Admin;


use Controllers\BaseController;
use Database;
use NotFoundHttpException;
use Request;
use Response;
use SessionManager;

class ProductsController extends BaseController
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
        $result = $this->database->query("SELECT COUNT(*) FROM products");

        $pageSize = is_numeric($pageSize) ? intval($pageSize) : 20;
        $pageNumber = is_numeric($pageNumber) ? intval($pageNumber) : 1;

        $count = $result->fetch_row()[0];
        $totalPages = (int)ceil($count / $pageSize);

        $pageNumber = max(1, min($pageNumber, $totalPages));

        $stmt = $this->database->prepare(
            "SELECT * FROM (SELECT product_name, product_price, id, (ROW_NUMBER() OVER (ORDER BY product_price ASC)) AS R FROM products) a WHERE a.R BETWEEN (? - 1) * ? + 1 AND ? * ?;");
        $stmt->bind_param("iiii", $pageNumber, $pageSize, $pageNumber, $pageSize);
        $stmt->execute();

        $products = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        $pagination = [
            'next' => $pageNumber < $totalPages,
            'prev' => $pageNumber > 1,
            'current' => $pageNumber,
            'display' => pagination($pageNumber, $totalPages)
        ];

        return $this->view('admin.products.list', [
            'title' => 'Products',
            'products' => $products,
            'pagination' => $pagination
        ]);
    }

    /**
     * @throws NotFoundHttpException
     */
    public function show($id)
    {
        $id = intval($id);
        $stmt = $this->database->prepare(
            "SELECT * FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $product = $stmt->get_result()->fetch_assoc();

        $stmt = $this->database->prepare("SELECT * FROM product_images WHERE product_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $images = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        if (!$product) {
            throw new NotFoundHttpException;
        }

        return $this->view("admin.products.show", ['product' => $product, 'images' => $images]);
    }

    public function createProductImage($id, Request $request)
    {
        $uploadedFile = $request->file('imageFile');

        $path = config("UPLOAD_PATH") . DIRECTORY_SEPARATOR . "product_images";
        $uploadedPath = $uploadedFile->store($path);
        $prevUrl = $request->header("referer");

        if (!$uploadedPath) {
            $this->sessionManager->set("error", "Cannot upload new product image");
            return $this->response->redirect($prevUrl);
        }

        $filePath = str_replace("/app/public", "", $uploadedPath);
        $stmt = $this->database->prepare("INSERT INTO product_images (image_path, product_id) VALUES (?, ?)");
        $stmt->bind_param("si", $filePath, $id);

        if (!$stmt->execute()) {
            $this->sessionManager->set("error", "Cannot upload new product image");
        }

        return $this->response->redirect($prevUrl);
    }
}