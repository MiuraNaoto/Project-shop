<?php
session_start();
$USER = $_SESSION[md5('user')];
$uid = $USER[1]["uid"];
require "../../../dbConnect.php";

$request = $_POST['request'];
$myConDB = connectDB();

echo $request . "<br>";

switch ($request) {

    case 'order_detal':


        break;
}
