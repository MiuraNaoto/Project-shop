<!DOCTYPE html>
<html lang="en">

<?php
include_once("../../../query/query.php");
include_once("../../../query/function.php");
session_start();
// $idUT = $_SESSION[md5('typeid')];
// $username = $_SESSION[md5('username')];
if (isset($_SESSION[md5('typeid')]) && isset($_SESSION[md5('username')]) && isset($_SESSION[md5('user')])) {
    $idUT = $_SESSION[md5('typeid')];
    $username = $_SESSION[md5('username')];
    $USER = $_SESSION[md5('user')];
    $SELLER = $_SESSION[md5('shop')];
    $uid = $USER[1]["uid"];
    // $shop_id = $SELLER[1]["shop_id"];
    // echo $username;
    // echo print_r($USER);
}


$product_id = $_GET['product_id'];

$PRODUCT_DETAIL = getProductDetail($product_id);

$SALER_PRODUCT = getProductByShopID($product_id);
$RELATIVE_PRODUCT = getRelateProducts($PRODUCT_DETAIL[1]['product_type']);
$FAVOURITE = favourite_product($product_id, $uid);
// print_r($PRODUCT_DETAIL);
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
                        <a href="<?php echo "../shop/shop.php?type_id=" . $PRODUCT_DETAIL[1]['id'] ?>"><?php echo $PRODUCT_DETAIL[1]['type'] ?></a>
                        <span><?php echo $PRODUCT_DETAIL[1]['product_name'] ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll" style="height: 420px;">
                            <a class="pt active" href="#product-1">
                                <img src="<?php echo "../../../img/product/profile/" . $PRODUCT_DETAIL[1]["profile_product"] ?>" alt="" style="object-fit: cover;">
                            </a>
                            <?php
                            $PICTURE_PRODUCT = array_diff(scandir("../../../img/product/" . $PRODUCT_DETAIL[1]["product_id"]), array('..', '.'));
                            for ($i = 0; $i < count($PICTURE_PRODUCT); $i++) {
                                $num = $i + 2;
                            ?>
                                <a class="pt" href="<?php echo '#product-' . $num  ?>">
                                    <img src="<?php echo '../../../img/product/' . trim($PRODUCT_DETAIL[1]["picture"], " ") . $i . ".png"  ?>" alt="">
                                </a>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="product__details__slider__content" style="height: 420px;">
                            <div class="product__details__pic__slider owl-carousel">
                                <img data-hash="product-1" class="product__big__img" src="<?php echo "../../../img/product/profile/" . $PRODUCT_DETAIL[1]["profile_product"] ?>" alt="">

                                <?php
                                for ($i = 0; $i < count($PICTURE_PRODUCT); $i++) {
                                    $num = $i + 2;
                                    // echo $num;
                                    // echo "../../../img/product/" . $PRODUCT_DETAIL[1]["picture"] . $i . ".png" . "<br>";
                                ?>
                                    <img data-hash="<?php echo '#product-' . $num  ?>" class="product__big__img" src="<?php echo '../../../img/product/' . trim($PRODUCT_DETAIL[1]["picture"], " ") . $i . ".png"  ?>" alt="">
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h2><?php echo $PRODUCT_DETAIL[1]["product_name"]; ?></h2>
                        <h3>
                            <?php $PRODUCT_DETAIL[1]["product_name"] ?>
                            <span><?php echo "Brand : " . $PRODUCT_DETAIL[1]["shop_name"]; ?></span>
                        </h3>
                        <span style="font-size: 14px; color: #444444;"><?php echo "รหัสสินค้า : " . $PRODUCT_DETAIL[1]["product_number"]; ?> </span>

                        <br>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span>( 138 reviews )</span>
                        </div>
                        <div class="product__details__price"><?php ?></div>
                        <!-- <p style="font-size: 17px;">เสื้อเชิ้ตทรงหลวมที่จัดสไตล์เป็นเสื้อตัวนอกได้ เนื้อผ้าให้สัมผัสหรูหรา</p> -->
                        <div class="product__details__button">
                            <div class="quantity">
                                <span>Quantity:</span>
                                <div class="pro-qty">
                                    <input type="text" id="quantity" name="quantity" value="1">
                                </div>
                            </div>
                            <button class="cart-btn  btn btn-danger" id="addToCart" onclick="addToCart('<?php echo $PRODUCT_DETAIL[1]['product_id']; ?>','<?php echo $PRODUCT_DETAIL[1]['shop_id'] ?>')">
                                <span class="icon_bag_alt">&nbsp;&nbsp;เพิ่มลงตระกร้าสินค้า</span>
                            </button>

                            <?php
                            if (isset($FAVOURITE[1]["product_id"]) && isset($FAVOURITE[1]["uid"])) {
                            ?>
                                <button class="btn btn-danger btn-lg rounded-circle" id="favourtie" onclick="favouriteP('<?php echo $PRODUCT_DETAIL[1]['product_id']; ?>')">
                                    <span class="icon_heart_alt"></span>
                                </button>
                            <?php
                            } else {
                            ?>
                                <button class="btn btn-outline-danger btn-lg rounded-circle" id="favourtie" onclick="favouriteP('<?php echo $PRODUCT_DETAIL[1]['product_id']; ?>')">
                                    <span class="icon_heart_alt"></span>
                                </button>
                            <?php
                            }
                            ?>

                        </div>
                        <div class="product__details__widget">
                            <ul>
                                <li>
                                    <span>Availability:</span>
                                    <div class="stock__checkbox">
                                        <label for="stockin">
                                            In Stock
                                            <?php
                                            if ($PRODUCT_DETAIL[1]['stock'] > 0) {
                                                echo '<input type="checkbox" id="stockin" checked disabled="true"> (' . $PRODUCT_DETAIL[1]['stock'] . ')';
                                            } else {
                                                echo '<input type="checkbox" id="stockin" disabled="true">';
                                            }
                                            ?>
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

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12" style="margin-top: 75px; padding-left: 30px;">
                    <div class="row">
                        <div class="col-md-2 d-flex align-items-center d-flex justify-content-center" style="padding: 0px; width: 85px; flex: 0 0 8%;">
                            <img src="<?php echo "../../../img/profile/saler/" . $PRODUCT_DETAIL[1]["profile_shop"] ?>" class="rounded-circle" width="80" height="80" />
                        </div>
                        <div class="col-md-4 align-self-center" style="padding: 0px;">
                            <div class="col-md-12 d-flex justify-content-start">
                                <span class="font-weight-bold mb-0 h6 align-self-center" id="shop-name" style="margin-right: 25px; color: #336633;"><?php echo $PRODUCT_DETAIL[1]['shop_name']; ?></span>
                            </div>
                            <div class="col-md-12 mt-3">
                                <a href="<?php echo "../profile-shop/profile-shop.php?shop_id=" . $PRODUCT_DETAIL[1]['shop_id'] ?>">
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
                                        <?php echo '<span>สินค้าทั้งหมด ' . $SALER_PRODUCT[0]["numrow"] . ' รายการ</span>'; ?>
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
                    <div class="product__details__tab">
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
                                <p style="font-size: 16px;">
                                    <?php echo  $PRODUCT_DETAIL[1]['product_description'] ?>
                                </p>

                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <!-- <h6>Specification</h6> -->
                                <p style="font-size: 16px;">
                                    <?php echo "รหัสสินค้า : " . $PRODUCT_DETAIL[1]["product_number"] . "<br>" . $PRODUCT_DETAIL[1]["product_specification"] ?>
                                </p>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel" style="padding-left: 80px; padding-right: 80px; padding-top: 10px;">
                                <div class="row">
                                    <div class="col-md-2 d-flex align-items-center d-flex justify-content-center" style="padding: 0px; width: 85px; flex: 0 0 8%;">
                                        <img src="../../../img/profile/user/default_user.png" class="rounded-circle" width="65" height="65" />
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
                                        <img src="../../../img/profile/user/default_user.png" class="rounded-circle" width="65" height="65" />
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
                                        <img src="../../../img/profile/user/default_user.png" class="rounded-circle" width="65" height="65" />
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

                        <?php
                        for ($i = 1; $i < count($RELATIVE_PRODUCT) && $i < 5; $i++) {
                        ?>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="<?php echo "../../../img/product/profile/" . $RELATIVE_PRODUCT[$i]["profile_product"] ?>">
                                        <div class="label new">New</div>
                                        <ul class="product__hover">
                                            <li><a href="<?php echo "../../../img/product/profile/" . $RELATIVE_PRODUCT[$i]["profile_product"] ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                            <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="<?php echo "../product_detail/product-details.php?product_id=" . $RELATIVE_PRODUCT[$i]['product_id'] ?>"><?php echo $RELATIVE_PRODUCT[$i]['product_name'] ?></a></h6>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product__price"><?php echo $RELATIVE_PRODUCT[$i]['price'] ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                        <!--
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="../../../img/product/related/rp-4.jpg">
                                    <ul class="product__hover">
                                        <li><a href="../../../img/product/related/rp-4.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
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
                        -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Js Plugins -->
    <?php include_once("../layout/js.php"); ?>
    <script src="product-detail.js"></script>
</body>

</html>