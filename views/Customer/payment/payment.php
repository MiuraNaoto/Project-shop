<!DOCTYPE html>
<html lang="en">

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
                        <a href="../checkout/checkout.php">Checkout</a>
                        <span>Payment</span>
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
                    <div class="col-lg-12">
                        <h5>การชำระเงิน</h5>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card" style="width: 19rem;">
                                    <img class="card-img-top" src="../../../img/payment/SCB.png" alt="Card image cap">
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
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
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
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
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
                            </div>
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
                                                <input type="text" class="form-control" id="ordernumber" name="ordernumber" value="17500859897465" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-md-5">
                                                <span>ช่องทางชำระเงิน</span>
                                            </div>
                                            <div class="col-md-7">
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option disabled selected>กรุณาเลือกช่องทางชำระเงิน</option>
                                                    <option>ATM</option>
                                                    <option>Internet Banking</option>
                                                    <option>ชำระผ่านเค้าท์เตอร์ธนาคาร</option>
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
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option disabled selected>กรุณาเลือกธนาคาร</option>
                                                    <option>ธนาคารไทยพาณิชย์</option>
                                                    <option>ธนาคารกรุงไทย</option>
                                                    <option>ธนาคารทหารไทย</option>
                                                    <option>ธนาคารกรุงเทพ</option>
                                                    <option>ธนาคารทหารไทย</option>
                                                    <option>ธนาคารกสิกร</option>
                                                    <option>ธนาคารออมสิน</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <div class="checkout__form__input">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                                <label class="custom-file-label" for="validatedCustomFile">กรุณาแนหลักฐานการโอนเงิน</label>
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
                                                <input type="number" class="form-control" id="price" name="price" step="0.1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-md-5">
                                                <span>วัน/เดือน/ปี</span>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="date" class="form-control" id="date" name="date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-md-6">
                                                <span>เวลาที่ชำระเงิน</span>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="time" class="form-control" id="time" name="time">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="checkout__form__input text-center">
                                            <a href="../purchase/purchase.php"><button type="button" class="btn btn-success" style="width: 165px;">ยืนยัน</button></a>
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
</body>

</html>