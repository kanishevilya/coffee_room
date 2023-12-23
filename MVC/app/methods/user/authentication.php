<?php

if(isset($_COOKIE["token"])){$data= array( "message"=> "You are already logged in!"); return;}


require_once __DIR__ . "/../../models/model_user.php";

$login = isset($_GET["login"]) ? $_GET["login"] : null;
$password = isset($_GET["password"]) ? $_GET["password"] : null;
$users = Model_User::getAllUsers();

if ($login != null && $password != null) {
    foreach ($users as $user) {
        if ($login == $user["user_login"] && sha1($user["salt"].$password) == $user["user_password"]) {
            Model_User::tokenSet($login, $user["id_user"]);
            $data=array( "response"=> "Successful authorization");
            return;
        }
    }
}else{
    $data=array( "message"=> "Incomplete information!");
    return;
}
$data=array( "message"=> "Unsuccessful authorization");
