<?php
$username = $_POST["username"];
$password = $_POST["password"];
// echo $username;
if ($username == 'admin') {
    header("location: views/Admin/comment-seller/comment-seller.php");
} else {
    header("location:index.php");
}
