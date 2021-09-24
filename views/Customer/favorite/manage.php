<?php
session_start();
$USER = $_SESSION[md5('user')];
$uid = $USER[1]["uid"];
require "../../../dbConnect.php";

$request = $_POST['request'];
$myConDB = connectDB();

echo $request . "<br>";

switch ($request) {
    case 'favourite':
        $product_id = $_POST["product_id"];

        $unfavourite = "DELETE FROM `favourite` WHERE `product_id` = '$product_id' AND `uid` = '$uid'";
        deleteData($unfavourite);


        break;
}
