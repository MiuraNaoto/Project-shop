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
    case 'insert_delivery':
        $order_id = $_POST["order_id"];
        $order_number = $_POST["order_number"];
        $transport = $_POST["transport"];
        $track = $_POST["track"];
        $time = time();

        // echo $order_id . " " . $order_number . " " . $transport . " " . $track;

        $sql = "UPDATE `orders` SET `status_order`='6',`tracking_code`='$track',`time_delivery`='$time',`delivery_type`='$transport' WHERE `order_id`='$order_id' AND `order_number`='$order_number'";
        updateData($sql);
        // echo $sql;
        header("location: ./delivery.php");
        break;
}
