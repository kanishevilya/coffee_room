<?php
require_once __DIR__ . "/../../models/model_user.php";
require_once __DIR__ . "/../../models/model_order.php";
if(!isset($_COOKIE["token"])){$data= array( "message"=> "You are not logged in to your account!"); return;}

$user = Model_User::getCurrentUser();
$orders=Model_Order::getAllOrders();

$_orders=[];

foreach($orders as $od){
    if($od["id_user"]==$user["id_user"]){
        $_orders[]=$od;
    }
}
$data=$_orders;