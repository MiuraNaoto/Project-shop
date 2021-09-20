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
    $SELLER = $_SESSION[md5('shop')];
    $uid = $USER[1]["uid"];
    // $shop_id = $SELLER[1]["shop_id"];
    // echo $username;
    // echo print_r($USER);
}

$shop_id = $_GET['shop_id'];
$SHOP_PROFILE = getShopProfile($shop_id);
$SHOP_PRODUCT = getProductByShopID($shop_id);
date_default_timezone_set("Asia/Bangkok");
?>

<head>
    <?php include_once("../layout/header.php") ?>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
</head>
<style>
    .profile-shop-banner {
        padding: 20px;
        border-radius: 3px;
        /* background-color: '#b7b7b7'; */
        background-color: #f7f7f7;
        box-shadow: 2px 3px 5px gray;
        /* The image used */
        /* background-image: blur(url("../../../img/profile/vendor.png")); */
    }

    .title h5 {
        font-size: 20px;
        color: #111111;
        font-weight: 600;
        text-transform: uppercase;
        /* margin-bottom: 35px; */
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
                        <span><?php echo $SHOP_PROFILE[1]["shop_name"] ?></span>
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
                <div class="col-lg-6 profile-shop-banner">
                    <div class="row">
                        <div class="col-4 d-flex justify-content-center align-self-center">
                            <img src='<?php echo "../../../img/profile/saler/" . $SHOP_PROFILE[1]["profile_shop"] ?>' width="125" height="125" />
                        </div>
                        <div class="col-8">
                            <h6 class="h5 mb-2 mt-3 font-weight-bold"><?php echo $SHOP_PROFILE[1]["shop_name"] ?> <a href="#"><img src="../../../img/icon/line.png" width="22" height="22" style="margin-left: 10px;" /></a></h6>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <span class="mt-3 text-muted font-weight-bold">เบอร์ติดต่อ</span>
                                </div>
                                <div class="col-sm-1">
                                    <span class="mt-3 text-muted font-weight-bold">:</span>
                                </div>
                                <div class="col-md-7">
                                    <span class="text-muted"><?php echo format_phonenumber($SHOP_PROFILE[1]["tel"]) ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <span class="mt-3 text-muted font-weight-bold">ที่อยู่</span>
                                </div>
                                <div class="col-sm-1">
                                    <span class="mt-3 text-muted font-weight-bold">:</span>
                                </div>
                                <div class="col-md-7">
                                    <span class="text-muted">
                                        <?Php
                                        if ($SHOP_PROFILE[1]["provinces_name_in_thai"] == "กรุงเทพมหานคร") {
                                            echo $SHOP_PROFILE[1]["address_shop"] . "<br>" .
                                                " แขวง" . $SHOP_PROFILE[1]["subdistricts_name_in_thai"] .
                                                " " . $SHOP_PROFILE[1]["districts_name_in_thai"] .
                                                " " . $SHOP_PROFILE[1]["provinces_name_in_thai"] .
                                                ", " . $SHOP_PROFILE[1]["zip_code"];
                                        } else {
                                            echo $SHOP_PROFILE[1]["address_shop"]  . "<br>" .
                                                " ต." . $SHOP_PROFILE[1]["subdistricts_name_in_thai"] .
                                                " อ." . $SHOP_PROFILE[1]["districts_name_in_thai"] .
                                                " จ." . $SHOP_PROFILE[1]["provinces_name_in_thai"] .
                                                ", " . $SHOP_PROFILE[1]["zip_code"];
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="col-md-6 align-self-center" style="padding: 28px;">
                    <div class="row">
                        <div class="col-md-6 text-muted">
                            <div class="row mb-4">
                                <div class="col-md-1">
                                    <i class="fas fa-boxes"></i>
                                </div>
                                <div class="col-md-10">
                                    <span><?php echo "สินค้าทั้งหมด " . $SHOP_PRODUCT[0]["numrow"] . " รายการ" ?></span>
                                </div>
                            </div>
                            <!-- <br> -->
                            <div class="row">
                                <div class="col-md-1">
                                    <i class="fas fa-user-clock"></i>
                                </div>
                                <div class="col-md-10">
                                    <span>
                                        <?php

                                        $current_date = date_create(date("Y-m-d H:i:s", time()));
                                        $reigster_saler_date = date_create(date("Y-m-d H:i:s", $SHOP_PROFILE[1]["modify_saler"]));

                                        $diff = date_diff($current_date, $reigster_saler_date);
                                        echo "เข้าร่วมเมื่อ " . $diff->format("%y ปี %m เดือน %d วัน %h ชั่วโมง %i นาที %s วินาที") . " ที่ผ่านมา";
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-muted">
                            <div class="row">
                                <div class="col-md-1" style="padding: 0px;">
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <div class="col-md-11">
                                    <span>คะแนน 4.5 <br> (จากคะแนนทั้งหมด 400)</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1" style="padding: 0px;">
                                    <i class="far fa-clock"></i>
                                </div>
                                <div class="col-md-11">
                                    <div class="row">
                                        <?php
                                        $time_current = time();
                                        $time_opened = strtotime($SHOP_PROFILE[1]["time_opened"]);
                                        $time_closed = strtotime($SHOP_PROFILE[1]["time_closed"]);
                                        // echo $time_opened <= $time_closed;

                                        if ($time_current >= $time_opened && $time_current <= $time_closed) {
                                        ?>
                                            <div class="col-md-4 align-self-center text-center">
                                                <span class="text-success">เปิดอยู่</span>
                                            </div>
                                            <div class="col-md-6 align-self-center">
                                                <span><?php echo date('H:i', $time_opened)  . " - " .  date('H:i', $time_closed); ?></span>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="col-md-4 align-self-center text-center">
                                                <span class="text-danger">ปิดอยู่</span>
                                            </div>
                                            <div class="col-md-8 align-self-center">
                                                <span><?php echo date('H:i', $time_opened)  . " - " .  date('H:i', $time_closed); ?></span>
                                            </div>
                                        <?php
                                        }

                                        ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-lg-12 text-left" style="margin-top: 40px; margin-bottom:0px">
                    <div class="title">
                        <h5>รายการสินค้า</h5>
                        <hr>
                        <br>
                    </div>
                </div>
            </div> -->

            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-1" role="tab">สินค้าทั้งหมด</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Reviews ( 2 )</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="col-lg-12">
                                <div class="row">
                                    <?php
                                    for ($i = 1; $i < COUNT($SHOP_PRODUCT); $i++) {
                                    ?>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="product__item">
                                                <div class="product__item__pic set-bg" data-setbg="<?php echo "../../../img/product/profile/" . $SHOP_PRODUCT[$i]["profile_product"]; ?>">
                                                    <div class="label new">New</div>
                                                    <ul class="product__hover">
                                                        <li><a href="<?php echo "../../../img/product/profile/" . $SHOP_PRODUCT[$i]["profile_product"]; ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product__item__text">
                                                    <h6><a href='<?php echo "../product_detail/product-details.php?product_id=" . $SHOP_PRODUCT[$i]["product_id"]; ?>'><?php echo $SHOP_PRODUCT[$i]["product_name"] ?></a></h6>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="product__price"><?php echo "฿ " . $SHOP_PRODUCT[$i]["price"]; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }

                                    ?>

                                    <!-- number page -->
                                    <!-- <div class="col-lg-12 text-center">
                                        <div class="pagination__option">
                                            <a href="#">1</a>
                                            <a href="#">2</a>
                                            <a href="#">3</a>
                                            <a href="#"><i class="fa fa-angle-right"></i></a>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="tabs-2" role="tabpanel" style="padding-left: 80px; padding-right: 80px; padding-top: 10px;">
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
            </div>
        </div>

    </section>

    <!-- Product Details Section End -->

    <!-- Js Plugins -->
    <?php include_once("../layout/js.php"); ?>
</body>

</html>