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
        $selected_address = $_POST['selected_address'];
        // echo $selected_address;
        $product_id = $_POST['product_id'];
        $shop_id = $_POST['shop_id'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        print_r($product_id);
        print_r($shop_id);
        print_r($quantity);
        print_r($price);
        $obj = $_POST["obj"];
        $daid = $_POST["daid"];

        $total = 0;
        $total_unit = 0;
        for ($j = 0; $j < count($product_id); $j++) {
            $total = $total + $price[$j];
            $total_unit = $total_unit + $quantity[$j];
        }
        // echo $total." ";
        // echo $total_unit;
        $rand = rand((int) 1000000000, (int) 9999999999);
        $time = time();
        $shopId = $shop_id[0];

        // print_r($obj);
        // echo $daid." ".$total." ".$shopId;

        $sql_orders = "INSERT INTO `orders` (`order_number`, `shop_id`, `daid`, `total_price`, `time_order`, `total_unit`, `status_order`)
                        VALUES ('$rand', '$shopId', '$selected_address', '$total', '$time', $total_unit, '1')";

        // echo $sql_orders;
        addinsertData($sql_orders);
        // print_r($DATA);

        // $sql = "SELECT `order_id` FROM `orders` ORDER BY `order_id` DESC LIMIT 1";
        // $orderId = selectDataOne($sql)['order_id'];
        // // echo $sql_orders . "<br>";

        // for ($i = 0; $i < count($product_id); $i++) {
        //     $product_id = $product_id[$i];
        //     $quantity_product = $quantity[$i];
        //     $sql_orders_detail = "INSERT INTO `orders_detail` (`orders_id`, `product_id`, `quantity_product`,`status_order`) 
        //     VALUES ('$orderId','$product_id','$quantity_product','1')";
        //     addinsertData($sql_orders_detail);
        //     // print_r($DATA);
        //     // echo $sql_orders_detail . "<br>";
        // }
        header("location: ../payment/payment.php?order_number=".$rand);
        break;
}
