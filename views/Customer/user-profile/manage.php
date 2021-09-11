<?php
session_start();
$USER = $_SESSION[md5('user')];
require "../../../dbConnect.php";

$request = $_POST['request'];
$myConDB = connectDB();


switch ($request) {

    case 'insert_address':
        $uid = $USER[1]["uid"];
        $title = $_POST["title"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $tel = $_POST["tel"];
        $provice = $_POST["provice"];
        $district = $_POST["district"];
        $subdistrict = $_POST["subdistrict"];
        $address = $_POST["address"];

        echo $request . "<br>";
        echo $uid . "<br>";
        echo $title . "<br>";
        echo $firstname . "<br>";
        echo $lastname . "<br>";
        echo $provice . "<br>";
        echo $district . "<br>";
        echo $subdistrict . "<br>";
        echo $address . "<br>";

        $sql = "INSERT INTO `delivery_address`(`uid`, `title`, `firstname`, `lastname`, `tel`, `address`, `subdistrict`) VALUES ('$uid','$title','$firstname','$lastname','$tel','$address','$subdistrict')";
        $DATA = addinsertData($sql);

        header("location: ./user-profile.php");
        break;
}
