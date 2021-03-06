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
    // echo $username;
    // echo print_r($USER);
}

// $idUT = $_SESSION[md5('typeid')];
// $username = $_SESSION[md5('username')];
// $USER = $_SESSION[md5('user')];
// $uid = $USER[1]["uid"];
// print_r($USER);
$type_id = $_GET["type_id"];
$PRODUCT = getAllProductByType($type_id);
$TYPE = getTypeProduct($type_id);

// print_r($TYPE);

$PRODUCT_TYPE = getProductType();
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
                        <span><?php echo $TYPE[1]['type'] ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>หมวดหมู่สินค้า</h4>
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">
                                    <?php
                                    for ($i = 1; $i < count($PRODUCT_TYPE); $i++) {
                                    ?>
                                        <div class="card">
                                            <div class="card-title">
                                                <?php
                                                if ($PRODUCT_TYPE[$i]["id"] == $type_id) {
                                                ?>
                                                    <a href="<?php echo 'shop.php?type_id=' . $PRODUCT_TYPE[$i]["id"] ?>"><span class="mb-0"><?php echo  $PRODUCT_TYPE[$i]["type"] ?></span></a>
                                                <?php
                                                } else {
                                                ?>
                                                    <a href="<?php echo 'shop.php?type_id=' . $PRODUCT_TYPE[$i]["id"] ?>"><span class="mb-0 text-muted"><?php echo  $PRODUCT_TYPE[$i]["type"] ?></span></a>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <!-- <div class="card">
                                        <div class="card-title">
                                            <a data-toggle="collapse" data-target="#collapseOne"><?php echo  $PRODUCT_TYPE[1]["type"] ?></a>
                                        </div>
                                        <div id="collapseOne" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Vegetables</a></li>
                                                    <li><a href="#">Fruits</a></li>
                                                    <li><a href="#">Meat and Poultry</a></li>
                                                    <li><a href="#">Fish and Seafood</a></li>
                                                    <li><a href="#">Grains, Beans and Nuts</a></li>
                                                    <li><a href="#">Dairy Foods</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseTwo"><?php echo  $PRODUCT_TYPE[2]["type"] ?></a>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Tea</a></li>
                                                    <li><a href="#">Coffee</a></li>
                                                    <li><a href="#">Juice</a></li>
                                                    <li><a href="#">Milk</a></li>
                                                    <li><a href="#">soft drink</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseThree"><?php echo  $PRODUCT_TYPE[3]["type"] ?></a>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">bag</a></li>
                                                    <li><a href="#">hat</a></li>
                                                    <li><a href="#">jewelry</a></li>
                                                    <li><a href="#">shoe</a></li>
                                                    <li><a href="#">watch</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading active">
                                            <a data-toggle="collapse" data-target="#collapseFour"><?php echo  $PRODUCT_TYPE[4]["type"] ?></a>
                                        </div>
                                        <div id="collapseFour" class="collapse show" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Coats</a></li>
                                                    <li><a href="#">Jackets</a></li>
                                                    <li><a href="#">Dresses</a></li>
                                                    <li><a href="#">Shirts</a></li>
                                                    <li><a href="#">T-shirts</a></li>
                                                    <li><a href="#">Jeans</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseFive"><?php echo  $PRODUCT_TYPE[5]["type"] ?></a>
                                        </div>
                                        <div id="collapseFive" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Coats</a></li>
                                                    <li><a href="#">Jackets</a></li>
                                                    <li><a href="#">Dresses</a></li>
                                                    <li><a href="#">Shirts</a></li>
                                                    <li><a href="#">T-shirts</a></li>
                                                    <li><a href="#">Jeans</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__filter">
                            <div class="section-title">
                                <h4>ค้นหาขั้นสูง</h4>
                            </div>
                            <div class="filter-range-wrap">
                                <!-- <label for="customRange2" class="form-label">Example range</label> -->

                                <!-- <input type="range" class="form-range" min="0" max="999999" id="customRange2" data-filter-group="weight" style="width: 262.5px;"> -->



                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="0" data-max="999999"></div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <p>Price:</p>
                                        <input type="text" min="0" id="minamount">
                                        <input type="text" min="0" id="maxamount">
                                    </div>
                                </div>
                            </div>
                            <a href="#">ค้นหา</a>
                        </div>
                        <!-- <div class="sidebar__sizes">
                            <div class="section-title">
                                <h4>Shop by size</h4>
                            </div>
                            <div class="size__list">
                                <label for="xxs">
                                    xxs
                                    <input type="checkbox" id="xxs">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="xs">
                                    xs
                                    <input type="checkbox" id="xs">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="xss">
                                    xs-s
                                    <input type="checkbox" id="xss">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="s">
                                    s
                                    <input type="checkbox" id="s">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="m">
                                    m
                                    <input type="checkbox" id="m">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="ml">
                                    m-l
                                    <input type="checkbox" id="ml">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="l">
                                    l
                                    <input type="checkbox" id="l">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="xl">
                                    xl
                                    <input type="checkbox" id="xl">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div> -->
                        <!-- <div class="sidebar__color">
                            <div class="section-title">
                                <h4>Shop by size</h4>
                            </div>
                            <div class="size__list color__list">
                                <label for="black">
                                    Blacks
                                    <input type="checkbox" id="black">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="whites">
                                    Whites
                                    <input type="checkbox" id="whites">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="reds">
                                    Reds
                                    <input type="checkbox" id="reds">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="greys">
                                    Greys
                                    <input type="checkbox" id="greys">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="blues">
                                    Blues
                                    <input type="checkbox" id="blues">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="beige">
                                    Beige Tones
                                    <input type="checkbox" id="beige">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="greens">
                                    Greens
                                    <input type="checkbox" id="greens">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="yellows">
                                    Yellows
                                    <input type="checkbox" id="yellows">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div> -->
                    </div>
                </div>



                <div class="col-lg-9 col-md-9">
                    <div class="row">
                        <?php
                        for ($i = 1; $i < count($PRODUCT); $i++) {
                        ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="<?php echo "../../../img/product/profile/" . $PRODUCT[$i]['profile_product'] ?>">
                                        <div class="label new">New</div>
                                        <ul class="product__hover">
                                            <li><a href="<?php echo "../../../img/product/profile/" . $PRODUCT[$i]['profile_product'] ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                            <!-- <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                            <li><a href="#"><span class="icon_bag_alt"></span></a></li> -->
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href='<?php echo "../product_detail/product-details.php?product_id=" . $PRODUCT[$i]['product_id'] ?>'><?php echo $PRODUCT[$i]['product_name'] ?></a></h6>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product__price"><?php echo  number_format($PRODUCT[$i]['price'], 2) ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                        <!--
                        <div class="col-lg-4 col-md-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="../../../img/product/details/product-1.jpg">
                                    <div class="label new">New</div>
                                    <ul class="product__hover">
                                        <li><a href="../../../img/product/details/product-1.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="../product_detail/product-details.php">Furry hooded parka</a></h6>
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
    <!-- Shop Section End -->

    <!-- Js Plugins -->
    <?php include_once("../layout/js.php"); ?>
</body>

</html>