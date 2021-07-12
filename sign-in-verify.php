<?php
$username = $_POST["username"];
$password = $_POST["password"];
// echo $username;
if ($username == 'admin') {
    header("location: views/Seller/dashboard/dashboard.php");
} else {
    header("location:index.php");
}
