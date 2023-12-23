<?php
require_once "session_start.php";
require_once __DIR__ . '/../core/Database.php';
class Model_User implements Model{
    public static function getAllUsers(){
        $sql="SELECT * FROM users";
        return Database::getAll($sql, []);
    }
    public static function getUser(){
        if(!isset($_GET["id_user"])){return array("message"=>"Enter an Id!");}
        $sql="SELECT * FROM users WHERE id_user = :id";
        $arr=array(
            "id"=>$_GET["id_user"]
        );
        return Database::getRow($sql, $arr);
    }
    public static function registration(){
        include(__DIR__ . '/../methods/user/registration.php');
        return $data;
    }
    public static function authentication(){
        include(__DIR__ . '/../methods/user/authentication.php');
        return $data;
    }
    public static function logout(){
        include(__DIR__ . '/../methods/user/logout.php');
        return $data;
    }
    public static function tokenSet($login, $id){
        $token=sha1(random_bytes(128). $login);
        setcookie("token", $token,time()+1*24*60*60, '/');
        
        $sql="UPDATE users SET token=:token WHERE id_user=:id";
        Database::voidQuery($sql, ["token"=>$token, "id"=>$id]);
    }
    public function getData(string $flag){
        switch($flag){
            case "getUser": return array("response"=>self::getUser());
            case "getAllUsers": return array("response"=>self::getAllUsers());
            case "registration": return array("response"=>self::registration());
            case "authentication": return array("response"=>self::authentication());
            case "logout": return array("response"=>self::logout());
            default:
            return array("response"=>'{"message": "Method not found"}');
        }
    }
    

    
}