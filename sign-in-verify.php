<?php
include_once("./dbConnect.php");
include_once("./getIPAddress.php");

session_start();

session_unset();
$username = $_POST['username'];
$password = $_POST['password'];

echo "user $username passwd $password-" . md5($username . $password) . "<br>";
$sql = "SELECT * FROM `user-list` WHERE `username` = '" . $username . "' AND `password` = '" . md5($username . $password) . "'";

$DATA = selectData($sql);
print_r($DATA);
//print_r($DATA);
//print($DATA[1]['u-is-admin']);
// print($DATA[1]['u-is-researcher']);
// print($DATA[1]['u-is-officer']);
// print($DATA[1]['u-is-farmer']);

if (sizeof($DATA) == 2) {
    if ($DATA[1]['u-is-admin'] == 1) {
        header("location: ./views/Admin/dashboard/dashboard.php");
        $typeid = 1;
    } else if ($DATA[1]['u-is-saler'] == 2) {
        header("location: ./views/Seller/dashboard/dashboard.php");
        $typeid = 2;
    } else {
        header("location: ./index.php");
        $typeid = 3;
    }

    // $_SESSION[md5('LAST_ACTIVITY')] = $_SERVER['REQUEST_TIME'];

    $_SESSION[md5('username')] = $username;
    $_SESSION[md5('password')] = $password;
    $_SESSION[md5('typeid')] = $typeid;
    $_SESSION[md5('user')]   = $DATA;
    $_SESSION[md5($username . $password)] = $_SERVER['REQUEST_TIME'];
} else {
    header("location:login.php");
}
