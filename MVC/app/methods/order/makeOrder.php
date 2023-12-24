<?php
require_once __DIR__ . "/../../models/model_cart.php";
require_once(__DIR__ . "/../../core/Database.php");

if (!isset($_COOKIE["token"])) {
    $data = array("message" => "You are not logged in to your account!");
    return;
}


include_once ("addOrder.php");
if($id_order!==null){

    $sql="INSERT INTO orderDetails (id_order, id_product, productsAmount, priceEach, id_category_type, JSON_modifications) values (:id_order, :id_product, :amount, :priceEach, :id_category_type, :json)";
    $cart = Model_Cart::getProducts();
    Model_Cart::clearCart();
    $total=0;
    foreach($cart as $product){
        $id_product=$product["id_product"];
        $amount=$product["productsAmount"];
        $priceEach=$product["priceEach"];
        $total+=($amount*$priceEach);
        $id_category_type=$product["id_category_type"];
        $arr=array(
            "id_order"=>$id_order,
            "id_product"=>$id_product,
            "amount"=>$amount,
            "priceEach"=>$priceEach,
            "id_category_type"=>$id_category_type,
            "json"=>$product["JSON_modifications"],
        );
        Database::insert($sql, $arr);
    }
    $sql="UPDATE orders SET total_price = :total WHERE id_order = :id";
    $arr=[
        "total"=>$total,
        "id"=>$id_order
    ];
    Database::voidQuery($sql, $arr);
    $data=array("message" => "Order completed!");
}else{
    $data=array("message" => "Enter Id!");
}