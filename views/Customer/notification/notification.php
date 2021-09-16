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
                                <tr>
                                    <td class="cart__product__item">
                                        <!-- <div class="row">
                                            <div class="col-md-7 d-flex justify-content-start">
                                                <span class="font-weight-bold mb-0 h6 align-self-center" id="shop-name" style="margin-right: 25px; color: #336633;">ขายอะไรก็ไม่รู้ แต่อยากขายนะ</span>
                                                <a href="../profile-shop/profile-shop.php">
                                                    <button type="button" class="btn btn-outline-success" style="font-size: 12px;">ดูร้านค้า <i class="fas fa-store"></i></button>
                                                </a>
                                            </div>
                                            <div class="col-md-5 d-flex justify-content-end">
                                                <button type="button" class="btn btn-danger rounded-circle d-flex align-items-center d-flex justify-content-center" style="width: 35px; height: 35px;">
                                                    <i class="fas fa-heart" style="color: whitesmoke;"></i>
                                                </button>
                                            </div>
                                        </div> -->
                                        <hr>
                                        <div class="cart__product__item__title">
                                            <img src="../../../img/shop-cart/cp-1.jpg" alt="">
                                            <div class="col-lg-12">
                                                <h6>สินค้าถูกจัดส่งแล้ว</h6>
                                            </div>
                                            <div class="col-lg-12 mt-2 ">
                                                <span class="h6 text-muted">หมายเลขพัสดุ <span class="h6" style="color: green; font-size: 15px;">012213465466515</span> ของหมายเลขคำสั่งซื้อ <span class="h6" style="color: green; font-size: 15px;">A652165546441</span></span>
                                            </div>
                                            <div class="col-lg-12 mt-2 ">
                                                <span class="h6 text-muted">รอยืนยัน</span>
                                            </div>
                                        </div>
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart__product__item">
                                        <!-- <div class="row">
                                            <div class="col-md-7 d-flex justify-content-start">
                                                <span class="font-weight-bold mb-0 h6 align-self-center" id="shop-name" style="margin-right: 25px; color: #336633;">ขายอะไรก็ไม่รู้ แต่อยากขายนะ</span>
                                                <a href="../profile-shop/profile-shop.php">
                                                    <button type="button" class="btn btn-outline-success" style="font-size: 12px;">ดูร้านค้า <i class="fas fa-store"></i></button>
                                                </a>
                                            </div>
                                            <div class="col-md-5 d-flex justify-content-end">
                                                <button type="button" class="btn btn-danger rounded-circle d-flex align-items-center d-flex justify-content-center" style="width: 35px; height: 35px;">
                                                    <i class="fas fa-heart" style="color: whitesmoke;"></i>
                                                </button>
                                            </div>
                                        </div> -->
                                        <hr>
                                        <div class="cart__product__item__title">
                                            <img src="../../../img/shop-cart/cp-1.jpg" alt="">
                                            <div class="col-lg-12">
                                                <h6>สินค้าถูกจัดส่งแล้ว</h6>
                                            </div>
                                            <div class="col-lg-12 mt-2 ">
                                                <span class="h6 text-muted">หมายเลขพัสดุ <span class="h6" style="color: green; font-size: 15px;">012213465466515</span> ของหมายเลขคำสั่งซื้อ <span class="h6" style="color: green; font-size: 15px;">A652165546441</span></span>
                                            </div>
                                            <div class="col-lg-12 mt-2 ">
                                                <span class="h6 text-muted">กำลังจัดส่ง</span>
                                            </div>
                                        </div>
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart__product__item">
                                        <!-- <div class="row">
                                            <div class="col-md-7 d-flex justify-content-start">
                                                <span class="font-weight-bold mb-0 h6 align-self-center" id="shop-name" style="margin-right: 25px; color: #336633;">Chole</span>
                                                <a href="../profile-shop/profile-shop.php">
                                                    <button type="button" class="btn btn-outline-success" style="font-size: 12px;">ดูร้านค้า <i class="fas fa-store"></i></button>
                                                </a>
                                            </div>
                                            <div class="col-md-5 d-flex justify-content-end">
                                                <button type="button" class="btn btn-danger rounded-circle d-flex align-items-center d-flex justify-content-center" style="width: 35px; height: 35px;">
                                                    <i class="fas fa-heart" style="color: whitesmoke;"></i>
                                                </button>
                                            </div>
                                        </div> -->
                                        <hr>
                                        <div class="cart__product__item__title">
                                            <img src="../../../img/shop-cart/cp-2.jpg" alt="">
                                            <div class="col-lg-12">
                                                <h6>สินค้าถูกจัดส่งแล้ว</h6>
                                            </div>
                                            <div class="col-lg-12 mt-2 ">
                                                <span class="h6 text-muted">หมายเลขพัสดุ <span class="h6" style="color: green; font-size: 15px;">012213465466515</span> ของหมายเลขคำสั่งซื้อ <span class="h6" style="color: green; font-size: 15px;">A652165546441</span></span>
                                            </div>
                                            <div class="col-lg-12 mt-2 ">
                                                <span class="h6 text-muted">จัดส่งสำเร็จ</span>
                                            </div>
                                        </div>
                                        <br>
                                    </td>
                                </tr>
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