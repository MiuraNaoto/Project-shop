<?php

session_start();
$USER = $_SESSION[md5('user')];
$uid = $USER[1]["uid"];
require "../../../dbConnect.php";

$scid = $_POST['sc_id'];
$request = $_POST['request'];
$product_id = $_POST['product_id'];
$shop_id = $_POST['shop_id'];
$quantity = $_POST['quantity'];
$request = $_POST['request'];
$allProductInCart = $_POST['data'];
$shippingTypeid = $_POST['shippingTypeid'];
//$allProductInCart = json_decode($json);

echo $scid;
//echo print_r($USER);
echo "...........";
echo print_r($allProductInCart);
//echo print_r($quantity);
//echo "...".$quantity[1];
echo $request;
echo $shippingTypeid;
//echo 'scid='.$allProductInCart[1]['scid'];
//echo 'count='.count($allProductInCart);

switch ($request) {
    case 'remove':
        //echo "call remove...";
        $sql = "DELETE FROM `shopping_cart` WHERE `scid`= '$scid'";
        deleteData($sql);
        break;

    case 'update':

        for($i = 1; $i<count($allProductInCart) ; $i++){
            $pid = $allProductInCart[$i]['product_id'];
            $sid = $allProductInCart[$i]['shop_id'];
            $sc_id = $allProductInCart[$i]['scid'];
            $getStock ="SELECT `stock` FROM `product` WHERE `product_id`= '$pid' AND `shop_id`= '$sid'";
            $data = selectData($getStock);
           // echo '<script>' . $data . '</script>';
            
            if((int)$data[1]['stock']-(int)$quantity[$i] >= 0){
                $sql ="UPDATE `shopping_cart` SET `quantity`='$quantity[$i]' WHERE `scid`='$sc_id'";
                updateData($sql);
            }
        }
        
        break;
    /*
        case 'checkOut':
            $sql = "UPDATE `orders` SET `delivery_type`=$shippingTypeid WHERE ";
            break;
            */

        
        
}
?>