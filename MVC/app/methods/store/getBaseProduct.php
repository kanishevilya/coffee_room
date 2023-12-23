<?php
require_once (__DIR__."/../../models/model_store.php");

$id=isset($_GET["id"])?$_GET["id"]:null;
$data=null;
if($id==null){$data = array("message"=>"Enter an ID"); return;}

$data=Model_Store::getAllBaseProducts();

foreach($data as $product){
    if($product["id_product"]==$id){
        $data=$product;
        return;
    }
}
$data=array("message"=>"Incorrect Id");