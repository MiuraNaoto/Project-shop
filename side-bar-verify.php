<?php
session_start();
switch ($_GET['c']) {
    case 1:
        $typeid = 1;
        break;
    case 2:
        $typeid = 2;
        break;
    case 3:
        $typeid = 3;
        break;
    default:
        $typeid = 3;
        break;
}

$_SESSION[md5('typeid')] = $typeid;
header("location:./index.php");
