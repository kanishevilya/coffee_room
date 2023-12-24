<?php
require_once "session_start.php";
require_once __DIR__ . '/../core/Database.php';
class Model_Store implements Model
{
    public static function getAllBaseProducts(): array
    {
        include(__DIR__ . '/../methods/store/getAllBaseProducts.php');
        return $data;
    }
    public static function getSortedByPriceProducts($isAsc = true): array
    {
        include(__DIR__ . "/../methods/store/getSortedByPriceProducts.php");
        return $data;
    }
    public static function getSortedByNameProducts($isAsc = true): array
    {
        include(__DIR__ . "/../methods/store/getSortedByNameProducts.php");
        return $data;
    }
    public static function getMaxId()
    {
        $sql = "SELECT id_product FROM products ORDER BY id_product DESC LIMIT 1";
        return (Database::getAll($sql, []))[0]["id_product"];
    }
    public static function getBaseProduct($_id = null): array
    {
        $id = isset($_GET["id"]) ? $_GET["id"] : null;
        if ($id == null && $_id == null) {
            return array("message" => "Enter an ID");
        }
        $sql = "SELECT * FROM products as p WHERE p.id_product = :id";
        $arr = ["id" => $id];
        if ($_id != null) {
            $arr = ["id" => $_id];
        }

        return Database::getAll($sql, $arr);
    }
    public static function getFullProduct(): array
    {
        include(__DIR__ . '/../methods/store/getFullProduct.php');
        return $data;
    }
    public static function getFullProductById($id, $id_type): array
    {
        $data = Model_Store::getFullAllProductsById($id_type);
        foreach ($data as $product) {
            if ($product["id_underProduct"] == $id) {
                return $product;
            }
        }
        return $data = array("message" => "Incorrect Id");
    }
    public static function getFullAllProducts(): array
    {
        include(__DIR__ . '/../methods/store/getAllFullProducts.php');
        return $data;
    }
    public static function getFullAllProductsById($id_type): array
    {
        $sql = "";
        switch ($id_type) {
            case 1:
                $sql = "SELECT * FROM products as p JOIN beverages as b ON p.id_underProduct = b.id_underProduct AND p.id_category_type = b.id_category_type AND p.id_category_type = :id_type";
                break;
            case 2:
                $sql = "SELECT * FROM products as p JOIN food as f ON p.id_underProduct = f.id_underProduct AND p.id_category_type = f.id_category_type AND p.id_category_type = :id_type";
                break;
        }

        return Database::getAll($sql, ["id_type" => $id_type]);

    }
    public static function getProductsByPrice(): array
    {
        include(__DIR__ . '/../methods/store/getProductsByPrice.php');
        return $data;
    }
    public static function getProductsByName(): array
    {
        include(__DIR__ . '/../methods/store/getProductsByName.php');
        return $data;
    }
    public static function getProductsByFilter(): array
    {
        include(__DIR__ . '/../methods/store/getProductsByFilter.php');
        return $data;
    }


    public function getData(string $flag)
    {
        switch ($flag) {
            case "getAllProducts":
                return array("response" => self::getAllBaseProducts());
            case "getProduct":
                return array("response" => self::getBaseProduct());
            case "getFullProduct":
                return array("response" => self::getFullProduct());
            case "getAllFullProducts":
                return array("response" => self::getFullAllProducts());
            case "getProductsByPrice":
                return array("response" => self::getProductsByPrice());
            case "getProductsByName":
                return array("response" => self::getProductsByName());
            case "getProductsByFilter":
                return array("response" => self::getProductsByFilter());
            default:
                return array("response" => '{"message": "Method not found"}');
        }
    }
}