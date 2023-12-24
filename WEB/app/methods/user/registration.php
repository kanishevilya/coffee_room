<?php

require_once __DIR__ . "/../../models/model_user.php";
// $data = json_decode(file_get_contents("php://input"), true);

$login = isset($_GET["login"]) ? $_GET["login"] : null;
$email = isset($_GET["email"]) ? $_GET["email"] : null;
$address = isset($_GET["address"]) ? $_GET["address"] : null;
$password1 = isset($_GET["password1"]) ? $_GET["password1"] : null;
$password2 = isset($_GET["password2"]) ? $_GET["password2"] : null;

$users = Model_User::getAllUsers();

if ($login !== null && $password1 !== null && $password2 !== null && $email!==null && $address!==null) {
    
    if($password1!=$password2){
        $data=array( "response"=> "Password mismatch");
        return;  
    }
    foreach ($users as $user) {
        if ($login == $user["user_login"]) {
            $data=array( "response"=> "This login is already taken");
            return;
        }
        if($email == $user["user_email"]){
            $data=array( "response"=> "This email is already taken");
            return;
        }
    }

    $sql="INSERT INTO users (user_login, user_email, user_password, user_address) VALUES (:login, :email, :password, :address)";
    $id = Database::insert($sql, ["login"=>$login, "email"=>$email, "password"=>$password1, "address"=>$address]);
    $data=array( "message"=> "Successful registration");
    Model_User::tokenSet($login, $id);
    return;
}



$data=array( "message"=> "Incomplete information!");
