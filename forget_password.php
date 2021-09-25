<?php
include_once("./dbConnect.php");

$username = $_POST["f_username"];
$password = md5($username . $_POST["forget_password"]);

$sql = "UPDATE `user-list` SET `password`='$password' WHERE `username`='$username'";
updateData($sql);

header("location: login.php");
