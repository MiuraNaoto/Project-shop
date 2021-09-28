<?php

require "../../../dbConnect.php";
$order_id = $_POST['order_id'];
$request = $_POST['request'];
echo 'Order_id = '.$order_id;
echo 'request = '.$request;


switch ($request) {

    case 'cancelOrder':
        //echo '...';
        $sql = "UPDATE `orders` SET `status_order`=5 WHERE `order_id`='$order_id'";
        updateData($sql);
        
        break;

}

?>