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
                                        <h5 class="card-title">เลขบัญชี</h5>
                                        <h6 class="card-text">097-0-44XXX-X</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card" style="width: 19rem;">
                                    <img class="card-img-top" src="../../../img/payment/กรุงไทย-1.jpg" alt="Card image cap">
                                    <div class="card-body text-center font-weight-bold">
                                        <h5 class="card-title">เลขบัญชี</h5>
                                        <h6 class="card-text">097-0-44XXX-X</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card" style="width: 19rem;">
                                    <img class="card-img-top" src="../../../img/payment/promptpay.jpg" alt="Card image cap">
                                    <div class="card-body text-center font-weight-bold">
                                        <h5 class="card-title">เลขบัญชี</h5>
                                        <h6 class="card-text">098-765-4321</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h5 style="padding-top: 80px;">แนบหลักฐานการโอนเงิน</h5>
                <div class="row">
                    <div class="col-lg-10 col-md-6 col-sm-6">
                        <div class="checkout__form__input" style="padding-top: 30px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                <label class="custom-file-label" for="validatedCustomFile">กรุณาแนหลักฐานการโอนเงิน</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="checkout__form__input" style="padding-top: 30px;">
                            <a href="../purchase/purchase.php"><button type="button" class="btn btn-success" style="width: 165px;">ยืนยัน</button></a>
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