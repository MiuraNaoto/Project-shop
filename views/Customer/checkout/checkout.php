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
    $uid = $USER[1]["uid"];
    // echo $username;
    // echo print_r($USER);
    $ADDRESS_DELIVERTY = getAddressUser($uid);
    // print_r($ADDRESS_DELIVERTY);
    $SHOPING_CART = getShopingCart($uid);
    // print_r($SHOPING_CART);
}
?>


<head>
    <?php include_once("../layout/header.php") ?>
    <link rel="stylesheet" href="checkout.css">
</head>
<style>

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
                        <a href="../shop-cart/shop-cart.php">ตระกร้าสินค้า</a>
                        <span>ยืนยันคำสั่งซื้อ</span>
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
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card mb-3">
                                    <!-- <div class="card-header">Header</div> -->
                                    <div class="card-body">

                                        <!-- <div class="row">
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
                                        </div> -->
                                        <?php
                                        for ($i = 1; $i < count($ADDRESS_DELIVERTY); $i++) {
                                            if ($i == 1) {
                                        ?>

                                                <h5 class="card-title"><?php echo $ADDRESS_DELIVERTY[$i]["title"] . $ADDRESS_DELIVERTY[$i]["firstname"] . " " . $ADDRESS_DELIVERTY[$i]["lastname"] ?></h5>
                                            <?php } ?>
                                            <!-- <div class="card mb-4">
                                                <div class="card-header card-bg font-weight-bold" style="color:<?= $color ?>;">
                                                    <div class="row">
                                                        <div class="col-md-4 d-flex justify-content-end">
                                                            <button type="button" daid="<?php echo $ADDRESS_USER[$i]["daid"] ?>" title="<?Php echo $ADDRESS_USER[$i]["title"] ?>" firstname="<?Php echo $ADDRESS_USER[$i]["firstname"] ?>" lastname="<?Php echo $ADDRESS_USER[$i]["lastname"] ?>" tel="<?Php echo $ADDRESS_USER[$i]["tel"] ?>" address="<?Php echo $ADDRESS_USER[$i]["address"] ?>" subdistrict="<?php echo $ADDRESS_USER[$i]["subdistrict"] ?>" province_id="<?php echo $ADDRESS_USER[$i]["province_id"] ?>" district_id="<?php echo $ADDRESS_USER[$i]["district_id"] ?>" subdistrict_name="<?php echo $ADDRESS_USER[$i]["subdistricts_name_in_thai"] ?>" district_name="<?php echo $ADDRESS_USER[$i]["districts_name_in_thai"] ?>" province_name="<?php echo $ADDRESS_USER[$i]["provinces_name_in_thai"] ?>" class="btn btn-warning text-light edit-address" title='แก้ไขข้อมูลที่อยู่ตัดส่ง' data-toggle="modal" data-target="#edit_address_modal">
                                                                <i class="fas fa-edit"></i>
                                                                <span>&nbsp;<?php echo "แก้ไขที่อยู่จัดส่ง " . $i ?></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            <div class="card mb-4">
                                                <div class="card-header card-bg font-weight-bold" style="color:<?= $color ?>;">
                                                    <div class="row">
                                                        <h6 class="card-text"><?php
                                                                                if ($ADDRESS_DELIVERTY[$i]["provinces_name_in_thai"] == "กรุงเทพมหานคร") {
                                                                                    echo "เลขที่ " . $ADDRESS_DELIVERTY[$i]["address"] .
                                                                                        " แขวง" . $ADDRESS_DELIVERTY[$i]["subdistricts_name_in_thai"] .
                                                                                        " " . $ADDRESS_DELIVERTY[$i]["districts_name_in_thai"] .
                                                                                        " " . $ADDRESS_DELIVERTY[$i]["provinces_name_in_thai"] .
                                                                                        ", " . $ADDRESS_DELIVERTY[$i]["zip_code"];
                                                                                } else {
                                                                                    echo "เลขที่" . $ADDRESS_DELIVERTY[$i]["address"] .
                                                                                        " ต." . $ADDRESS_DELIVERTY[$i]["subdistricts_name_in_thai"] .
                                                                                        " อ." . $ADDRESS_DELIVERTY[$i]["districts_name_in_thai"] .
                                                                                        " จ." . $ADDRESS_DELIVERTY[$i]["provinces_name_in_thai"] .
                                                                                        ", " . $ADDRESS_DELIVERTY[$i]["zip_code"];
                                                                                }
                                                                                ?>
                                                        </h6>
                                                        <div class="col-md d-flex justify-content-end">
                                                            <input type="radio" name="selected_address" id="selected_address" value="<?php echo $ADDRESS_DELIVERTY[$i]["daid"] ?>" onclick="selected_add('<?php echo $ADDRESS_DELIVERTY[$i]['daid'] ?>')" class="form-check-input" title='เลือกที่อยู่จัดส่ง' required/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php

                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout__order" style="padding-bottom: 100px; ">
                            <h5>รายการสินค้า</h5>
                            <div class="checkout__order__product">
                                <table style="width: 100%;">

                                    <thead>
                                        <tr>
                                            <th style="text-align: center;"></th>
                                            <th style="text-align: left;">สินค้า</th>
                                            <th style="text-align: center;"></th>
                                            <th style="text-align: right;">ราคา</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        for ($i = 1; $i < count($SHOPING_CART); $i++) {
                                        ?>
                                            <tr>
                                                <td style="text-align: left;"><?php echo  $i; ?></td>
                                                <td style="text-align: left;"><?php echo  $SHOPING_CART[$i]["product_name"]; ?></td>
                                                <td style="text-align: left;"><?php echo  "x" . $SHOPING_CART[$i]["quantity"]; ?></td>
                                                <td style="text-align: right;"><?php echo  "฿ " . number_format($SHOPING_CART[$i]["price"] * $SHOPING_CART[$i]["quantity"], 2); ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>

                                </table>

                                <!-- <ul>
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
                                </ul> -->
                            </div>
                            <div class="checkout__order__total">
                                <ul>
                                    <li id='total_price'>ราคารวม <span>
                                            <?php
                                            for ($i = 1; $i < count($SHOPING_CART); $i++) {
                                                $price = $SHOPING_CART[$i]["price"] * $SHOPING_CART[$i]["quantity"];
                                                // echo $price;
                                                $PRICES[] = $price;
                                                $QUANTITY[] = $SHOPING_CART[$i]["quantity"];
                                                $ORDER_DETAIL[] = array(
                                                    "product_id" => $SHOPING_CART[$i]['product_id'],
                                                    "shop_id" => $SHOPING_CART[$i]['shop_id'],
                                                    "quantity" => $SHOPING_CART[$i]['quantity']
                                                );
                                                // array_push($PRICES, $price);
                                            }
                                            $ORDER_DETAIL_json = json_encode($ORDER_DETAIL);
                                            echo number_format(array_sum($PRICES), 2);
                                            $QUANTITY_json = json_encode(number_format(array_sum($QUANTITY), 2));
                                            // print_r($PRICES);
                                            // print_r($ORDER_DETAIL_json)

                                            ?>
                                        </span></li>
                                </ul>
                            </div>
                            <script type="text/javascript">
                                var obj = JSON.parse('<?= $ORDER_DETAIL_json; ?>');
                                var total_unit = JSON.parse('<?= $QUANTITY_json; ?>');
                                // console.log(obj)
                            </script>
                            <!-- <div class="checkout__order__widget">
                                    <label for="paypal">
                                        โอนผ่านบัญชีธนาคาร
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div> -->
                            <button type="button" class="btn btn-danger" style="border-radius: 50px; width: 300px;" onclick="payment(obj, total_unit)">ชำระเงิน</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Checkout Section End -->

    <!-- Js Plugins -->
    <?php include_once("../layout/js.php"); ?>
    <script src="checkout.js"></script>
</body>

</html>