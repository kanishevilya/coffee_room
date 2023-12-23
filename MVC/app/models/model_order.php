<?php
require_once "session_start.php";
require_once __DIR__ . '/../core/Database.php';
class Model_Order implements Model{
    public static function getOrders() : array{
        include(__DIR__ . '/../methods/order/getOrders.php');
        return $data;
    }

    public static function getAllOrders() : array{
        $sql="SELECT * FROM orders";
        return Database::getAll($sql, []);
    }

    public static function addOrder() : array{
        include(__DIR__ . '/../methods/order/addOrder.php');
        return $data;
    }
    
    public static function makeOrder() : array{
        include(__DIR__ . '/../methods/order/makeOrder.php');
        return $data;
    }
    public function getData(string $flag){
        switch($flag){
            case "getOrders": return array("response"=>self::getOrders());
            case "getAllOrders": return array("response"=>self::getAllOrders());
            case "addOrder": return array("response"=>self::addOrder());
            case "makeOrder": return array("response"=>self::makeOrder());

            default:
            return array("response"=>'{"message": "Method not found"}');
        }
    }
}