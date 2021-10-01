<?php

require "../../../dbConnect.php";
$order_id = $_POST['order_id'];
$request = $_POST['request'];
$rate = $_POST['rate'];
$desc = $_POST['desc'];
$userid = $_POST['userid'];

echo 'userid = ' . $userid;
echo 'Order_id = ' . $order_id;
echo 'request = ' . $request;
/*
echo 'rate = '.$rate;
echo 'desc = '.$desc;
*/

switch ($request) {

    case 'cancelOrder':
        $sql = "UPDATE `orders` SET `status_order`=5 WHERE `order_id`='$order_id'";
        updateData($sql);

        break;

    case 'reviewShop':
        $sql = "";
        break;


    case 'reviewProduct':

        break;

    case 'buyAgain':
        $sql = "SELECT * FROM `orders` INNER JOIN `orders_detail` ON `orders`.`order_id`=`orders_detail`.`orders_id` WHERE `orders`.`order_id`=$order_id";
        $data = selectData($sql);
        echo print_r($data);
        echo '............' . $data[1]['quantity_product'];


        for ($i = 1; $i < count($data); $i++) {
            $pid = $data[$i]['product_id'];
            $quantity = $data[$i]['quantity_product'];
            $sqlBuyAgain = "INSERT INTO `shopping_cart` (`uid`,`product_id`,`quantity`) VALUES ('$userid','$pid','$quantity')";
            addinsertData($sqlBuyAgain);
        }

        break;
}
