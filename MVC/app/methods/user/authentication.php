<?php

if(isset($_COOKIE["token"])){$data= array( "message"=> "You are already logged in!"); return;}


require_once __DIR__ . "/../../models/model_user.php";

$login = isset($_GET["login"]) ? $_GET["login"] : null;
$email = isset($_GET["email"]) ? $_GET["email"] : null;
$password = isset($_GET["password"]) ? $_GET["password"] : null;
$users = Model_User::getAllUsers();

if (($login != null || $email !=null) && $password != null) {
    foreach ($users as $user) {
        if (($login == $user["user_login"] || $email==$user["user_email"]) && sha1($user["salt"].$password) == $user["user_password"]) {
            Model_User::tokenSet($user["user_login"], $user["id_user"]);
            $data=array( "message"=> "Successful authorization");
            return;
        }
    }
}else{
    $data=array( "message"=> "Incomplete information!");
    return;
}
$data=array( "message"=> "Unsuccessful authorization");
