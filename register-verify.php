<?php
include_once("dbConnect.php");

$tel = $_POST["tel"];
$username = $_POST["username"];
$password = $_POST["password"];
$time = time();

echo "tel\t: " . $tel . "<br>" . "username\t: " . $username . "<br>" . "password\t: " . $password . "<br>";

$sql = "INSERT INTO `user-list`(`username`, `password`, `tel`, `profile_user`, `u-is-admin`, `u-is-user`, `u-is-saler`, `is-blocked-user`, `modify_user`) VALUES ('$username', '" . md5($username . $password) . "' , '$tel', 'default_user.png', 0, 1, 0, 0, '$time')";
$DATA = addinsertData($sql);
echo $sql;

header("location: ./login.php");
