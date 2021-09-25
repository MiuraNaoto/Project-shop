<?php
session_start();
$USER = $_SESSION[md5('user')];
$SELLER = $_SESSION[md5('shop')];
$username =  $USER[1]["username"];
$uid = $USER[1]["uid"];
$shop_id = $SELLER[1]["shop_id"];
require "../../../dbConnect.php";
require "../../../query/query.php";
$request = $_POST['request'];
$myConDB = connectDB();

echo $request . "<br>";

switch ($request) {
    case 'confirm_order':
        $order_id = $_POST["order_id"];
        $order_number = $_POST["order_number"];

        // echo  $order_id . " " . $order_number;

        $status_order = "UPDATE `orders` SET `status_order`='3' WHERE `order_id`='$order_id' AND `order_number`='$order_number'";
        updateData($status_order);

        $status_order_detail = "UPDATE `orders_detail` SET `status_order`='3' WHERE `orders_id`='$order_id'";
        updateData($status_order_detail);
        // echo $status_order . "<br>";
        // echo $status_order_detail . "<br>";
        break;

    case 'disapproved_order':
        $order_id = $_POST["order_id"];
        $order_number = $_POST["order_number"];
        $reason_desc = $_POST["reason_desc"];

        echo  $order_id . " " . $order_number . " " .  $reason_desc;

        break;
}
