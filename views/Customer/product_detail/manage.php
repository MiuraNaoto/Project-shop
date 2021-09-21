<?php
session_start();
$USER = $_SESSION[md5('user')];
$uid = $USER[1]["uid"];
require "../../../dbConnect.php";

$request = $_POST['request'];
$myConDB = connectDB();

echo $request . "<br>";

switch ($request) {

    case 'shopping_cart':
        $product_id = $_POST["product_id"];
        $shop_id = $_POST["shop_id"];
        $quantity = $_POST["quantity"];

        // echo $product_id . " " . $shop_id . " " . $quantity;

        $shopping_cart = "SELECT * FROM `shopping_cart` WHERE `product_id` = $product_id";
        $DATA = selectData($shopping_cart);

        if (isset($DATA[1]["product_id"])) {
            $old_quantity = $DATA[1]["quantity"];
            $new_quantity = $old_quantity + $quantity;
            $sql = "UPDATE `shopping_cart` SET `quantity`='$new_quantity' WHERE `uid`='$uid' AND `product_id`='$product_id'";
            updateData($sql);
            // echo $sql;
        } else {
            $sql = "INSERT INTO `shopping_cart`(`uid`, `product_id`, `quantity`) 
                VALUES ('$uid','$product_id','$quantity')";
            addinsertData($sql);
            // echo $sql;
        }

        break;
}
