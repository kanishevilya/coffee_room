<?php
require_once (__DIR__."/../../models/model_store.php");

$sql="";
if($isAsc){
    $sql="SELECT * FROM products as p ORDER BY p.product_name ASC";
}else{
    $sql="SELECT * FROM products as p ORDER BY p.product_name DESC";
}
$data= Database::getAll($sql,[]);
