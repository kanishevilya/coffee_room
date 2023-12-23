<?php
require_once "session_start.php";
require_once __DIR__ . '/../core/Database.php';
class Model_Cart implements Model{
    public static function getProducts() : array{
        include(__DIR__ . '/../methods/cart/getProducts.php');
        return $data;
    }

    public static function getAllProducts() : array{
        $sql="SELECT * FROM cartdetails";
        return Database::getAll($sql, []);
    }

    public static function addProduct() : array{
        include(__DIR__ . '/../methods/cart/addProduct.php');
        return $data;
    }
    public static function removeProduct() : array{
        include(__DIR__ . '/../methods/cart/removeProduct.php');
        return $data;
    }
    public static function clearCart() : array{
        include(__DIR__ . '/../methods/cart/clearCart.php');
        return $data;
    }
    
    public function getData(string $flag){
        switch($flag){
            case "getAllProducts": return array("response"=>self::getAllProducts());
            case "getProducts": return array("response"=>self::getProducts());
            case "addProduct": return array("response"=>self::addProduct());
            case "removeProduct": return array("response"=>self::removeProduct());
            case "clearCart": return array("response"=>self::clearCart());
            default:
            return array("response"=>'{"message": "Method not found"}');
        }
    }
}