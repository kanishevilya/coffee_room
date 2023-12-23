<?php
require_once (__DIR__."/../../models/model_store.php");
$sql="SELECT * FROM products as p";
$data= Database::getAll($sql,[]);
