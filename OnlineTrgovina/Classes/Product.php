<?php

class Product extends Dbh{

    private $product_id;
    

    public function __construct($product_id=null){
        $this->product_id = $product_id;
    }

    public function getProductInfo(){
        try{

        require_once 'Dbh.php';
        require_once __DIR__ . '/../includes/product.inc.php';

        return get_info_product($this->connect(), $this->product_id);

        }catch (PDOException $e) {
            die("Query failed -> ". $e->getMessage());
        }
    
    }

    public function get_all_products(){
        try{

        require_once 'Dbh.php';
        require_once __DIR__ . '/../includes/product.inc.php';

        return get_all_products($this->connect());

        }catch (PDOException $e) {
            die("Query failed -> ". $e->getMessage());
        }
    
    }


}

