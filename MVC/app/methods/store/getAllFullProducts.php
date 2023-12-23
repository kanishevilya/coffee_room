<?php
require_once (__DIR__."/../../models/model_store.php");
$id_type = isset($_GET["id_type"]) ? $_GET["id_type"] : null;
$data=null;
if ($id_type == null) {
    $data= array("message" => "Enter a category type");
    return;
}
$sql = "";
switch ($id_type) {
    case 1:
        $sql = "SELECT * FROM products as p JOIN beverages as b ON p.id_underProduct = b.id_underProduct AND p.id_category_type = b.id_category_type AND p.id_category_type = :id_type";
        break;
    case 2:
        $sql = "SELECT * FROM products as p JOIN food as f ON p.id_underProduct = f.id_underProduct AND p.id_category_type = f.id_category_type AND p.id_category_type = :id_type";
        break;
}

$data = Database::getAll($sql, ["id_type" => $id_type]);
