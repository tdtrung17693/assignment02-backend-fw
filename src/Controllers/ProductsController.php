<?php
namespace Controllers;

use Authenticator;
use Database;
use Request;

class ProductsController extends BaseController {
    protected Database $database;
    protected \SessionManager $sessionManager;

    public function __construct(Database $database, \SessionManager  $sessionManager)
    {
        $this->database = $database;
        $this->sessionManager = $sessionManager;
    }

    public function index() {
        return $this->view('products');
    }
    
    public function search(Request $request) {
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
    public function show($id) {
        return $this->view('product-details');
    }
}