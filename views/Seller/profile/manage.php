<?php
session_start();
$USER = $_SESSION[md5('user')];
$uid = $USER[1]["uid"];
require "../../../dbConnect.php";

$request = $_POST['request'];
$myConDB = connectDB();

echo $request . "<br>";

switch ($request) {

    case 'insert_bank':
        $banktype = $_POST["banktype"];
        $bankname = $_POST["bankname"];
        $bankcode = $_POST["bankcode"];

        // echo $banktype . "<br>";
        // echo $bankname . "<br>";
        // echo $bankcode . "<br>";
        $sql = "INSERT INTO `bank_account`(`account_code`, `account_name`, `bankid`, `uid`) VALUES ('$bankcode','$bankname','$banktype','$uid')";
        // echo $sql;
        $DATA = addinsertData($sql);
        // echo $DATA;

        header("location: ./profile.php");
        break;
}
