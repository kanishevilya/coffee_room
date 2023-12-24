<?php
require_once (__DIR__."/../../models/model_store.php");
$min = isset($_GET["minPrice"]) ? $_GET["minPrice"] : null;
$max = isset($_GET["maxPrice"]) ? $_GET["maxPrice"] : null;
$data=null;
if ($min == null || $max == null) {
    $data = array("message" => "Enter an Min and Max price");
    return;
}

$data=Model_Store::getAllBaseProducts();

if(array_key_exists("message" ,$data)){
    return;
}
$array=[];
for($i=0; $i<count($data); $i++){
    if($data[$i]["price"]>=$min && $data[$i]["price"]<=$max){
        $array[]=$data[$i];
    }
}

$data=$array;