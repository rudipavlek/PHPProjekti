<?php
class Cart extends Dbh{

    private $user_id;
    

    public function __construct($user_id){
        $this->user_id = $user_id;
    }

    public function getCartInfo(){
        try{

        require_once 'Dbh.php';
        require_once __DIR__ . '/../includes/cart.inc.php';

        return get_info_cart($this->connect(), $this->user_id);

        }catch (PDOException $e) {
            die("Query failed -> ". $e->getMessage());
        }
    
    }

    public function remove_item($product_id){
        try{

        require_once 'Dbh.php';
        require_once __DIR__ . '/../includes/cart.inc.php';

        return remove_from_cart($this->connect(), $this->user_id, $product_id);

        }catch (PDOException $e) {
            die("Query failed -> ". $e->getMessage());
        }
    
    }

    public function add_item($product_id){
        try{

        require_once 'Dbh.php';
        require_once __DIR__ . '/../includes/cart.inc.php';

        return add_to_cart($this->connect(), $this->user_id, $product_id);

        }catch (PDOException $e) {
            die("Query failed -> ". $e->getMessage());
        }
    
    }
}

