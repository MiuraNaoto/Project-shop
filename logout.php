<?php
session_start();

include_once("./dbConnect.php");
echo "out";
session_destroy();
header("location:index.php");
