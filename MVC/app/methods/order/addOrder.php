<?php
require_once __DIR__ . "/../../models/model_user.php";
require_once __DIR__ . "/../../models/model_order.php";
if(!isset($_COOKIE["token"])){$data= array( "message"=> "You are not logged in to your account!"); return;}

$user = Model_User::getCurrentUser();

$comments=isset($_GET["id_order"]) ? $_GET["id_order"] : null;

$sql="INSERT INTO orders (id_user, comments) VALUES (:id, :comments)";

$id_order=Database::insert($sql, ["id"=>$user["id_user"], "comments"=>$comments]);
$data=array( "message"=> "Order added!");
