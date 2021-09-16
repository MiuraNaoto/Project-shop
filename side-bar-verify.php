<?php
// session_start();
// switch ($_GET['c']) {
//     case 1:
//         $typeid = 1;
//         break;
//     case 2:
//         $typeid = 2;
//         break;
//     case 3:
//         $typeid = 3;
//         break;
//     default:
//         $typeid = 3;
//         break;
// }

// $_SESSION[md5('typeid')] = $typeid;
// header("location:./index.php");
session_start();
$UTID = $_GET['UTID'];
$_SESSION[md5('typeid')] = $UTID;

if ($UTID == 1) {
    header("location: views/Seller/profile/profile.php");
} elseif ($UTID == 2) {
    header("location: views/Seller/customerlist/customer.php");
} else {
    header("location: index.php");
}
