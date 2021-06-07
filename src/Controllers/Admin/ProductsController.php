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
        $searchTermSql = strtolower("%$searchTerm%");
        $stmt = $this->database->prepare("SELECT COUNT(*) FROM products WHERE lower(product_name) LIKE ?");
        $stmt->bind_param('s', $searchTermSql);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_row();

        $pageSize = is_numeric($pageSize) ? intval($pageSize) : 20;
        $pageNumber = is_numeric($pageNumber) ? intval($pageNumber) : 1;

        $count = $result[0];
        $totalPages = (int)ceil($count / $pageSize);

        $pageNumber = max(1, min($pageNumber, $totalPages));
        $stmt = $this->database->prepare(
            "SELECT * FROM (SELECT product_name, product_price, id, (ROW_NUMBER() OVER (ORDER BY product_price ASC)) AS R FROM products WHERE lower(product_name) LIKE ?) a WHERE a.R BETWEEN (? - 1) * ? + 1 AND ? * ?;");
        $stmt->bind_param("siiii", $searchTermSql, $pageNumber, $pageSize, $pageNumber, $pageSize);
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

    /**
     * @throws NotFoundHttpException
     */
    public function create()
    {
        return $this->view("admin.products.create");
    }

    public function store(Request $request)
    {
        $productName = trim($request->input('productName', ''));
        $productDescription = trim($request->input('productDescription', ''));
        $productPrice = trim($request->input('productPrice', '0'));

        $errors = [];
        if ($productName == '')  {
            $errors['productName'] = 'Product name cannot be empty';
        }

        if ($productDescription == '')  {
            $errors['productDescription'] = 'Product description cannot be empty';
        }

        if ($productPrice == '0' || !is_numeric($productPrice)) {
            $errors['productPrice'] = 'Invalid product price';
        }

        $prevUrl = $request->header("referer");
        if (!empty($errors)) {
            $this->sessionManager->set('form_errors', $errors);
            return $this->response->redirect($prevUrl);
        }

        $stmt = $this->database->prepare("INSERT INTO products (product_name, product_price, description) VALUES (?, ?, ?)");
        $stmt->bind_param('sis', $productName, $productPrice, $productDescription);

        if (!$stmt->execute()) {
            $this->sessionManager->set('error', 'Unexpected error. Please try again later.');
            return $this->response->redirect($prevUrl);
        }

        $id = $this->database->insert_id;
        return $this->response->redirect("/admin/products/${id}");
    }

    public function update($id, Request $request)
    {
        $productName = trim($request->input('productName', ''));
        $productDescription = trim($request->input('productDescription', ''));
        $productPrice = trim($request->input('productPrice', '0'));

        $errors = [];
        if ($productName == '')  {
            $errors['productName'] = 'Product name cannot be empty';
        }

        if ($productDescription == '')  {
            $errors['productDescription'] = 'Product description cannot be empty';
        }

        if ($productPrice == '0' || !is_numeric($productPrice)) {
            $errors['productPrice'] = 'Invalid product price';
        }

        $prevUrl = $request->header("referer");
        if (!empty($errors)) {
            $this->sessionManager->set('form_errors', $errors);
            return $this->response->redirect($prevUrl);
        }

        $stmt = $this->database->prepare("UPDATE products SET product_name = ?, product_price = ?, description = ? WHERE id = ?");
        $stmt->bind_param('sisi', $productName, $productPrice, $productDescription, $id);

        if (!$stmt->execute()) {
            $this->sessionManager->set('error', 'Unexpected error. Please try again later.');
            return $this->response->redirect($prevUrl);
        }

        return $this->response->redirect($prevUrl);
    }

    public function delete($id)
    {
        $stmt = $this->database->prepare('DELETE FROM products WHERE id = ?');
        $stmt->bind_param('i', $id);

        if (!$stmt->execute()) {
            return json_encode(["error" => "Unexpected error occurred.Please try again later."]);
        }

        return json_encode(["success" => true]);
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

    function deleteProductImage($id, $imgId, Request $request) {
        $stmt = $this->database->prepare("DELETE FROM product_images WHERE product_id = ? AND id = ?");
        $stmt->bind_param('ii', $id, $imgId);
        header("content-type: application/json");

        if (!$stmt->execute()) {
            return json_encode(["error" => "Cannot delete image"]);
        }

        return json_encode(["success" => true]);
    }
}