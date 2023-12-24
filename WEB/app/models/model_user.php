<?php
require_once "session_start.php";
require_once __DIR__ . '/../core/Database.php';
class Model_User implements Model{
    public function getData(string $flag){
        // switch($flag){
        //     case "getUser": return array("response"=>self::getUser());
        //     case "getAllUsers": return array("response"=>self::getAllUsers());
        //     case "registration": return array("response"=>self::registration());
        //     case "authentication": return array("response"=>self::authentication());
        //     case "logout": return array("response"=>self::logout());
        //     default:
        //     return array("response"=>'{"message": "Method not found"}');
        // }
        return "";
    }
    

    
}