<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../layout/header.php") ?>
</head>
<style>
    #input-fix {
        background-color: white;
        width: 30px;
        text-align: center;
        border: 0px;
        margin: 30px;
    }

    #price {
        padding: 7px;
        border-radius: 5px;
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
                        <a href="../shop-cart/shop-cart.php"> Shopping cart</a>
                        <span>Purchase</span>
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
                                        <div class="row">
                                            <div class="col-md-7 d-flex justify-content-start">
                                                <span class="font-weight-bold mb-0 h6 align-self-center" id="shop-name" style="margin-right: 25px; color: #336633;">ขายอะไรก็ไม่รู้ แต่อยากขายนะ</span>
                                                <a href="../profile-shop/profile-shop.php">
                                                    <button type="button" class="btn btn-outline-success" style="font-size: 12px;">ดูร้านค้า <i class="fas fa-store"></i></button>
                                                </a>
                                            </div>
                                            <div class="col-md-5 d-flex justify-content-end">
                                                <span class="mb-0 h6 align-self-center text-warning" style="margin-right: 25px;"><i class="far fa-clock"></i> กำลังรอตรวจสอบ</span>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="cart__product__item__title">
                                            <img src="../../../img/product/Seller/drink.png" alt="" width="90px" height="90px">
                                            <h6>น้ำส้มสูตรโปบราณพึ่งคิดได้เมื่อวานแต่บอกโบราณเผื่อขายดี </h6>
                                            <p class="h6 mt-2 text-muted" style="font-size: 14px;">ตัวเลือกสินค้า : น้ำส้มปั่น</p>
                                            <h6 class="text-muted" style="font-size: 14px;">x 1 <span class="mb-0 h6" style="margin-top: 65px; margin-left: 955px;">฿10</span></h6>
                                        </div>
                                        <hr>
                                        <div class="col-12 d-flex justify-content-end align-self-center">
                                            <span class="mb-0 h6 text-muted" style="margin-right: 25px;">ยอดคำสั่งซื้อทั้งหมด </span>
                                            <span class="mb-0 h5" style="color: #FF6633;">฿10</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart__product__item">
                                        <div class="row">
                                            <div class="col-md-6 d-flex justify-content-start">
                                                <span class="font-weight-bold mb-0 h6 align-self-center" id="shop-name" style="margin-right: 25px; color: #336633;">ขายอะไรก็ไม่รู้ แต่อยากขายนะ</span>
                                                <a href="../profile-shop/profile-shop.php">
                                                    <button type="button" class="btn btn-outline-success" style="font-size: 12px;">ดูร้านค้า <i class="fas fa-store"></i></button>
                                                </a>
                                            </div>
                                            <div class="col-md-6 d-flex justify-content-end">
                                                <span class="mb-0 h6 align-self-center text-danger" style="margin-right: 25px;"><i class="fa fa-times" aria-hidden="true"></i> เกิดข้อผิดพลาดเนื่องจากโอนเงินมาไม่ครบจำนวน กรุณาติดต่อร้านค้า</span>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="cart__product__item__title">
                                            <img src="../../../img/product/Seller/drink.png" alt="" width="90px" height="90px">
                                            <h6>น้ำส้มสูตรโปบราณพึ่งคิดได้เมื่อวานแต่บอกโบราณเผื่อขายดี </h6>
                                            <p class="h6 mt-2 text-muted" style="font-size: 14px;">ตัวเลือกสินค้า : น้ำส้มปั่น</p>
                                            <h6 class="text-muted" style="font-size: 14px;">x 2 <span class="mb-0 h6" style="margin-top: 65px; margin-left: 955px;">฿20</span></h6>
                                        </div>
                                        <hr>
                                        <div class="col-12 d-flex justify-content-end align-self-center">
                                            <span class="mb-0 h6 text-muted" style="margin-right: 25px;">ยอดคำสั่งซื้อทั้งหมด </span>
                                            <span class="mb-0 h5" style="color: #FF6633;">฿20</span>
                                        </div>
                                        <!-- <div class="col-3" style="float: right;">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                                            </div>
                                        </div> -->
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart__product__item">
                                        <div class="row">
                                            <div class="col-md-7 d-flex justify-content-start">
                                                <span class="font-weight-bold mb-0 h6 align-self-center" id="shop-name" style="margin-right: 25px; color: #336633;">ขายอะไรก็ไม่รู้ แต่อยากขายนะ</span>
                                                <a href="../profile-shop/profile-shop.php">
                                                    <button type="button" class="btn btn-outline-success" style="font-size: 12px;">ดูร้านค้า <i class="fas fa-store"></i></button>
                                                </a>
                                            </div>
                                            <div class="col-md-5 d-flex justify-content-end">
                                                <span class="mb-0 h6 align-self-center text-success" style="margin-right: 25px;"><i class="fas fa-truck"></i> พัสดุถูกจัดส่งสำเร็จแล้ว</span>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="cart__product__item__title">
                                            <img src="../../../img/shop-cart/cp-1.jpg" alt="">
                                            <h6>Chain bucket bag</h6>
                                            <p class="h6 mt-2 text-muted" style="font-size: 14px;">ตัวเลือกสินค้า : สีดำ</p>
                                            <h6 class="text-muted" style="font-size: 14px;">x 1 <span class="mb-0 h6" style="margin-top: 65px; margin-left: 942px;">฿1,834</span></h6>
                                        </div>
                                        <br>
                                        <div class="cart__product__item__title">
                                            <img src="../../../img/shop-cart/cp-2.jpg" alt="">
                                            <h6>bucket bag</h6>
                                            <p class="h6 mt-2 text-muted" style="font-size: 14px;">ตัวเลือกสินค้า : สีขาว</p>
                                            <h6 class="text-muted" style="font-size: 14px;">x 1 <span class="mb-0 h6" style="margin-top: 65px; margin-left: 942px;">฿1,530</span></h6>
                                        </div>
                                        <hr>
                                        <div class="col-12 d-flex justify-content-end align-self-center">
                                            <span class="mb-0 h6 text-muted" style="margin-right: 25px;">ยอดคำสั่งซื้อทั้งหมด </span>
                                            <span class="mb-0 h5" style="color: #FF6633;">฿3,364</span>
                                        </div>
                                        <br>
                                        <div class="col-12 d-flex justify-content-end align-self-center">
                                            <button type="button" class="btn btn-warning text-light" style="background-color: orangered; margin-right: 10px; width: 120px;" data-toggle="modal" data-target="#rateingModal">ให้คะแนน</button>
                                            <a href="../profile-shop/profile-shop.php"><button type="button" class="btn btn-secondary" style="width: 120px;">ซื้ออีกครั้ง</button></a>

                                        </div>
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
    <?php
    include_once("../layout/js.php");
    include_once("purchaseModal.php");
    ?>
    <script src="purchase.js"></script>
</body>

</html>