<!DOCTYPE html>
<html lang="en">

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
                        <span>Favourite</span>
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
                                                <button type="button" class="btn btn-danger rounded-circle d-flex align-items-center d-flex justify-content-center" style="width: 35px; height: 35px;">
                                                    <i class="fas fa-heart" style="color: whitesmoke;"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="cart__product__item__title">
                                            <img src="../../../img/shop-cart/cp-1.jpg" alt="">
                                            <div class="col-lg-12">
                                                <h6>Chain bucket bag</h6>
                                            </div>
                                            <div class="col-lg-12 mt-2 ">
                                                <span class="h5" style="color: #FF6633;">฿1,834</span>
                                            </div>
                                            <div class="col-lg-12 mt-2 ">
                                                <span class="text-muted" style="font-size: 14px;">ขายได้ 1234 ชิ้น</span>
                                            </div>
                                        </div>
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart__product__item">
                                        <div class="row">
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
                                        </div>
                                        <hr>
                                        <div class="cart__product__item__title">
                                            <img src="../../../img/shop-cart/cp-2.jpg" alt="">
                                            <div class="col-lg-12">
                                                <h6>Chain bucket bag</h6>
                                            </div>
                                            <div class="col-lg-12 mt-2 ">
                                                <span class="h5" style="color: #FF6633;">฿1,834</span>
                                            </div>
                                            <div class="col-lg-12 mt-2 ">
                                                <span class="text-muted" style="font-size: 14px;">ขายได้ 1234 ชิ้น</span>
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