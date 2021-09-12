<!DOCTYPE html>
<html lang="en">

<?php
include_once("./product_detail_query.php");
$product_id = $_GET['product_id'];
$data = getProductDetail($product_id);
$countProduct = countProduct($data[1]['shop_name']);
$relateProduct = getRelateProducts($data[1]['shop_name'], $data[1]['type']);
$shopName = getShopName($product_id);
/*
echo json_encode($data);
echo '<br>' . json_encode($countProduct);
echo '<br>' . json_encode($relateProduct);
*/
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
                        <a href="../shop/shop.php">Shirts </a>
                        <span><?php echo $data[1]['product_name'] ?></span>
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
                        <div class="product__details__pic__left product__thumb nice-scroll">
                            <!--
                            <a class="pt active" href="#product-1">
                                <img src="../../../img/product/details/thumb-1.jpg" alt="">
                            </a>
                            <a class="pt" href="#product-2">
                                <img src="../../../img/product/details/thumb-2.jpg" alt="">
                            </a>
                            <a class="pt" href="#product-3">
                                <img src="../../../img/product/details/thumb-3.jpg" alt="">
                            </a>
                            <a class="pt" href="#product-4">
                                <img src="../../../img/product/details/thumb-4.jpg" alt="">
                            </a>
-->
                        </div>
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                <?php echo '<img data-hash="product-1" class="product__big__img" src="../../../img/product/product-' . $data[1]['product_id'] . '.jpg" alt="">' ?>

                                <img data-hash="product-2" class="product__big__img" src="../../../img/product/details/product-3.jpg" alt="">
                                <img data-hash="product-3" class="product__big__img" src="../../../img/product/details/product-2.jpg" alt="">
                                <img data-hash="product-4" class="product__big__img" src="../../../img/product/details/product-4.jpg" alt="">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <?php echo '<h3>' . $data[1]['product_name'] . ' <span>Brand: ' . $data[1]['shop_name'] . '</span></h3> 
                        <span style="font-size: 14px; color: #444444;">รหัสสินค้า: ' . $data[1]['product_number'] . '</span>'; ?>
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
                        <p style="font-size: 17px;">เสื้อเชิ้ตทรงหลวมที่จัดสไตล์เป็นเสื้อตัวนอกได้ เนื้อผ้าให้สัมผัสหรูหรา</p>
                        <div class="product__details__button">
                            <div class="quantity">
                                <span>Quantity:</span>
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                            
                            
                            <button class="cart-btn" id="addToCart" onclick="addToCart(<?php echo $data[1]['product_id'];?>)"><span class="icon_bag_alt"></span>Add to cart</button>
                            

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
                                            <?php
                                            if ($data[1]['stock'] > 0) {
                                                echo '<input type="checkbox" id="stockin" checked disabled="true"> (' . $data[1]['stock'] . ')';
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
                            <img src="../../../img/profile/vendor.png" class="rounded-circle" width="80" height="80" />
                        </div>
                        <div class="col-md-4 align-self-center" style="padding: 0px;">
                            <div class="col-md-12 d-flex justify-content-start">
                                <?php echo '<span class="font-weight-bold mb-0 h6 align-self-center" id="shop-name" style="margin-right: 25px; color: #336633;">' . $data[1]['shop_name'] . '</span>'; ?>

                            </div>
                            <div class="col-md-12 mt-3">
                                <a href="../profile-shop/profile-shop.php">
                                    <button type="button" class="btn btn-outline-success" style="font-size: 12px;" onclick="toShop($shopName[1]['shop_name'])">ดูร้านค้า <i class="fas fa-store"></i></button>
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
                                        <?php echo '<span>สินค้าทั้งหมด ' . $countProduct[1]['count_product'] . ' รายการ</span>'; ?>
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
                                        <img src="../../../img/profile/user.png" class="rounded-circle" width="65" height="65" />
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
                                        <img src="../../../img/profile/user.png" class="rounded-circle" width="65" height="65" />
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
                                        <img src="../../../img/profile/user.png" class="rounded-circle" width="65" height="65" />
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
                        for ($i = 1; $i < 5; $i++) {
                            echo ' <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="../../../img/product/product-' . $relateProduct[$i]['product_id'] . '.jpg">
                                        <div class="label new">New</div>
                                        <ul class="product__hover">
                                            <li><a href="../../../img/product/product-' . $relateProduct[$i]['product_id'] . '.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                            <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="../product_detail/product-details.php?product_id=' . $relateProduct[$i]['product_id'] . '">' . $relateProduct[$i]['product_name'] . '</a></h6>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product__price">$ ' . $relateProduct[$i]['price'] . '</div>
                                    </div>
                                </div>
                            </div>';
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
</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>



    function addToCart(id) {
        
        console.log("Add complet...");
        console.log(id);
        $.ajax({
            type: 'POST',
            url: 'addToCart.php',
            //data: s.concat(id),
            data:{
                product_id: id,
            } ,
            
            //dataType: 'html', 
            //dataType: "json",
            success: function(output) {
               // location.reload();
               console.log(output);
               //location.href = "./addToCart.php"
            }
        });
        

    }

    function toShop(shopname) {

    }
</script>