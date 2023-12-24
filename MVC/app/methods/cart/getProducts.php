<?php
require_once __DIR__ . "/../../models/model_user.php";
require_once __DIR__ . "/../../models/model_cart.php";
require_once(__DIR__ . "/../../core/Database.php");
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



function getUnderIdById($id, $id_type){
    $sql="";
    
    
    if($id_type==1){

        $sql="SELECT b.id_underProduct from beverages as b JOIN products as p ON p.id_underProduct=b.id_underProduct AND p.id_product=:id ";
        return (Database::getAll($sql, ["id"=>$id]))[0]["id_underProduct"];
    }else{
        $sql="SELECT f.id_underProduct from food as f JOIN products as p ON p.id_underProduct=f.id_underProduct AND p.id_product=:id ";
        return (Database::getAll($sql, ["id"=>$id]))[0]["id_underProduct"];
    }
}