<?php
session_start();
$USER = $_SESSION[md5('user')];
$uid = $USER[1]["uid"];
require "../../../dbConnect.php";

$request = $_POST['request'];
$myConDB = connectDB();

echo $request . "<br>";

switch ($request) {

    case 'insert_address':

        $title = $_POST["title"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $tel = $_POST["tel"];
        $provice = $_POST["provice"];
        $district = $_POST["district"];
        $subdistrict = $_POST["subdistrict"];
        $address = $_POST["address"];

        // echo $uid . "<br>";
        // echo $title . "<br>";
        // echo $firstname . "<br>";
        // echo $lastname . "<br>";
        // echo $provice . "<br>";
        // echo $district . "<br>";
        // echo $subdistrict . "<br>";
        // echo $address . "<br>";

        $sql = "INSERT INTO `delivery_address`(`uid`, `title`, `firstname`, `lastname`, `tel`, `address`, `subdistrict`) VALUES ('$uid','$title','$firstname','$lastname','$tel','$address','$subdistrict')";
        $DATA = addinsertData($sql);

        header("location: ./user-profile.php");
        break;
    case 'edit_user':
        $username = $_POST["e_username"];
        $tel = $_POST["e_tel"];

        // echo $username . "<br>";
        // echo $tel . "<br>";

        $sql = "UPDATE `user-list` SET `username`='$username', `tel`='$tel' WHERE `uid`='$uid'";
        $DATA = updateData($sql);
        header("location: ./user-profile.php");
        break;
}

unset($_POST);
unset($_SESSION);