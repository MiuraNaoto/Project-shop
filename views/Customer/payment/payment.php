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
    $order_number = $_GET["order_number"];
    $ACCOUNT_SHOP = getBankShop();
    $ORDER_PAYMENT = OrderPayment($order_number);
    // print_r($ORDER_PAYMENT);
    echo $order_number;
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
                        <a href="../shop-cart/shop-cart.php">ตระกร้าสินค้า</a>
                        <a href="../checkout/checkout.php">ยืนยันคำสั่งซื้อ</a>
                        <span>การจ่ายเงิน</span>
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
            <form action="manage.php" method="post" class="checkout__form" enctype="multipart/form-data" id="form-payment" name="form-payment" role="form">
                <div class="row">
                    <div class="col-lg-12">
                        <h5>การชำระเงิน</h5>
                        <div class="row">
                            <?php
                            // $bank_account = "SELECT * FROM `orders` LEFT OUTER JOIN `bank_account` 
                            //                 ON `orders`.`shop_id` = `bank_account`.`shop_id` LEFT OUTER JOIN `bank` 
                            //                 ON `bank_account`.`bankid` = `bank`.`id` WHERE `orders`.`shop_id` = `bank_account`.`shop_id`";
                            // $account = selectData($bank_account);
                            // print_r($account);
                            for ($i = 1; $i < count($ACCOUNT_SHOP); $i++) {

                            ?>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="card">
                                        <img class="card-img-top" src="<?php echo '../../../img/payment/' . $ACCOUNT_SHOP[$i]['picture'] ?>" alt="Card image cap">
                                        <div class="card-body text-center font-weight-bold">
                                            <div class="row mt-2 mb-4 ">

                                                <div class="col-md-5">
                                                    <h6 class="font-weight-bold d-flex justify-content-start" style="font-size: 18px;">เลขบัญชี</h6>
                                                </div>
                                                <div class="col-md-7">
                                                    <h6 class="d-flex justify-content-start"><?php echo $ACCOUNT_SHOP[$i]['account_code'] ?></h6>
                                                </div>
                                            </div>
                                            <div class="row  mt-4">
                                                <div class="col-md-5">
                                                    <h6 class="font-weight-bold d-flex justify-content-start" style="font-size: 18px;">ชื่อบัญชี</h6>
                                                </div>
                                                <div class="col-md-7">
                                                    <h6 class="d-flex justify-content-star"><?php echo $ACCOUNT_SHOP[$i]['account_name'] ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <!-- <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card" style="width: 19rem;">
                                    <img class="card-img-top" src="../../../img/payment/กรุงไทย-1.jpg" alt="Card image cap">
                                    <div class="card-body text-center font-weight-bold">
                                        <div class="row mt-2 mb-4 ">
                                            <div class="col-md-5">
                                                <h6 class="font-weight-bold d-flex justify-content-start" style="font-size: 18px;">เลขบัญชี</h6>
                                            </div>
                                            <div class="col-md-7">
                                                <h6 class="d-flex justify-content-start">097-0-44XXX-X</h6>
                                            </div>
                                        </div>
                                        <div class="row  mt-4">
                                            <div class="col-md-5">
                                                <h6 class="font-weight-bold d-flex justify-content-start" style="font-size: 18px;">ชื่อบัญชี</h6>
                                            </div>
                                            <div class="col-md-7">
                                                <h6 class="d-flex justify-content-star">ขายอะไรก็ไม่รู้ แต่อยากขายนะ</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card" style="width: 19rem;">
                                    <img class="card-img-top" src="../../../img/payment/promptpay.jpg" alt="Card image cap">
                                    <div class="card-body text-center font-weight-bold">
                                        <div class="row mt-2 mb-4 ">
                                            <div class="col-md-5">
                                                <h6 class="font-weight-bold d-flex justify-content-start" style="font-size: 18px;">เลขบัญชี</h6>
                                            </div>
                                            <div class="col-md-7">
                                                <h6 class="d-flex justify-content-start">097-0-44XXX-X</h6>
                                            </div>
                                        </div>
                                        <div class="row  mt-4">
                                            <div class="col-md-5">
                                                <h6 class="font-weight-bold d-flex justify-content-start" style="font-size: 18px;">ชื่อบัญชี</h6>
                                            </div>
                                            <div class="col-md-7">
                                                <h6 class="d-flex justify-content-star">ขายอะไรก็ไม่รู้ แต่อยากขายนะ</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>

                <h5 style="padding-top: 80px;">แนบหลักฐานการโอนเงิน</h5>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-md-5">
                                                <span>หมายเลขคำสั่งซื้อ</span>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" id="ordernumber" name="ordernumber" value="<?php echo $D[1]['order_number'] ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-md-5">
                                                <span>ช่องทางชำระเงิน</span>
                                            </div>
                                            <div class="col-md-7">
                                                <select class="form-control" id="payment_method" required oninvalid="this.setCustomValidity('กรุณาเลือกช่องทางชำระเงิน')" oninput="this.setCustomValidity('')">
                                                    <option disabled selected value="">กรุณาเลือกช่องทางชำระเงิน</option>
                                                    <option value="1">ATM</option>
                                                    <option value="2">Internet Banking</option>
                                                    <option value="3">ชำระผ่านเค้าท์เตอร์ธนาคาร</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-md-6">
                                                <span>ชำระเงินผ่านธนาคาร</span>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-control" id="select_bank" required oninvalid="this.setCustomValidity('กรุณาเลือกธนาคาร')" oninput="this.setCustomValidity('')">
                                                    <option disabled selected value="">กรุณาเลือกธนาคาร</option>
                                                    <?php
                                                    for ($i = 1; $i < count($account); $i++) {

                                                    ?>
                                                        <option value="<?php echo $account[$i]['bankid'] ?>"><?php echo $account[$i]['name'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <div class="checkout__form__input">
                                            <span id="propro"></span>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="picture-payment" name="picture-payment" accept="image/png, image/jpeg, image/jpg" onchange="loadImage(event)" required oninvalid="this.setCustomValidity('กรุณาใส่ภาพหลักฐานการโอนเงิน')" oninput="this.setCustomValidity('')">
                                                <label class="custom-file-label" for="customFile">กรุณาแนบหลักฐานการโอนเงิน</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-md-5">
                                                <span>จำนวนเงิน</span>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="number" class="form-control" id="price" name="price" step="0.1" required oninvalid="this.setCustomValidity('กรุณากรอกจำนวนเงิน')" oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-md-5">
                                                <span>วัน/เดือน/ปี</span>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="date" class="form-control" id="date" name="date" required oninvalid="this.setCustomValidity('กรุณากรอกวันที่ชำระเงิน')" oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-md-6">
                                                <span>เวลาที่ชำระเงิน</span>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="time" class="form-control" id="time" name="time" required oninvalid="this.setCustomValidity('กรุณากรอกเวลาที่ชำระเงิน')" oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="checkout__form__input text-center">
                                            <!-- <a href="../purchase/purchase.php"></a> -->
                                            <input type="hidden" name="request" id="request" value="payment" />
                                            <button type="submit" id="insert" name="insert" class="btn btn-success insert-payment" style="width: 165px;">ยืนยัน</button>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- <div class="card-footer bg-transparent text-right">

                            </div> -->
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </section>
    <!-- Checkout Section End -->

    <!-- Js Plugins -->
    <?php include_once("../layout/js.php"); ?>
    <script src="payment.js"></script>
</body>

</html>