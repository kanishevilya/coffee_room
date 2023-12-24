<?php
require_once (__DIR__."/../../models/model_store.php");
$name = isset($_GET["name"]) ? $_GET["name"] : null;

$data=null;
if ($name == null) {
    $data = array("message" => "Enter a product name");
    return;
}

$data=Model_Store::getAllBaseProducts();

if(array_key_exists("message" ,$data)){
    return;
}
$array=[];
for($i=0; $i<count($data); $i++){
    if(strpos(strtolower($data[$i]["product_name"]), strtolower($name))===0){
        $array[]=$data[$i];
    }
}

$data=$array;