<?php
require_once __DIR__ . "/../../models/model_user.php";
require_once __DIR__ . "/../../models/model_cart.php";
if(!isset($_COOKIE["token"])){$data= array( "message"=> "You are not logged in to your account!"); return;}

$user = Model_User::getCurrentUser();
$cartDetails=Model_Cart::getAllProducts();

$cart=[];

foreach($cartDetails as $cd){
    if($cd["id_user"]==$user["id_user"]){
        $cart[]=$cd;
    }
}
$data=$cart;