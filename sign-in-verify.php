<?php
$username = $_POST["username"];
$password = $_POST["password"];
// echo $username;
if ($username == 'admin') {
    header("location: views/Admin/order/order.php");
} else {
    header("location:index.php");
}
