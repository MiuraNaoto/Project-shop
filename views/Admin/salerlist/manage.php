<?php
session_start();
$USER = $_SESSION[md5('user')];
$uid = $USER[1]["uid"];
require "../../../dbConnect.php";
require "../../../query/query.php";
$request = $_POST['request'];
$myConDB = connectDB();

//echo $request . "<br>";

switch ($request) {

    case 'bansaler':
        $shopId = $_POST['shopid'];
        $shop_name = $_POST["shop_name"];
        echo $shopId . " " . $shop_name;

        $sql = "UPDATE `seller-list` SET `is-blocked-saler`='1' WHERE `shop_id`='$shopId'";
        echo $sql;
        $data = updateData($sql);
        print_r($data);
        break;

    case 'unbansaler':
        $shopId = $_POST['shopid'];
        $shop_name = $_POST["shop_name"];
        echo $shopId . " " . $shop_name;

        $sql = "UPDATE `seller-list` SET `is-blocked-saler`='0' WHERE `shop_id`='$shopId'";
        echo $sql;
        $data = updateData($sql);
        print_r($data);
        break;

    // case 'deletesaler':
    //     $userid = $_POST['uid'];
    //     $username = $_POST["username"];
    //     echo $uid . " " . $username;

    //     $sql = "DELETE FROM `user-list` WHERE `user-list`.`uid` = '$userid'";
    //     echo $sql;
    //     $data = updateData($sql);
    //     print_r($data);
    //     break;
}
