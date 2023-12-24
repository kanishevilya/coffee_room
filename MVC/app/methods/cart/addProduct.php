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

if (gettype($user) != "array" || key_exists("message", $user)) {
    $data = array("message" => "You are not logged in to your account!");
    return;
}
$maxId = Model_Store::getMaxId();
if ($id_product > $maxId) {
    $data = array("message" => "Incorrect Id!");
    return;
}
if ($user !== null && $JSON_modifications !== null && $amount !== null && $id_product !== null) {

    $id_user = $user["id_user"];

    $product = Model_Store::getBaseProduct($id_product);

    $modifications = json_decode($JSON_modifications, true);
    $mod_price = 0;
    $mult = 1;
    foreach ($modifications as $mod) {
       
        if (key_exists("size", $mod)) {
            switch ($mod["size"]) {
                case "short":
                    $mult = 0.8;
                    break;
    
                case "tall":
                    $mult = 1;
                    break;
    
                case "grande":
                    $mult = 1.25;
                    break;
    
                case "venti":
                    $mult = 1.5;
                    break;
            }
        }else{
            $mod_price += ($mod["price"] * $mod["amount"]);
        }
    }
    $sql = "INSERT INTO cartdetails (id_product, id_user,name, productsAmount,product_description,product_image, priceEach, JSON_modifications, id_category_type) VALUES (:id_product, :id_user,:name, :amount,:product_description, :product_image, :price, :json, :id_category_type)";
    
    $arr = [
        "id_product" => $id_product,
        "id_user" => $id_user,
        "name"=>$product[0]["product_name"],
        "product_description"=>$product[0]["product_description"],
        "product_image"=>$product[0]["product_image"],
        "amount" => $amount,
        "price" => ($product[0]["price"] * $mult) + $mod_price,
        "json" => $JSON_modifications,
        "id_category_type" => $product[0]["id_category_type"]
    ];

    $id = Database::insert($sql, $arr);
    $data = array("message" => "Successful addition. Id: $id");
} else {
    $data = array("message" => "Incomplete information");
}