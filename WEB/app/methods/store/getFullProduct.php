<?php
require_once (__DIR__."/../../models/model_store.php");
$id = isset($_GET["id"]) ? $_GET["id"] : null;
$id_type = isset($_GET["id_type"]) ? $_GET["id_type"] : null;
$data=[];
if ($id == null || $id_type == null) {
    $data = array("message" => "Enter an ID or category type");
    return;
}
$data= Model_Store::getFullAllProducts();
if(array_key_exists("message" ,$data)){
    return;
}
foreach($data as $product){
    if($product["id_underProduct"]==$id){
        $data=$product;
        return;
    }
}
$data=array("message"=>"Incorrect Id");
