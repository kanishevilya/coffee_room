<?php
require_once __DIR__ . "/../../models/model_user.php";
require_once __DIR__ . "/../../models/model_order.php";
if(!isset($_COOKIE["token"])){$data= array( "message"=> "0 You are not logged in to your account!"); return;}



$number=isset($_GET["number"]) ? $_GET["number"] : null;
$month=isset($_GET["month"]) ? $_GET["month"] : null;
$year=isset($_GET["year"]) ? $_GET["year"] : null;
$code=isset($_GET["code"]) ? $_GET["code"] : null;

if($number!==null && $month!==null && $year!==null &&$code!==null){

    if($year < date('Y')){
        $data= array( "message"=> "Date has expired!"); return;
    } else if ($year == date('Y')){
        if($month<date('m')){
            $data= array( "message"=> "Date has expired!"); return;
        }
    }
    
    $data=array("message"=> "Payment completed!");
}else{
    $data=array("message"=> "Incomplete information!");
}