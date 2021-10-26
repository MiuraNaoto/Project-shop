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

        $file_json = file_get_contents('../../../data/' . $order_number . '.json');
        $ORDER = json_decode($file_json, true);
        $ORDER["order"]["status_order"]["id"] = "3";
        $ORDER["order"]["status_order"]["status"] = "ยืนยันการชำระ";

        $newJsonString = json_encode($ORDER, JSON_UNESCAPED_UNICODE);
        file_put_contents('../../../data/' . $order_number . '.json', $newJsonString);

        // echo $status_order . "<br>";
        // echo $status_order_detail . "<br>";
        break;

    case 'disapproved_order':
        $order_id = $_POST["order_id"];
        $order_number = $_POST["order_number"];
        // echo $order_number;
        $reason = $_POST["reason"];
        $reason_desc = $_POST["reason_desc"];

        echo  $order_id . " " . $order_number . " " . $reason . " " .  $reason_desc;

        $disapproved_order = "UPDATE `orders` SET `status_order`='4',`reason_id`='$reason',`reason_desc`='$reason_desc' WHERE `order_id`='$order_id' AND `order_number`='$order_number'";
        updateData($disapproved_order);

        $disapproved_order_detail = "UPDATE `orders_detail` SET `status_order`='4' WHERE `orders_id`='$order_id'";
        updateData($disapproved_order_detail);

        $sql = "SELECT * FROM `reason` WHERE `id` = $reason";
        $r = selectData($sql);
        // print_r($r);
        // echo $r[1]['reason'];

        $file_json = file_get_contents('../../../data/' . $order_number . '.json');
        $ORDER = json_decode($file_json, true);
        $ORDER["order"]["status_order"]["id"] = "4";
        $ORDER["order"]["status_order"]["status"] = "ไม่อนุมัติคำสั่งซื้อ";
        $ORDER["order"]["status_order"]["reason"] = $r[1]['reason'];
        $ORDER["order"]["status_order"]["reason_desc"] = $reason_desc;

        $newJsonString = json_encode($ORDER, JSON_UNESCAPED_UNICODE);
        file_put_contents('../../../data/' . $order_number . '.json', $newJsonString);

        break;

    case 'cancel_order':
        $order_id = $_POST["order_id"];
        $order_number = $_POST["order_number"];
        // echo  $order_id . " " . $order_number;

        $status_order = "UPDATE `orders` SET `status_order`='5', `status_refund`='0' WHERE `order_id`='$order_id' AND `order_number`='$order_number'";
        updateData($status_order);

        $status_order_detail = "UPDATE `orders_detail` SET `status_order`='5' WHERE `orders_id`='$order_id'";
        updateData($status_order_detail);

        $file_json = file_get_contents('../../../data/' . $order_number . '.json');
        $ORDER = json_decode($file_json, true);
        $ORDER["order"]["status_order"]["id"] = "5";
        $ORDER["order"]["status_order"]["status"] = "ยกเลิกคำสั่งซื้อ";
        $ORDER["order"]["status_order"]["status_refund"] = "0";

        $newJsonString = json_encode($ORDER, JSON_UNESCAPED_UNICODE);
        file_put_contents('../../../data/' . $order_number . '.json', $newJsonString);

        break;
    case 'confirm_refund':
        $order_id = $_POST["order_id"];
        $order_number = $_POST["order_number"];

        echo  $order_id . " " . $order_number;

        $refund = "UPDATE `orders` SET `status_refund`='1' WHERE `order_id`='$order_id' AND `order_number`='$order_number'";
        updateData($refund);

        $file_json = file_get_contents('../../../data/' . $order_number . '.json');
        $ORDER = json_decode($file_json, true);
        $ORDER["order"]["status_order"]["id"] = "5";
        $ORDER["order"]["status_order"]["status"] = "ยกเลิกคำสั่งซื้อ";
        $ORDER["order"]["status_order"]["status_refund"] = "1";

        $newJsonString = json_encode($ORDER, JSON_UNESCAPED_UNICODE);
        file_put_contents('../../../data/' . $order_number . '.json', $newJsonString);

        break;
}
