<?php
session_start();
$USER = $_SESSION[md5('user')];
$uid = $USER[1]["uid"];
require "../../../dbConnect.php";
require "../../../query/query.php";

$request = $_POST['request'];
$myConDB = connectDB();

// echo $request . "<br>";

switch ($request) {

    case 'payment':
        $order_number = json_decode($_POST["order_number"], true);
        $payment_method = $_POST["payment_method"];
        $select_bank = $_POST["select_bank"];
        $price = $_POST["price"];
        $date_payment = $_POST["date_payment"];
        $time_payment = $_POST["time_payment"];

        // echo $order_number . " " . $payment_method . " " . $select_bank . " " . $price . " " . $date_payment . " " . $time_payment . " " . "<br>";

        $datetime_payment = strtotime($date_payment . " " . $time_payment);

        // echo strtotime($date_payment . " " . $time_payment) . " " . "<br>";
        // echo date("Y-m-d H:i:s", strtotime($date_payment . " " . $time_payment)) . "<br>";

        $time = time();
        $sql = "SELECT `order_id` FROM `orders` ORDER BY `order_id` DESC LIMIT 1";
        $id = selectDataOne($sql)['order_id'];

        $id_new = (int)$id + 1;
        $profile_path = "../../../img/payment/bill/";
        $valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions

        if ($_FILES['picture-payment']) {
            $img = $_FILES['picture-payment']['name'];
            $tmp = $_FILES['picture-payment']['tmp_name'];

            // get uploaded file's extension
            $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
            // echo $ext . "<br>";
            // can upload same image using rand function
            if ($ext == "png") {
                $final_image =  $id_new . "_" . $time . "." . $ext;
            } else {
                $final_image = $id_new . "_" . $time . ".png";
            }

            // echo $final_image . "<br>";

            // check's valid format

            if (in_array($ext, $valid_extensions)) {
                $profile_path = $profile_path . strtolower($final_image);
                // echo  $profile_path;
                if (move_uploaded_file($tmp, $profile_path)) {
                    echo "profile success";
                }
            } else {
                echo 'invalid';
            }
        }

        $sql_order = "UPDATE `orders` SET `total_price_user`='$price',`type_payment`='$payment_method',`time_payment`='$datetime_payment',`picture_payment`='$final_image',`status_order`='2' 
                        WHERE `order_number`='$order_number'";

        updateData($sql_order);

        // echo $sql_order . "<br>";

        $sql = "SELECT * FROM `orders_detail` 
                                INNER JOIN `orders` ON `orders_detail`.`orders_id` = `orders`.`order_id` 
                                WHERE `orders`.`order_number` = '$order_number' 
                                ORDER BY `orders_detail`.`orders_id` DESC LIMIT 1";
        $orders_id = selectDataOne($sql)["orders_id"];

        // echo $orders_id . "<br>";

        $sql_order_detail = "UPDATE `orders_detail` SET `status_order`='2'
        WHERE `orders_id`='$orders_id'";
        updateData($sql_order_detail);
        // echo $sql_order_detail . "<br>";

        $ORDER = "SELECT * FROM `orders` INNER JOIN `orders_detail` ON `orders`.`order_id` = `orders_detail`.`orders_id` WHERE `orders`.`order_number` = '$order_number'";
        $ORDER_DETAIL = selectData($ORDER);

        $daid = $ORDER_DETAIL[1]['daid'];
        // print_r($ORDER_DETAIL);

        for ($i = 1; $i < count($ORDER_DETAIL); $i++) {
            $product_id = $ORDER_DETAIL[$i]['product_id'];
            $pro_name = "SELECT `product_name`, `type`, `price` FROM `product` INNER JOIN `product_type` ON `product`.`product_type` = `product_type`.`id` WHERE `product`.`product_id` = $product_id";
            $p_name = selectData($pro_name);
            $product_name = $p_name[1]['product_name'];
            $product_type = $p_name[1]['type'];
            $product_unit = $ORDER_DETAIL[$i]['quantity_product'];
            $price_unit = $p_name[1]['price'];
            $total_price = $price_unit * $product_unit;
            $OR_DETAIL[] = array($i => array(
                "product_id" => $product_id, "product_name" => $product_name,
                "product_type" => $product_type, "product_unit" => $product_unit, "price_unit" => $price_unit, "total_price" => $total_price
            ));
        }
        //     // print_r($DATA);
        //     // print_r(json_encode($or_detail, JSON_UNESCAPED_UNICODE) . "<br>");
        // }

        $ADD = "SELECT * FROM `delivery_address` INNER JOIN `subdistricts` ON `delivery_address`.`subdistrict` = `subdistricts`.`id`
        INNER JOIN `districts` ON `subdistricts`.`district_id` = `districts`.`id` INNER JOIN `provinces` ON `districts`.`province_id` = `provinces`.`id`
        WHERE `delivery_address`.`daid` = $daid";
        $ADDRESS = selectData($ADD);

        if ($ADDRESS[1]["provinces_name_in_thai"] == "กรุงเทพมหานคร") {
            $SELECTED_ADD = $ADDRESS[1]["address"] .
                " แขวง" . $ADDRESS[1]["subdistricts_name_in_thai"] .
                " " . $ADDRESS[1]["districts_name_in_thai"] .
                " " . $ADDRESS[1]["provinces_name_in_thai"] .
                " " . $ADDRESS[1]["zip_code"];
        } else {
            $SELECTED_ADD = $ADDRESS[1]["address"] .
                " ต." . $ADDRESS[1]["subdistricts_name_in_thai"] .
                " อ." . $ADDRESS[1]["districts_name_in_thai"] .
                " จ." . $ADDRESS[1]["provinces_name_in_thai"] .
                " " . $ADDRESS[1]["zip_code"];
        }
        $shopId = $ORDER_DETAIL[1]['shop_id'];
        $SHOP = getShopProfile($shopId);
        // print_r($SHOP);

        if ($SHOP[1]["provinces_name_in_thai"] == "กรุงเทพมหานคร") {
            $SELECTED_SHOP_ADD = $SHOP[1]["address_shop"] .
                " แขวง" . $SHOP[1]["subdistricts_name_in_thai"] .
                " " . $SHOP[1]["districts_name_in_thai"] .
                " " . $SHOP[1]["provinces_name_in_thai"] .
                " " . $SHOP[1]["zip_code"];
        } else {
            $SELECTED_SHOP_ADD = $SHOP[1]["address_shop"] .
                " ต." . $SHOP[1]["subdistricts_name_in_thai"] .
                " อ." . $SHOP[1]["districts_name_in_thai"] .
                " จ." . $SHOP[1]["provinces_name_in_thai"] .
                " " . $SHOP[1]["zip_code"];
        }

        $SELECTED_ADDRESS = array("id" => $daid, "address" => $SELECTED_ADD);
        $SHOP_ADDRESS = array(
            "shop_id" => $shopId, "shop_name" => $SHOP[1]["shop_name"], "email" => $SHOP[1]["email"],
            "address" => $SELECTED_SHOP_ADD, "tel" => $SHOP[1]["tel"], "time_opened" => $SHOP[1]["time_opened"],
            "time_closed" => $SHOP[1]["time_closed"], "owner_id" => $SHOP[1]["owner_id"]
        );

        $sql_or = "SELECT `uid`, `username`, `firstname`, `lastname`, `user-list`.`tel`, `profile_user` FROM `user-list` 
        INNER JOIN `seller-list` ON `user-list`.`shop_id` = `seller-list`.`shop_id` ";
        $DATA_OR = selectDataOne($sql_or);

        $total_unit = $ORDER_DETAIL[1]['total_unit'];
        $total_price = $ORDER_DETAIL[1]['total_price'];
        $total_price_user = $ORDER_DETAIL[1]['total_price_user'];

        $typid = $ORDER_DETAIL[1]['type_payment'];
        $sql_pay = "SELECT * FROM `type_payment` WHERE `type_payment`.`tpid` = $typid";
        $TYPE_PAYMENT = selectData($sql_pay);
        // print_r($TYPE_PAYMENT);
        $SELECTED_TYPE_PAYMENT = array("id" => $typid, "name" => $TYPE_PAYMENT[1]['type_payment']);

        $time_order = $ORDER_DETAIL[1]['time_order'];
        $time_payment = $ORDER_DETAIL[1]['time_payment'];
        $picture_payment = $ORDER_DETAIL[1]['picture_payment'];
        $status_id = $ORDER_DETAIL[1]['status_order'];

        $sql_status = "SELECT * FROM `status_order` WHERE `status_order`.`so_id` = $status_id";
        $STATUS_OR = selectData($sql_status);
        // print_r($STATUS_OR);
        $STATUS_ORDER = array("id" => $status_id, "status" => $STATUS_OR[1]['status_order']);

        $ORDER = array(
            "order_number" => $order_number, "order_detail" => $OR_DETAIL, "delivery_address" => $SELECTED_ADDRESS,
            "shop" => $SHOP_ADDRESS, "total_unit" => $total_unit, "total_price" => $total_price, "total_price_user" => $total_price_user,
            "type_payment" => $SELECTED_TYPE_PAYMENT, "time_order" => $time_order, "time_payment" => $time_payment, "picture_payment" => $picture_payment,
            "status_order" => $STATUS_ORDER
        );
        $ARRAY_DATA_OR = array("user" => $DATA_OR, "order" => array($id => $ORDER));
        $DATA_ORDER_DETAIL = json_encode($ARRAY_DATA_OR, JSON_UNESCAPED_UNICODE);
        // print_r($DATA_ORDER_DETAIL . "<br>");

        $fp = fopen('../../../data/' . $order_number . '.json', 'w');
        fwrite($fp, $DATA_ORDER_DETAIL);
        fclose($fp);

        header("location: ../purchase/purchase.php");
        break;
}
