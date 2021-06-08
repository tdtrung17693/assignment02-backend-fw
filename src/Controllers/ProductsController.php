<?php

namespace Controllers;

use Database;
use Request;

class ProductsController extends BaseController
{
    protected Database $database;
    protected \SessionManager $sessionManager;

    public function __construct(Database $database, \SessionManager $sessionManager)
    {
        $this->database = $database;
        $this->sessionManager = $sessionManager;
    }

    public function index()
    {
        $queryNewProduct = $this->database->query("SELECT product_name, products.id id, pi.id pid, product_price, description, image_path FROM products LEFT JOIN product_images pi on pi.id = (SELECT id FROM product_images WHERE product_id = products.id LIMIT 1) LIMIT 8");
        $query = $this->database->query("SELECT product_name, products.id id, pi.id pid, product_price, description, image_path FROM products LEFT JOIN product_images pi on pi.id = (SELECT id FROM product_images WHERE product_id = products.id LIMIT 1) LIMIT 12");

        $products = $query->fetch_all(MYSQLI_ASSOC);
        $newProducts = $queryNewProduct->fetch_all(MYSQLI_ASSOC);

        return $this->view('products', ['products' => $products, 'newProducts' => $newProducts]);
    }

    public function loadMore(Request $request)
    {
        $pageSize =  intval($request->input('pageSize', '12'));
        $pageNumber = intval($request->input('pageNumber', '1'));

        $offset = ($pageNumber - 1) * $pageSize;

        $stmt = $this->database->prepare("SELECT product_name, products.id id, pi.id pid, product_price, description, image_path FROM products LEFT JOIN product_images pi on pi.id = (SELECT id FROM product_images WHERE product_id = products.id LIMIT 1) LIMIT ? OFFSET ?");
        $stmt->bind_param('ii', $pageSize, $offset);
        $stmt->execute();
        $products = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $loadMore = count($products) == $pageSize;

        return json_encode([
            'products' =>  $products,
            'loadMore' => $loadMore
        ]);
    }

    public function show($id)
    {
        $stmt = $this->database->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $product = $stmt->get_result()->fetch_array(MYSQLI_ASSOC);
        if (!$product) {
            throw new \NotFoundHttpException();
        }

        $stmt = $this->database->prepare("SELECT * FROM product_images WHERE product_id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $images = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        $stmt = $this->database->prepare("SELECT content, username, time FROM comment INNER JOIN users ON comment.user_id = users.id WHERE product_id = ? ORDER BY time DESC");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $comments = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $this->view('product-details', ['product' => $product, 'images' => $images, 'comments' => $comments]);
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('myInput');
        // $sql = "SELECT * FROM header WHERE concat(dname,link,limage,chip, brand, graph, main) LIKE '%{$searchTerm}%'";
        $sql = "SELECT * from products LEFT JOIN product_images 
        ON products.Id = (SELECT MIN(product_images.id)
      	FROM products WHERE products.Id = product_images.product_Id)
        WHERE concat(product_name, product_brand, product_chip, product_graph) 
        LIKE '%{$searchTerm}%'";
        $stmt = $this->database->prepare($sql);
        $stmt->execute();
        $results = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        // while($row=mysqli_fetch_assoc($results)){
        //     $id = $row['Id'];
        //     $sqla="SELECT Image_path FROM product_images WHERE  product_Id='%{$id}' LIMIT 1";
        //     $stm = $this->database->prepare($sqla);
        //     $stm->execute();
        //     $res = $stm->get_result()->fetch_all(MYSQLI_ASSOC);


        // }
        // /* send a JSON encded array to client */
        // $myObj=array("id"=>35, "dname"=>"string", "price"=>1500, "brand"=>"ags", "color"=>"sasd", "chip"=>"asdsad", "main"=>"asdsad", "graph"=>"asdsd", "limage"=>"asdjasd" );
        // $results = json_encode($myObj);
        header('Content-type: application/json');
        return json_encode($results);
    }


    public function postComment($id)
    {
        $userId = $this->sessionManager->get('id');

        if (!$userId) return json_encode(['error' => 'Must be logged in to continue.']);

        $cmt_content = strip_tags($_POST['comment_text']);

        $stmt = $this->database->prepare("INSERT INTO comment(product_id, content, user_id)
                    VALUES (?, ?, ?)");
        $stmt->bind_param('isi', $id, $cmt_content, $userId);

        if (!$stmt->execute()) {
            error_log($this->database->error);
            return json_encode(["error" => 'Unexpected error occurred. Please try again later.']);
        }

        return json_encode(["comment" => ["username" => $this->sessionManager->get('username'), "content" => $cmt_content]]);
    }
}