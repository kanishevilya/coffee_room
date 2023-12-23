<?php
require_once (__DIR__."/../../models/model_store.php");
require_once (__DIR__."/../../core/Database.php");
$name = isset($_GET["name"]) ? $_GET["name"] : null;
$id_type = isset($_GET["id_type"]) ? $_GET["id_type"] : null;
$min = isset($_GET["minPrice"]) ? $_GET["minPrice"] : null;
$max = isset($_GET["maxPrice"]) ? $_GET["maxPrice"] : null;
$allergens = isset($_GET["allergens"])? json_decode($_GET["allergens"]):null;
$additions = isset($_GET["additions"])? json_decode($_GET["additions"]):null;
$data=null;


$data=Model_Store::getAllBaseProducts();

if(array_key_exists("message" ,$data)){
    return;
}
if($max!=null && $min!=null){

    if($max<$min){
        $temp=$max;
        $max=$min;
        $min=$temp;
    }
}

// echo json_encode( array(1,2,3,4) );

$array=[];
$allergensToProduct=Database::getAll("SELECT * FROM allergenstoproduct", []);
$additionsToProduct=Database::getAll("SELECT * FROM additiontoproducts", []);
for($i=0; $i<count($data); $i++){
    $nameCheck= $name!=null ? strpos(strtolower($data[$i]["product_name"]), strtolower($name))===0 : true;
    $id_typeCheck= $id_type!=null ? $data[$i]["id_category_type"]==$id_type : true;
    $minCheck= ($min!=null) ? $data[$i]["price"]>=$min : true;
    $maxCheck= ($max!=null) ? $data[$i]["price"]<=$max : true;
    $allergenCheck= ($allergens!=null) ? allergensFilter($allergensToProduct, $data[$i]["id_product"], $allergens) : true;
    $additionCheck= ($additions!=null) ? additionsFilter($additionsToProduct, $data[$i]["id_product"], $additions) : true;
    if($nameCheck && $id_typeCheck && $minCheck && $maxCheck && $allergenCheck && $additionCheck){
        $array[]=$data[$i];
    }
}

$data=$array;

function allergensFilter($allergensToProduct, $id_product, $allergens){
    foreach($allergensToProduct as $aToP){
        if($aToP["id_product"]==$id_product){
             if(in_array($aToP["id_allergen"], $allergens)){
                return false;
             }
        }
    }
    return true;
}

function additionsFilter($additionToProduct, $id_product, $additions){
    foreach($additionToProduct as $aToP){
        if($aToP["id_product"]==$id_product){
             if(in_array($aToP["id_addition"], $additions)){
                return true;
             }
        }
    }
    return false;
}