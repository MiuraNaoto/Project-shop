<!DOCTYPE html>
<html lang="en">

<?php
include_once("../../../query/query.php");
include_once("../../../query/function.php");
session_start();

if (isset($_SESSION[md5('typeid')]) && isset($_SESSION[md5('username')]) && isset($_SESSION[md5('user')])) {
    $idUT = $_SESSION[md5('typeid')];
    $username = $_SESSION[md5('username')];
    $USER = $_SESSION[md5('user')];
    // echo $username;
    // echo print_r($USER);
    $uid = $USER[1]["uid"];
    $NOTIFICATION = getNotification($uid);
}

?>



<head>
    <?php include_once("../layout/header.php") ?>
</head>

<body>
    <?php include_once("../layout/navbar.php"); ?>

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="../../../index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Notification</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <tbody>
                                <?php
                                for ($i = 1; $i < count($NOTIFICATION); $i++) {
                                    print_r($NOTIFICATION)
                                ?>
                                    <tr>
                                        <td class="cart__product__item">
                                            <div class="cart__product__item__title">
                                                <!-- <img src="../../../img/shop-cart/cp-1.jpg" alt=""> -->
                                                <div class="col-lg-12">
                                                   
                                                    <?php 
                                                    if($NOTIFICATION[$i]["status_order"] == "ชำระเงินแล้ว") {
                                                        echo '  <h6>รอการยืนยัน</h6>
                                                                <div class="col-lg-12 mt-2 ">
                                                                    <span class="h6 text-muted">หมายเลขพัสดุ <span class="h6" style="color: green; font-size: 15px;">'.$NOTIFICATION[$i]["order_number"].'</span> ของหมายเลขคำสั่งซื้อ <span class="h6" style="color: green; font-size: 15px;">A652165546441</span></span>
                                                                </div>
                                                        ';
                                                    } else {
                                                        echo "<h6>".$NOTIFICATION[$i]["status_order"]."</h6>";
                                                    }
                                                    ?>
                                                   
                                                </div>
                                               
                                                <div class="col-lg-12 mt-2 ">
                                                    <span class="h6 text-muted">รอยืนยัน</span>
                                                </div>
                                            </div>
                                            <br>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->

    <!-- Js Plugins -->
    <?php include_once("../layout/js.php"); ?>
</body>

</html>