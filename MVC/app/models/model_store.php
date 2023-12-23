<?php
require_once "session_start.php";
require_once __DIR__ . '/../core/Database.php';
class Model_Store implements Model{
    public static function getAllBaseProducts() : array{
        include(__DIR__ . '/../methods/store/getAllBaseProducts.php');
        return $data;
    }
    public static function getSortedByPriceProducts($isAsc=true) : array{
        include(__DIR__ . "/../methods/store/getSortedByPriceProducts.php");
        return $data;
    }
    public static function getSortedByNameProducts($isAsc=true) : array{
        include(__DIR__ . "/../methods/store/getSortedByNameProducts.php");
        return $data;
    }
    public static function getBaseProduct() : array{
        include(__DIR__ . '/../methods/store/getBaseProduct.php');
        return $data;
    }
    public static function getFullProduct() : array{
        include(__DIR__ . '/../methods/store/getFullProduct.php');
        return $data;
    }
    public static function getFullAllProducts() : array{
        include(__DIR__ . '/../methods/store/getAllFullProducts.php');
        return $data;
    }
    public static function getProductsByPrice() : array{
        include(__DIR__ . '/../methods/store/getProductsByPrice.php');
        return $data;
    }
    public static function getProductsByName() : array{
        include(__DIR__ . '/../methods/store/getProductsByName.php');
        return $data;
    }
    public static function getProductsByFilter() : array{
        include(__DIR__ . '/../methods/store/getProductsByFilter.php');
        return $data;
    }
    
    
    public function getData(string $flag){
        switch($flag){
            case "getAllProducts": return array("response"=>self::getAllBaseProducts());
            case "getProduct": return array("response"=>self::getBaseProduct());
            case "getFullProduct": return array("response"=>self::getFullProduct());
            case "getAllFullProducts": return array("response"=>self::getFullAllProducts());
            case "getProductsByPrice": return array("response"=>self::getProductsByPrice());
            case "getProductsByName": return array("response"=>self::getProductsByName());
            case "getProductsByFilter": return array("response"=>self::getProductsByFilter());
            default:
            return array("response"=>'{"message": "Method not found"}');
        }
    }
}