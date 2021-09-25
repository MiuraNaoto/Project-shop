<?php
session_start();
$USER = $_SESSION[md5('user')];
$uid = $USER[1]["uid"];
require "../../../dbConnect.php";

$request = $_POST['request'];
$myConDB = connectDB();

// echo $request . "<br>";

switch ($request) {

    case 'order_detal':
        $obj = $_POST["obj"];
        $daid = $_POST["daid"];
        $total = $_POST["total"];
        $total_unit = $_POST["total_unit"];
        $rand = rand((int) 1000000000, (int) 9999999999);
        $time = time();
        $shopId = $obj[0]['shop_id'];
        // print_r($obj);
        // echo $daid." ".$total." ".$shopId;

        $sql_orders = "INSERT INTO `orders` (`order_number`, `shop_id`, `daid`, `total_price`, `time_order`, `total_unit`, `status_order`)
        VALUES ('$rand', '$shopId', '$daid', '$total', '$time', $total_unit, '1')";
        addinsertData($sql_orders);
        // print_r($DATA);

        $sql = "SELECT `order_id` FROM `orders` ORDER BY `order_id` DESC LIMIT 1";
        $orderId = selectDataOne($sql)['order_id'];
        // echo $sql_orders . "<br>";

        for ($i = 0; $i < count($obj); $i++) {
            $product_id = $obj[$i]['product_id'];
            $quantity_product = $obj[$i]['quantity'];
            $sql_orders_detail = "INSERT INTO `orders_detail`(`orders_id`, `product_id`, `quantity_product`,`status_order`) 
            VALUES ('$orderId','$product_id','$quantity_product','1')";
            addinsertData($sql_orders_detail);
            // print_r($DATA);
            // echo $sql_orders_detail . "<br>";
        }

        break;
}
