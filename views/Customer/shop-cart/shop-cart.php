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

    // echo print_r($USER);

}
$SHOPING_CART = getShopingCart($uid);
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
                        <span>ตระกร้าสินค้า</span>
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
                            <thead>
                                <tr>
                                    <th style="width: 120px;"></th>
                                    <th>สินค้า</th>
                                    <th>ราคา</th>
                                    <th>จำนวน</th>
                                    <th>ราคารวม</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 1; $i < count($SHOPING_CART); $i++) {
                                ?>
                                    <tr>
                                        <td style="width: 120px; text-align: center;">
                                            <img src="<?php echo "../../../img/product/profile/" . $SHOPING_CART[$i]["profile_product"]; ?>" width="70px" height="70px" alt="">
                                        </td>
                                        <td class="cart__product__item">
                                            <div class="cart__product__item__title">
                                                <h6><?php echo  $SHOPING_CART[$i]["product_name"]; ?></h6>
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__price"><?php echo  "฿ " . number_format($SHOPING_CART[$i]["price"], 2); ?></td>
                                        <td class="cart__quantity">
                                            <div class="pro-qty" id="pro-qty" name="pro-qty">
                                                <input type="number" id="quantity" name="quantity" value="<?php echo  $SHOPING_CART[$i]["quantity"]; ?>">
                                            </div>
                                        </td>
                                        <td class="cart__total" id="cart__total" name="cart__total"><?php echo  "฿ " . number_format($SHOPING_CART[$i]["price"] * $SHOPING_CART[$i]["quantity"], 2); ?></td>

                                        <td class="cart__close">
                                            <button type="button" class="btn btn-secondary btn-lg rounded-circle" onclick="">
                                                <!-- <span class="icon_close"></span> -->
                                                <i class="fa fa-times"></i>
                                            </button>
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
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="../../../index.php">Continue Shopping</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn" style="cursor: pointer;">
                        <a><span class="icon_loading"></span> Update cart</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="discount__content">
                        <!-- <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">Apply</button>
                        </form> -->
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>ยอดสั่งซื้อรวม</h6>
                        <ul>
                            <!-- <li>Subtotal <span>$ 750.0</span></li> -->
                            <li>ราคารวม <span>
                                    <?php
                                    for ($i = 1; $i < count($SHOPING_CART); $i++) {
                                        $price = $SHOPING_CART[$i]["price"] * $SHOPING_CART[$i]["quantity"];
                                        $PRICES = [];
                                        array_push($PRICES, $price);
                                    }
                                    echo number_format(array_sum($PRICES), 2);
                                    ?>

                                </span></li>
                        </ul>
                        <a href="../checkout/checkout.php" class="primary-btn btn btn-danger" style="width: 280px;">ยืนยันคำสั่งซื้อ</a>
                        <!-- <a href="../checkout/checkout.php" class="primary-btn"></a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->

    <!-- Js Plugins -->
    <?php include_once("../layout/js.php"); ?>
    <script src="shop-cart.js"></script>
</body>

</html>