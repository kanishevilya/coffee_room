<?php
require_once __DIR__ . "/../../models/model_user.php";
require_once(__DIR__ . "/../../core/Database.php");
if (!isset($_COOKIE["token"])) {
    $data = array("message" => "You are not logged in to your account!");
    return;
}


$user = Model_User::getCurrentUser();

if (gettype($user) != "array" ||key_exists("message", $user)) {
    $data = array("message" => "You are not logged in to your account!");
    return;
}

if ($user!==null) {

    $id_user = $user["id_user"];
    $sql="DELETE FROM cartdetails WHERE id_user = :id_user";
    Database::voidQuery($sql, ["id_user"=>$id_user]);
    $data = array("message" => "Cart empty.");
} else {
    $data = array("message" => "Incomplete information");
}