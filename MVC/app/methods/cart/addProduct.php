<?php
require_once __DIR__ . "/../../models/model_user.php";
require_once __DIR__ . "/../../models/model_store.php";
require_once __DIR__ . "/../../models/model_cart.php";
require_once(__DIR__ . "/../../core/Database.php");
if (!isset($_COOKIE["token"])) {
    $data = array("message" => "You are not logged in to your account!");
    return;
}

$JSON_modifications = isset($_GET["modifications"]) ? $_GET["modifications"] : null;
$amount = isset($_GET["amount"]) ? $_GET["amount"] : null;
$id_product = isset($_GET["id_product"]) ? $_GET["id_product"] : null;

$user = Model_User::getCurrentUser();

if (gettype($user) != "array" ||key_exists("message", $user)) {
    $data = array("message" => "You are not logged in to your account!");
    return;
}
$maxId=Model_Store::getMaxId();
if($id_product > $maxId){ $data=array("message" => "Incorrect Id!");return;}
if ($user!==null && $JSON_modifications !== null && $amount !== null && $id_product !== null) {

    $id_user = $user["id_user"];

    $product = Model_Store::getBaseProduct($id_product);

    $modifications = json_decode($JSON_modifications, true);
    $mod_price = 0;
    foreach ($modifications as $mod) {
        $mod_price += ($mod["price"] * $mod["amount"]);
    }
    $sql = "INSERT INTO cartdetails (id_product, id_user, productsAmount, priceEach, JSON_modifications, id_category_type) VALUES (:id_product, :id_user, :amount, :price, :json, :id_category_type)";
    $arr = [
        "id_product" => $id_product,
        "id_user" => $id_user,
        "amount" => $amount,
        "price" => $product[0]["price"] + $mod_price,
        "json" => $JSON_modifications,
        "id_category_type"=>$product[0]["id_category_type"]
    ];

    $id=Database::insert($sql, $arr);
    $data = array("message" => "Successful addition. Id: $id");
} else {
    $data = array("message" => "Incomplete information");
}