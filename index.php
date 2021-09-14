<?php
// include_once("query/query.php");
include_once("./dbConnect.php");
session_start();

if (isset($_SESSION[md5('typeid')]) && isset($_SESSION[md5('username')]) && isset($_SESSION[md5('user')])) {
    $idUT = $_SESSION[md5('typeid')];
    $username = $_SESSION[md5('username')];
    $USER = $_SESSION[md5('user')];
    echo $username;
    echo print_r($USER);
}

function getProductType()
{
    $sql = "SELECT * FROM `product_type`";
    $DATA = selectData($sql);
    return $DATA;
}

function getAllProductByType($type_id)
{
    $sql = "SELECT * FROM `product` WHERE `product_type` = $type_id";
    $DATA = selectData($sql);
    return $DATA;
}

$PRODUCT_TYPE = getProductType();
$PRODUCTBYTYPE_FOOD = getAllProductByType(1);
$PRODUCTBYTYPE_DRINK = getAllProductByType(2);
$PRODUCTBYTYPE_CLOTHES = getAllProductByType(3);
$PRODUCTBYTYPE_ACCESSORIES = getAllProductByType(4);
$PRODUCTBYTYPE_HERB = getAllProductByType(5);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OTOP</title>
    <link rel="shortcut icon" type="image/x-icon" href="./img/icon/market.png" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<style>

</style>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li>
                <a href="#"><span class="icon_heart_alt"></span>
                    <div class="tip">2</div>
                </a>
            </li>
            <li>
                <a href="./shop-cart.html">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <!-- <span class="icon_bag_alt"></span> -->
                    <div class="tip">2</div>
                </a>
            </li>
        </ul>
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="login.php">Login</a>
            <a href="login.php">สมัครสมาชิกผู้ขาย</a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <!-- <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2 d-flex align-items-center">
                    <div class="header__logo">
                        <a href="index.php"><img src="img/icon/LOGO-OTOP-WH.png" height="38" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7 d-flex justify-content-center d-flex align-items-center">
                    <nav class="header__menu">
                        <ul>
                            <li class="search-box">
                                <button class="btn-search">
                                    <span class="icon_search search-switch"></span>
                                </button>
                                <input type="text" class="input-search" placeholder="Type to Search...">
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 align-self-center">
                    <div class="row d-flex justify-content-end">
                        <div class="col-lg-2 align-self-center">
                            <ul class="header__right__widget d-flex justify-content-center">
                                <li>
                                    <a href="views/Customer/favorite/favorite.php"><span class="icon_heart_alt"></span>
                                        <div class="tip">2</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="views/Customer/shop-cart/shop-cart.php"><span class="icon_bag_alt"></span>
                                        <div class="tip">2</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-1 text-light d-flex justify-content-end align-self-center">
                            <hr style="height: 30px; width: 1px; background-color: whitesmoke; display:block;">
                        </div>
                        <div class="col-lg-9 text-light align-self-center">
                            <div class="row">
                                <div class="col-lg-5 d-flex justify-content-center" style="padding: 0px;">
                                    <a href="register-seller.php" style="color: whitesmoke;">Seller Centre</a>
                                </div>
                                <div class="col-lg-5 d-flex justify-content-center" style="padding: 0px;">
                                    <a href="views/Customer/user-profile/user-profile.php" style="color: whitesmoke;">Profile</a>
                                </div>
                                <div class="col-lg-2 d-flex justify-content-center" style="padding: 0px;">
                                    <a href="login.php" style="color: whitesmoke;"><i class="fa fa-power-off fa-lg" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header> -->

    <header class="header">
        <?php
        if (isset($username)) {
        ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-lg-2 d-flex align-items-center">
                        <div class="header__logo">
                            <a href="./index.php"><img src="img/icon/LOGO-OTOP-WH.png" height="38" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7 d-flex justify-content-center d-flex align-items-center">
                        <nav class="header__menu">
                            <ul>
                                <li class="search-box">
                                    <button class="btn-search">
                                        <span class="icon_search search-switch"></span>
                                    </button>
                                    <input type="text" class="input-search" placeholder="Type to Search...">
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3 align-self-center">
                        <div class="row d-flex justify-content-end">
                            <div class="col-lg-4 align-self-center ">
                                <ul class="header__right__widget d-flex justify-content-end">
                                    <li>
                                        <a href="./views/Customer/notification/notification.php">
                                            <i class="fa fa-bell-o" aria-hidden="true"></i>
                                            <div class="tip">1</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="views/Customer/favorite/favorite.php"><span class="icon_heart_alt"></span>
                                            <div class="tip">2</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="views/Customer/shop-cart/shop-cart.php">
                                            <span class="icon_cart_alt"></span>
                                            <div class="tip">2</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="views/Customer/purchase/purchase.php">
                                            <span class="icon_bag_alt"></span>

                                            <div class="tip">3</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-1 text-light d-flex justify-content-center align-self-center">
                                <hr style="height: 30px; width: 1px; background-color: whitesmoke; display:block;">
                            </div>
                            <div class="col-lg-7 text-light align-self-center">
                                <div class="row">
                                    <div class="col-lg-6 d-flex justify-content-center" style="padding: 0px;">
                                        <a href="./views/Customer/register-saler/register-seller-verify.php" style="color: whitesmoke;">Seller Centre</a>
                                    </div>
                                    <div class="col-lg-4 d-flex justify-content-center" style="padding: 0px;">
                                        <a href="./views/Customer/user-profile/user-profile.php" style="color: whitesmoke;">Profile</a>
                                    </div>
                                    <div class="col-lg-2 d-flex justify-content-center" style="padding: 0px;">
                                        <a href="logout.php" style="color: whitesmoke;"><i class="fa fa-power-off fa-lg" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-lg-7 text-light align-self-center">
                                <div class="row">
                                    <div class="col-4 d-flex justify-content-center align-self-center">
                                        <a href="./views/Customer/user-profile/user-profile.php"><img src="./img/profile/user.png" width="45" height="45"></a>
                                    </div>
                                    <div class="col-2 text-light d-flex justify-content-center align-self-center">
                                        <hr style="height: 30px; width: 1px; background-color: whitesmoke; display:block;">
                                    </div>
                                    <div class="col-6 d-flex justify-content-center  align-self-center">
                                        <a href="logout.php" style="color: whitesmoke;">ออกจากระบบ</a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="canvas__open">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-lg-2 d-flex align-items-center">
                        <div class="header__logo">
                            <a href="./index.php"><img src="img/icon/LOGO-OTOP-WH.png" height="38" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7 d-flex justify-content-center d-flex align-items-center">
                        <nav class="header__menu">
                            <ul>
                                <li class="search-box">
                                    <button class="btn-search">
                                        <span class="icon_search search-switch"></span>
                                    </button>
                                    <input type="text" class="input-search" placeholder="Type to Search...">
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3 align-self-center">
                        <div class="row d-flex justify-content-end">
                            <div class="col-lg-7 align-self-center ">
                                <!-- <ul class="header__right__widget d-flex justify-content-end">
                                    <li>
                                        <a href="./views/Customer/notification/notification.php">
                                            <i class="fa fa-bell-o" aria-hidden="true"></i>
                                            <div class="tip">1</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="views/Customer/favorite/favorite.php"><span class="icon_heart_alt"></span>
                                            <div class="tip">2</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="views/Customer/shop-cart/shop-cart.php">
                                            <span class="icon_cart_alt"></span>
                                            <div class="tip">2</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="views/Customer/purchase/purchase.php">
                                            <span class="icon_bag_alt"></span>

                                            <div class="tip">3</div>
                                        </a>
                                    </li>
                                </ul> -->
                            </div>
                            <!-- <div class="col-lg-1 text-light d-flex justify-content-center align-self-center">
                                <hr style="height: 30px; width: 1px; background-color: whitesmoke; display:block;">
                            </div> -->
                            <div class="col-lg-4 text-light d-flex justify-content-center align-self-center">
                                <a href="login.php" style="color: whitesmoke;">เข้าสู่ระบบ</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
            </div>
    </header>
    <!-- Header Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="categories__item categories__large__item set-bg" data-setbg="img/categories/food.png">
                        <div class="categories__text">
                            <h2><?php echo $PRODUCT_TYPE[1]["type"] ?></h2>
                            <!-- <h1>Food</h1> -->
                            <p><?php echo $PRODUCTBYTYPE_FOOD[0]["numrow"] . " รายการ" ?></p>
                            <!-- <p>Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore
                                edolore magna aliquapendisse ultrices gravida.</p> -->
                            <a href="views/Customer/shop/shop.php?type_id=1">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories__item set-bg" data-setbg="img/categories/drink.png">
                                <div class="categories__text">
                                    <h4><?php echo $PRODUCT_TYPE[2]["type"] ?></h4>
                                    <p><?php echo $PRODUCTBYTYPE_DRINK[0]["numrow"] . " รายการ" ?></p>
                                    <a href="views/Customer/shop/shop.php?type_id=2">Shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories__item set-bg" data-setbg="img/categories/category-3.jpg">
                                <div class="categories__text">
                                    <h4><?php echo $PRODUCT_TYPE[3]["type"] ?></h4>
                                    <p><?php echo $PRODUCTBYTYPE_CLOTHES[0]["numrow"] . " รายการ" ?></p>
                                    <a href="views/Customer/shop/shop.php?type_id=3">Shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories__item set-bg" data-setbg="img/categories/accessory.png">
                                <div class="categories__text">
                                    <h4><?php echo $PRODUCT_TYPE[4]["type"] ?></h4>
                                    <p><?php echo $PRODUCTBYTYPE_ACCESSORIES[0]["numrow"] . " รายการ" ?></p>
                                    <a href="views/Customer/shop/shop.php?type_id=4">Shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories__item set-bg" data-setbg="img/categories/herb.png">
                                <div class="categories__text">
                                    <h4><?php echo $PRODUCT_TYPE[5]["type"] ?></h4>
                                    <p><?php echo $PRODUCTBYTYPE_HERB[0]["numrow"] . " รายการ" ?></p>
                                    <a href="views/Customer/shop/shop.php?type_id=5">Shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="section-title">
                        <h4>New product</h4>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".women">Food</li>
                        <li data-filter=".men">Drink</li>
                        <li data-filter=".kid">Clothes</li>
                        <li data-filter=".accessories">Accessories</li>
                        <li data-filter=".cosmetic">Herb</li>
                    </ul>
                </div>
            </div>
            <div class="row property__gallery">
                <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/details/product-1.jpg">
                            <div class="label new">New</div>
                            <ul class="product__hover">
                                <li><a href="img/product/details/product-1.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>
                                <span data-toggle="modal" data-target="#product1">Buttons tweed blazer</span>
                            </h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ 59.0</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix men">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                            <ul class="product__hover">
                                <li><a href="img/product/product-2.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#" data-toggle="modal" data-target="#exampleModalCenter">Flowy striped
                                    skirt</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ 49.0</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix accessories">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-3.jpg">
                            <div class="label stockout">out of stock</div>
                            <ul class="product__hover">
                                <li><a href="img/product/product-3.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Cotton T-Shirt</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ 59.0</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix cosmetic">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-4.jpg">
                            <ul class="product__hover">
                                <li><a href="img/product/product-4.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Slim striped pocket shirt</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ 59.0</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix kid">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-5.jpg">
                            <ul class="product__hover">
                                <li><a href="img/product/product-5.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Fit micro corduroy shirt</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ 59.0</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix women men kid accessories cosmetic">
                    <div class="product__item sale">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-6.jpg">
                            <div class="label sale">Sale</div>
                            <ul class="product__hover">
                                <li><a href="img/product/product-6.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Tropical Kimono</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ 49.0 <span>$ 59.0</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix women men kid accessories cosmetic">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-7.jpg">
                            <ul class="product__hover">
                                <li><a href="img/product/product-7.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Contrasting sunglasses</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ 59.0</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix women men kid accessories cosmetic">
                    <div class="product__item sale">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-8.jpg">
                            <div class="label">Sale</div>
                            <ul class="product__hover">
                                <li><a href="img/product/product-8.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Water resistant backpack</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ 49.0 <span>$ 59.0</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Banner Section Begin -->
    <section class="banner set-bg" data-setbg="img/banner/thai-baner.png">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-8 m-auto">
                    <div class="banner__slider owl-carousel">
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>Clothes Collection</span>
                                <h1>One Tumbon One Product</h1>
                                <a href="views/Customer/shop/shop.php">Shop now</a>
                            </div>
                        </div>
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>Accessories Collection</span>
                                <h1>One Tumbon One Product</h1>
                                <a href="views/Customer/shop/shop.php">Shop now</a>
                            </div>
                        </div>
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>Herb Collection</span>
                                <h1>One Tumbon One Product</h1>
                                <a href="views/Customer/shop/shop.php">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Trend Section Begin -->
    <section class="trend spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="trend__content">
                        <div class="section-title">
                            <h4>Hot Trend</h4>
                        </div>
                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <img src="img/trend/ht-1.jpg" alt="">
                            </div>
                            <div class="trend__item__text">
                                <h6>Chain bucket bag</h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price">$ 59.0</div>
                            </div>
                        </div>
                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <img src="img/trend/ht-2.jpg" alt="">
                            </div>
                            <div class="trend__item__text">
                                <h6>Pendant earrings</h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price">$ 59.0</div>
                            </div>
                        </div>
                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <img src="img/trend/ht-3.jpg" alt="">
                            </div>
                            <div class="trend__item__text">
                                <h6>Cotton T-Shirt</h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price">$ 59.0</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="trend__content">
                        <div class="section-title">
                            <h4>Best seller</h4>
                        </div>
                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <img src="img/trend/bs-1.jpg" alt="">
                            </div>
                            <div class="trend__item__text">
                                <h6>Cotton T-Shirt</h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price">$ 59.0</div>
                            </div>
                        </div>
                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <img src="img/trend/bs-2.jpg" alt="">
                            </div>
                            <div class="trend__item__text">
                                <h6>Zip-pockets pebbled tote <br />briefcase</h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price">$ 59.0</div>
                            </div>
                        </div>
                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <img src="img/trend/bs-3.jpg" alt="">
                            </div>
                            <div class="trend__item__text">
                                <h6>Round leather bag</h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price">$ 59.0</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="trend__content">
                        <div class="section-title">
                            <h4>Feature</h4>
                        </div>
                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <img src="img/trend/f-1.jpg" alt="">
                            </div>
                            <div class="trend__item__text">
                                <h6>Bow wrap skirt</h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price">$ 59.0</div>
                            </div>
                        </div>
                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <img src="img/trend/f-2.jpg" alt="">
                            </div>
                            <div class="trend__item__text">
                                <h6>Metallic earrings</h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price">$ 59.0</div>
                            </div>
                        </div>
                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <img src="img/trend/f-3.jpg" alt="">
                            </div>
                            <div class="trend__item__text">
                                <h6>Flap cross-body bag</h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price">$ 59.0</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Trend Section End -->

    <!-- Discount Section Begin -->
    <!-- <section class="discount">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="discount__pic">
                        <img src="img/discount.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="discount__text">
                        <div class="discount__text__title">
                            <span>Discount</span>
                            <h2>Summer 2019</h2>
                            <h5><span>Sale</span> 50%</h5>
                        </div>
                        <div class="discount__countdown" id="countdown-time">
                            <div class="countdown__item">
                                <span>22</span>
                                <p>Days</p>
                            </div>
                            <div class="countdown__item">
                                <span>18</span>
                                <p>Hour</p>
                            </div>
                            <div class="countdown__item">
                                <span>46</span>
                                <p>Min</p>
                            </div>
                            <div class="countdown__item">
                                <span>05</span>
                                <p>Sec</p>
                            </div>
                        </div>
                        <a href="#">Shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Discount Section End -->

    <!-- Services Section Begin -->
    <section class="services spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-car"></i>
                        <h6>Free Shipping</h6>
                        <p>For all oder over $99</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-money"></i>
                        <h6>Money Back Guarantee</h6>
                        <p>If good have Problems</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-support"></i>
                        <h6>Online Support 24/7</h6>
                        <p>Dedicated support</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-headphones"></i>
                        <h6>Payment Secure</h6>
                        <p>100% secure payment</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Instagram Begin -->
    <!-- <div class="instagram">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-1.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-2.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-3.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-4.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-5.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-6.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Instagram End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-7">
                    <div class="footer__about">
                        <div class="footer__logo" style="text-align: end;">
                            <a href="./index.html"><img src="img/icon/LOGO-OTOP-BLACK.png" width="60%" alt=""></a>
                        </div>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            cilisis.</p> 
                         <div class="footer__payment">
                            <a href="#"><img src="img/payment/payment-1.png" alt=""></a>
                            <a href="#"><img src="img/payment/payment-2.png" alt=""></a>
                            <a href="#"><img src="img/payment/payment-3.png" alt=""></a>
                            <a href="#"><img src="img/payment/payment-4.png" alt=""></a>
                            <a href="#"><img src="img/payment/payment-5.png" alt=""></a>
                        </div> -->
                    </div>
                </div>
                <!-- <div class="col-lg-2 col-md-3 col-sm-5">
                    <div class="footer__widget">
                        <h6>Quick links</h6>
                        <ul>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Blogs</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="footer__widget">
                        <h6>Account</h6>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Orders Tracking</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Wishlist</a></li>
                        </ul>
                    </div>
                </div> -->
                <div class="col-lg-6 col-md-8 col-sm-8">
                    <div class="footer__newslatter">
                        <h6>ติดต่อเรา</h6>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <span>E-mail</span>
                            </div>
                            <div class="col-md-1">
                                <span>:</span>
                            </div>
                            <div class="col-md-5">
                                <span>admin@shop.com</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <span>เบอร์โทรศัพท์</span>
                            </div>
                            <div class="col-md-1">
                                <span>:</span>
                            </div>
                            <div class="col-md-5">
                                <span>089-654-3140</span>
                            </div>
                        </div>
                        <!-- <form action="#">
                            <input type="text" placeholder="Email">
                            <button type="submit" class="site-btn">ส่ง</button>
                        </form> -->
                        <!-- <div class="footer__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <div class="footer__copyright__text">
                        <p>Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            Computer Engineering
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <!-- <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div> -->
    <!-- Search End -->


    <!-- Modal product -->
    <div class="modal fade" id="product1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Buttons tweed blazer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> -->
                <div class="modal-body">
                    <!-- Product Details Section Begin -->
                    <div class="container">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <section class="product-details spad">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="product__details__pic">
                                        <div class="product__details__pic__left product__thumb nice-scroll">
                                            <a class="pt active" href="#product-1">
                                                <img src="img/product/details/thumb-1.jpg" alt="">
                                            </a>
                                            <a class="pt" href="#product-2">
                                                <img src="img/product/details/thumb-2.jpg" alt="">
                                            </a>
                                            <a class="pt" href="#product-3">
                                                <img src="img/product/details/thumb-3.jpg" alt="">
                                            </a>
                                            <a class="pt" href="#product-4">
                                                <img src="img/product/details/thumb-4.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product__details__slider__content">
                                            <div class="product__details__pic__slider owl-carousel">
                                                <img data-hash="product-1" class="product__big__img" src="img/product/details/product-1.jpg" alt="">
                                                <img data-hash="product-2" class="product__big__img" src="img/product/details/product-3.jpg" alt="">
                                                <img data-hash="product-3" class="product__big__img" src="img/product/details/product-2.jpg" alt="">
                                                <img data-hash="product-4" class="product__big__img" src="img/product/details/product-4.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="product__details__text">
                                        <h3>Essential structured blazer <span>Brand: SKMEIMore Men Watches from SKMEI</span></h3>
                                        <span style="font-size: 14px; color: #444444;">รหัสสินค้า C03266</span>
                                        <br>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <span>( 138 reviews )</span>
                                        </div>
                                        <div class="product__details__price">$ 75.0</div>
                                        <p style="font-size: 17px;">เสื้อเชิ้ตทรงหลวมที่จัดสไตล์เป็นเสื้อตัวนอกได้ เนื้อผ้าให้สัมผัสหรูหรา</p>
                                        <div class="product__details__button">
                                            <div class="quantity">
                                                <span>Quantity:</span>
                                                <div class="pro-qty">
                                                    <input type="text" value="1">
                                                </div>
                                            </div>
                                            <a href="#" class="cart-btn"><span class="icon_bag_alt"></span> Add to cart</a>
                                            <ul>
                                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                                <li><a href="#"><span class="icon_adjust-horiz"></span></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__details__widget">
                                            <ul>
                                                <li>
                                                    <span>Availability:</span>
                                                    <div class="stock__checkbox">
                                                        <label for="stockin">
                                                            In Stock
                                                            <input type="checkbox" id="stockin">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span>Available color:</span>
                                                    <div class="color__checkbox">
                                                        <label for="red">
                                                            <input type="radio" name="color__radio" id="red" checked>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label for="black">
                                                            <input type="radio" name="color__radio" id="black">
                                                            <span class="checkmark black-bg"></span>
                                                        </label>
                                                        <label for="grey">
                                                            <input type="radio" name="color__radio" id="grey">
                                                            <span class="checkmark grey-bg"></span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span>Available size:</span>
                                                    <div class="size__btn">
                                                        <label for="xs-btn" class="active">
                                                            <input type="radio" id="xs-btn">
                                                            xs
                                                        </label>
                                                        <label for="s-btn">
                                                            <input type="radio" id="s-btn">
                                                            s
                                                        </label>
                                                        <label for="m-btn">
                                                            <input type="radio" id="m-btn">
                                                            m
                                                        </label>
                                                        <label for="l-btn">
                                                            <input type="radio" id="l-btn">
                                                            l
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span>Promotions:</span>
                                                    <p>Free shipping</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12" style="margin-top: 75px; padding-left: 30px; padding: 30px;">
                                    <div class="row">
                                        <div class="col-md-2 d-flex align-items-center d-flex justify-content-center" style="padding: 0px; width: 85px; flex: 0 0 8%;">
                                            <img src="img/profile/vendor.png" class="rounded-circle" width="80" height="80" />
                                        </div>
                                        <div class="col-md-4 align-self-center" style="padding: 0px;">
                                            <div class="col-md-12 d-flex justify-content-start">
                                                <span class="font-weight-bold mb-0 h6 align-self-center" id="shop-name" style="margin-right: 25px; color: #336633;">ขายอะไรก็ไม่รู้ แต่อยากขายนะ</span>

                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <a href="views/Customer/profile-shop/profile-shop.php">
                                                    <button type="button" class="btn btn-outline-success" style="font-size: 12px;">ดูร้านค้า <i class="fas fa-store"></i></button>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-md-6" style="padding: 0px; padding-left: 80px;">
                                            <div class="col-md-12 text-muted">
                                                <div class="row mb-4">
                                                    <div class="col-md-1">
                                                        <i class="fas fa-boxes"></i>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <span>สินค้าทั้งหมด 108 รายการ</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-md-1">
                                                        <i class="fas fa-star-half-alt"></i>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <span>คะแนน 4.5 (จากคะแนนทั้งหมด 400)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="product__details__tab" style="padding: 30px;">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Specification</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Reviews ( 2 )</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                                <!-- <h6>Description</h6> -->
                                                <p style="font-size: 16px;">- เสริมความยืดหยุ่น<br>
                                                    - ทำจากผ้าบรัชทวิลล์เส้นใยละเอียด<br>
                                                    - ดีไซน์งานเย็บตะเข็บให้ดูแคชชวล<br>
                                                    - ทรงหลวมพร้อมกระเป๋ามีฝาปิดจัดสไตล์เป็นเสื้อตัวนอกได้<br></p>

                                            </div>
                                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                                <!-- <h6>Specification</h6> -->
                                                <p style="font-size: 16px;">รหัสสินค้า 439615<br>
                                                    โปรดทราบว่าสินค้านี้อาจมีรหัสสินค้าแตกต่างไป แม้จะเป็นสินค้าเดียวกันก็ตาม<br>
                                                    รายละเอียดเนื้อผ้า<br>
                                                    98% ผ้าคอตตอน, 2% ผ้าสแปนเดกซ์<br>
                                                    คำแนะนำในการซัก<br>
                                                    ซักเครื่อง ด้วยน้ำเย็น</p>
                                            </div>
                                            <div class="tab-pane" id="tabs-3" role="tabpanel" style="padding-left: 80px; padding-right: 80px; padding-top: 10px;">
                                                <div class="row">
                                                    <div class="col-md-2 d-flex align-items-center d-flex justify-content-center" style="padding: 0px; width: 85px; flex: 0 0 8%;">
                                                        <img src="img/profile/user.png" class="rounded-circle" width="65" height="65" />
                                                    </div>
                                                    <div class="col-md-10 align-self-center" style="padding: 0px;">
                                                        <div class="col-md-12 d-flex justify-content-start">
                                                            <span class="font-weight-bold mb-0 h6 align-self-center" id="shop-name" style="margin-right: 25px; color: #336633;">Unknown</span>
                                                        </div>
                                                        <div class="col-md-12 mt-1">
                                                            <div class="rating text-warning">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-md-12">
                                        <span class="mb-0 text-muted">ตัวเลือกสินค้า : น้ำส้มสูตรโบราณคิดเมื่อวานแต่บอกโบราณเผื่อขายดี</span>
                                    </div> -->
                                                        <div class="col-md-12 mt-1">
                                                            <span class="mb-0 text-muted">ร้านค้าเชื่อถือได้ สินค้ามีคุณภาพและมีมาตรฐาน</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-2 d-flex align-items-center d-flex justify-content-center" style="padding: 0px; width: 85px; flex: 0 0 8%;">
                                                        <img src="img/profile/user.png" class="rounded-circle" width="65" height="65" />
                                                    </div>
                                                    <div class="col-md-10 align-self-center" style="padding: 0px;">
                                                        <div class="col-md-12 d-flex justify-content-start">
                                                            <span class="font-weight-bold mb-0 h6 align-self-center" id="shop-name" style="margin-right: 25px; color: #336633;">Unknown</span>
                                                        </div>
                                                        <div class="col-md-12 mt-1">
                                                            <div class="rating text-warning">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-md-12">
                                        <span class="mb-0 text-muted">ตัวเลือกสินค้า : น้ำส้มสูตรโบราณคิดเมื่อวานแต่บอกโบราณเผื่อขายดี</span>
                                    </div> -->
                                                        <div class="col-md-12 mt-1">
                                                            <span class="mb-0 text-muted">ร้านค้าเชื่อถือได้ สินค้ามีคุณภาพและมีมาตรฐาน</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-2 d-flex align-items-center d-flex justify-content-center" style="padding: 0px; width: 85px; flex: 0 0 8%;">
                                                        <img src="img/profile/user.png" class="rounded-circle" width="65" height="65" />
                                                    </div>
                                                    <div class="col-md-10 align-self-center" style="padding: 0px;">
                                                        <div class="col-md-12 d-flex justify-content-start">
                                                            <span class="font-weight-bold mb-0 h6 align-self-center" id="shop-name" style="margin-right: 25px; color: #336633;">Unknown</span>
                                                        </div>
                                                        <div class="col-md-12 mt-1">
                                                            <div class="rating text-warning">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-md-12">
                                        <span class="mb-0 text-muted">ตัวเลือกสินค้า : น้ำส้มสูตรโบราณคิดเมื่อวานแต่บอกโบราณเผื่อขายดี</span>
                                    </div> -->
                                                        <div class="col-md-12 mt-1">
                                                            <span class="mb-0 text-muted">ร้านค้าเชื่อถือได้ สินค้ามีคุณภาพและมีมาตรฐาน</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <div class="related__title">
                                                <h5>RELATED PRODUCTS</h5>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="product__item">
                                                <div class="product__item__pic set-bg" data-setbg="img/product/related/rp-1.jpg">
                                                    <div class="label new">New</div>
                                                    <ul class="product__hover">
                                                        <li><a href="img/product/related/rp-1.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product__item__text">
                                                    <h6><a href="#">Buttons tweed blazer</a></h6>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="product__price">$ 59.0</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="product__item">
                                                <div class="product__item__pic set-bg" data-setbg="img/product/related/rp-2.jpg">
                                                    <ul class="product__hover">
                                                        <li><a href="img/product/related/rp-2.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product__item__text">
                                                    <h6><a href="#">Flowy striped skirt</a></h6>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="product__price">$ 49.0</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="product__item">
                                                <div class="product__item__pic set-bg" data-setbg="img/product/related/rp-3.jpg">
                                                    <div class="label stockout">out of stock</div>
                                                    <ul class="product__hover">
                                                        <li><a href="img/product/related/rp-3.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product__item__text">
                                                    <h6><a href="#">Cotton T-Shirt</a></h6>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="product__price">$ 59.0</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="product__item">
                                                <div class="product__item__pic set-bg" data-setbg="img/product/related/rp-4.jpg">
                                                    <ul class="product__hover">
                                                        <li><a href="img/product/related/rp-4.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product__item__text">
                                                    <h6><a href="#">Slim striped pocket shirt</a></h6>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="product__price">$ 59.0</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Product Details Section End -->
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>