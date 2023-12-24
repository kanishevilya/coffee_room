<?php
require_once (__DIR__."/../../models/model_store.php");
$sql="SELECT * FROM allergens";
$data= Database::getAll($sql,[]);
