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
        $order_details = json_decode($_POST['order_details'], true);
        $total_unit = json_decode($_POST['total_units'], true);
        $total = json_decode($_POST['total'], true);
        // print_r(json_encode($order_details) ."<br>");

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
        // echo $DATA;

        $sql = "SELECT `order_id` FROM `orders` ORDER BY `order_id` DESC LIMIT 1";
        $orderId = selectDataOne($sql)['order_id'];
        // echo $orderId . "<br>";

        $sql_or = "SELECT `uid`, `username`, `firstname`, `lastname`, `user-list`.`tel`, `profile_user` FROM `user-list` 
        INNER JOIN `seller-list` ON `user-list`.`shop_id` = `seller-list`.`shop_id` ";
        $DATA_OR = selectDataOne($sql_or);

        // print_r(json_encode($t) . "<br>");
        // print_r(json_encode($arrT2) . "<br>");

        for ($i = 0; $i < count($order_details); $i++) {
            $product_id = $order_details[$i]['product_id'];
            $product_unit = $order_details[$i]['quantity'];
            // echo $quantity_product;
            $sql_orders_detail = "INSERT INTO `orders_detail` (`orders_id`, `product_id`, `quantity_product`,`status_order`) 
            VALUES ('$orderId','$product_id','$product_unit','1')";
            addinsertData($sql_orders_detail);
            // print_r($DATA);
            // print_r(json_encode($or_detail, JSON_UNESCAPED_UNICODE) . "<br>");
        }

        for ($i = 1; $i < count($DETAIL); $i++) { 
            # code...
            $delete_order = "DELETE FROM `shopping_cart` WHERE `uid` = '$uid' AND `product_id` = '".$DETAIL[$i]['product_id']."' AND `quantity` = '".$DETAIL[$i]['quantity_product']."'";
            deleteData($delete_order);
        }

        header("location: ../payment/payment.php?order_number=".$rand);
        break;
}
