<?php
session_start();
$USER = $_SESSION[md5('user')];
require "../../../dbConnect.php";
$request = $_POST['request'];
