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
<style>
    .drowdown-checkout {
        height: 50px;
        width: 100%;
        border: 1px solid #e1e1e1;
        border-radius: 2px;
        margin-bottom: 25px;
        font-size: 14px;
        padding-left: 20px;
        color: #666666;
    }
</style>

<body>
    <?php include_once("../layout/navbar.php"); ?>

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="../../../index.php"><i class="fa fa-home"></i> Home</a>
                        <a href="../shop-cart/shop-cart.php">Shopping cart</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <!-- <div class="row">
                <div class="col-lg-12">
                    <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">Have a coupon?</a> Click
                        here to enter your code.</h6>
                </div>
            </div> -->
            <form action="#" class="checkout__form">
                <div class="row">
                    <div class="col-lg-8">
                        <h5>ที่อยู่จัดส่ง</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>ชื่อ <span>*</span></p>
                                    <input type="text" name="firstname" class="form-control" placeholder="กรุณากรอกชื่อจริง">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>นามสกุล<span>*</span></p>
                                    <input type="text" name="lastname" class="form-control" placeholder="กรุณากรอกนามสกุล">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>เบอร์โทรศัพท์<span>*</span></p>
                                    <input type="text" name="lastname" class="form-control" placeholder="กรุณากรอกเบอร์โทรศัพท์">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p>ที่อยู่ <span>*</span></p>
                                    <input type="text" name="address" class="form-control" placeholder="กรุณากรอกที่อยู่">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>รหัสไปรษณีย์ <span>*</span></p>
                                    <input type="text" name="zipcode" class="form-control" placeholder="กรุณากรอกรหัสไปรษณีย์">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>จังหวัด <span>*</span></p>
                                    <!-- <input type="text" name="province" class="form-control" placeholder="กรุณากรอกจังหวัด"> -->
                                    <select name="zipcode" class="form-control drowdown-checkout">
                                        <option disabled selected>กรุณาเลือกจังหวัด</option>
                                        <option>กรุงเทพมหานคร</option>
                                        <option>นครปฐม</option>
                                        <option>กาญจนบุรี</option>
                                        <option>ราชบุรี</option>
                                        <option>สุพรรณบุรี</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>อำเภอ/เขต <span>*</span></p>
                                    <!-- <input type="text" name="province" class="form-control" placeholder="กรุณากรอกจังหวัด"> -->
                                    <select name="zipcode" class="form-control drowdown-checkout">
                                        <option disabled selected>กรุณาเลือกอำเภอ/เขต</option>
                                        <option>เมืองนครปฐม</option>
                                        <option>นครชัยศรี</option>
                                        <option>สามพราน</option>
                                        <option>ดอนตูม</option>
                                        <option>บางเลน</option>
                                        <option>กำแพงแสน</option>
                                        <option>พุทธมณฑล</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>ตำบล/แขวง <span>*</span></p>
                                    <!-- <input type="text" name="province" class="form-control" placeholder="กรุณากรอกจังหวัด"> -->
                                    <select name="zipcode" class="form-control drowdown-checkout">
                                        <option disabled selected>กรุณาเลือกตำบล/แขวง </option>
                                        <option>กำแพงแสน</option>
                                        <option>กระตีบ</option>
                                        <option>ทุ่งกระพังโหม</option>
                                        <option>รางพิกุล</option>
                                        <option>วังน้ำเขียว</option>
                                        <option>สระพัฒนา</option>
                                        <option>สระสี่มุม</option>
                                        <option>หนองกระทุ่ม</option>
                                        <option>ห้วยขวาง</option>
                                        <option>ห้วยม่วง</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout__order" style="padding-bottom: 100px; ">
                            <h5>รายการสินค้า</h5>
                            <div class="checkout__order__product">
                                <ul>
                                    <li>
                                        <span class="top__text">สินค้า</span>
                                        <span class="top__text__right">ราคา</span>
                                    </li>
                                    <li>01. Chain buck bag <span>$ 300.0</span></li>
                                    <li>02. Zip-pockets pebbled<br /> tote briefcase <span>$ 170.0</span></li>
                                    <li>03. Black jean <span>$ 170.0</span></li>
                                    <li>04. Cotton shirt <span>$ 110.0</span></li>
                                    <hr>
                                    <li>ค่าจัดส่ง <span>$ 45</span></li>
                                </ul>
                            </div>
                            <div class="checkout__order__total">
                                <ul>
                                    <li>ราคารวม <span>& 750.0</span></li>
                                </ul>
                            </div>
                            <div class="checkout__order__widget">
                                <label for="paypal">
                                    โอนผ่านบัญชีธนาคาร
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <a href="../payment/payment.php"><button type="button" class="btn btn-danger" style="border-radius: 50px; width: 300px;">ชำระเงิน</button></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Checkout Section End -->

    <!-- Js Plugins -->
    <?php include_once("../layout/js.php"); ?>
</body>

</html>