<?php
session_start();
$USER = $_SESSION[md5('user')];
$uid = $USER[1]["uid"];
require "../../../dbConnect.php";

$request = $_POST['request'];
$myConDB = connectDB();

// echo $request . "<br>";

switch ($request) {

    case 'order_detail':
        $order_details = json_decode( $_POST[ 'order_details' ], true );
        $total_unit = json_decode( $_POST[ 'total_units' ], true );
        $total = json_decode( $_POST[ 'total' ], true );
        // print_r($order_details);
        // echo count($order_details);
        // echo "<br>";
        // echo $total;
        $daid = $_POST['selected_address'];
        // echo $daid;
        $shopId = $order_details[0]['shop_id'];
        // echo $shopId;
        $rand = rand((int) 1000000000, (int) 9999999999);
        $time = time();

        // // print_r($obj);
        // // echo $daid." ".$total." ".$shopId;
 
        $sql_orders = "INSERT INTO `orders`(`order_number`, `shop_id`, `daid`, `total_unit`, `total_price`, `time_order`, `status_order`) 
                        VALUES ('$rand','$shopId','$daid','$total_unit','$total','$time','1')";
        // echo $sql_orders . "<br>";
        addinsertData($sql_orders);
        // print_r($DATA. "<br>");

        $sql = "SELECT `order_id` FROM `orders` ORDER BY `order_id` DESC LIMIT 1";
        $orderId = selectDataOne($sql)['order_id'];
        // echo $orderId . "<br>";

        for ($i = 0; $i < count($order_details); $i++) {
            $product_id = $order_details[$i]['product_id'];
            $quantity_product = $order_details[$i]['quantity'];
            $sql_orders_detail = "INSERT INTO `orders_detail` (`orders_id`, `product_id`, `quantity_product`,`status_order`) 
            VALUES ('$orderId','$product_id','$quantity_product','1')";
            addinsertData($sql_orders_detail);
            // print_r($DATA);
            // echo $sql_orders_detail . "<br>";
        }
        header("location: ../payment/payment.php?order_number=".$rand);
        break;
}
