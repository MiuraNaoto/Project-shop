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
    $uid = $USER[1]['uid'];

    //echo print_r($USER);
    //echo $USER[0]['numrow'];
    //echo "<br><br>" . $uid[0];
}
$SHOPING_CART = getShopingCart($uid[0]);
$scidList = array();
$priceList = array();
for ($i = 1; $i < count($SHOPING_CART); $i++) {
    array_push($scidList, $SHOPING_CART[$i]['scid']);
    array_push($priceList, $SHOPING_CART[$i]['price']);
}
$scidList = json_encode($scidList);
$priceList = json_encode($priceList);
//echo print_r($SHOPING_CART);
//echo print_r($scidList);
//echo print_r($priceList);
$sqlOrderid = "";
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

                                                <h6><a href='<?php echo "../product_detail/product-details.php?product_id=" . $SHOPING_CART[$i]["product_id"]; ?>' style="color: inherit;"><?php echo  $SHOPING_CART[$i]["product_name"]; ?></a></h6>
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
                                        <input type="text" id="productPrice" name="productPrice" value=<?php echo number_format($SHOPING_CART[$i]["price"], 2); ?> hidden>

                                        <td class="cart__quantity" id="cart__quantity" name="cart__quantity" onclick="changeQuantity(<?php echo $SHOPING_CART[$i]['scid'] . ',' .  $SHOPING_CART[$i]['price'] ?>,objscid,objprice,obj)">
                                            <div class="pro-qty" id="pro-qty" name="pro-qty">
                                                <input type="text" id="quantity<?php echo $SHOPING_CART[$i]["scid"]; ?>" name="quantity" value="<?php echo $SHOPING_CART[$i]["quantity"]; ?>" disabled>
                                            </div>
                                        </td>
                                        <td class="cart__total" id="cart__total<?php echo $SHOPING_CART[$i]['scid']; ?>" name="cart__total<?php echo $SHOPING_CART[$i]['scid']; ?>" value="<?php echo number_format($SHOPING_CART[$i]["price"] * $SHOPING_CART[$i]["quantity"], 2); ?>"><?php echo  "฿ " . number_format($SHOPING_CART[$i]["price"] * $SHOPING_CART[$i]["quantity"], 2); ?></td>
                                        <input type="text" id="scid" name="scid" value="<?php echo $SHOPING_CART[$i]["scid"]; ?>" hidden>
                                        <td class="cart__close">
                                            <button type="button" class="btn btn-secondary btn-lg rounded-circle" id="removeProduct" onclick="removeProduct('<?php echo $SHOPING_CART[$i]['scid']; ?>')">
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
                        <?php
                        $json = json_encode($SHOPING_CART);
                        //echo $json;
                        ?>

                        <!-- <a onclick="updateCart(obj)"><span class="icon_loading"></span> Update cart</a> -->

                    </div>
                </div>
            </div>
            <div class="row">
                <!--
                <div class="col-lg-6">
                    <div class="discount__content">
                         <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">Apply</button>
                        </form> 
                    </div>
                </div>
                -->
                <?php
                if (isset($SHOPING_CART[1]['shop_id'])) {
                    $shopid = $SHOPING_CART[1]['shop_id'];
                    $sql = "SELECT * FROM ((`seller-list` INNER JOIN `shipping_method` ON `seller-list`.`shop_id`=`shipping_method`.`seller_id`)
                    INNER JOIN `delivery_type` ON `delivery_type`.`id`=`shipping_method`.`delivery_type`)
                    WHERE `seller-list`.`shop_id`=$shopid";
                    $shippingTypeList = selectData($sql);
                    // echo print_r($shippingTypeList);
                }
                ?>
                <div class="col-lg-4 ">
                    <div class="cart__total__procced">
                        <div class="row align-self-center">
                            <i class="fa fa-truck fa-2x" aria-hidden="true" style="margin-right: 20px;"></i>
                            <h5 class="align-self-center">เลือกประเภทการจัดส่ง</h5>
                        </div><br>
                        <ul>
                            <?php for ($i = 1; $i < count($shippingTypeList); $i++) { ?>
                                <div class="col">
                                    <input class="form-check-input" type="radio" name="shippingType" id="shippingType<?php echo $shippingTypeList[$i]['delivery_type']; ?>" value="<?php echo $shippingTypeList[$i]['delivery_type']; ?>" style="margin-top: 8px;" onclick="chooseShippingType()">

                                    <span class="form-check-label" for="shippingType<?php echo $shippingTypeList[$i]['delivery_type']; ?>">
                                        <tr>
                                            <td class="text-muted"><?php echo $shippingTypeList[$i]['delivery_name']; ?></td>
                                            <td class="text-muted">ราคา</td>
                                            <td class="text-muted"><?php echo $shippingTypeList[$i]['price_per_unit']; ?></td>
                                            <td class="text-muted">บาท</td>
                                        </tr>
                                    </span>

                                    <input type="text" id="shoppingPrice<?php echo $shippingTypeList[$i]['delivery_type']; ?>" value="<?php echo $shippingTypeList[$i]['standard_price']; ?>" hidden />
                                </div>
                            <?php
                            }
                            ?>

                        </ul>

                    </div>
                </div>

                <div class="col-lg-4 offset-lg-4">
                    <div class="cart__total__procced">
                        <h6>ยอดสั่งซื้อรวม</h6>
                        <ul>
                            <!-- <li>Subtotal <span>$ 750.0</span></li> -->
                            <li>ราคารวม <span>

                                    <?php
                                    //echo $SHOPING_CART[0]['numrow'] ;
                                    //echo print_r($SHOPING_CART);

                                    if ($SHOPING_CART[0]['numrow'] > 0) {
                                        $price = 0;
                                        for ($i = 1; $i < count($SHOPING_CART); $i++) {
                                            $price = $price + ($SHOPING_CART[$i]["price"] * $SHOPING_CART[$i]["quantity"]);
                                            //$PRICES = [];
                                            //array_push($PRICES, $price);
                                        }
                                        //echo number_format(array_sum($PRICES), 2);

                                        //echo number_format($price, 2);
                                        echo ' <span id="sumPrice" name="sumPrice" value="' . $price . '">' . number_format($price, 2) . '</span>';
                                        echo ' <input type="text" id="sumPriceText" value="' . $price . '" hidden/>';
                                    } else {
                                        //echo number_format(0, 2);
                                        echo ' <span id="sumPrice" name="sumPrice" value="0">0.00</span>';
                                        echo ' <input type="text" id="sumPriceText" value="0" hidden/>';
                                    }

                                    ?>

                                </span>
                            </li>

                        </ul>



                        <?php

                        $getProductStock = "SELECT * FROM `product` INNER JOIN `shopping_cart` ON `product`.`product_id`=`shopping_cart`.`product_id` WHERE uid = '$uid'";
                        $getProductStockJSON = selectData($getProductStock);
                        $jsonCheckCart = json_encode($getProductStockJSON);
                        //echo $jsonCheckCart;

                        ?>
                        <a class="primary-btn btn btn-danger text-light" style="width: 280px;" onclick="checkCart(objCheckCart)">ยืนยันคำสั่งซื้อ</a>
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

    <!-- Modal -->
    <!--
    <div class="modal fade" id="modalCheck" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ไม่สามารถดำเนินการต่อได้</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="font-size: 16px;">ไม่สามารถดำเนินการต่อไปยังการยืนยันคำสั่งซื้อได้ </p>
                    <p style="font-size: 16px;">เนื่องจากสินค้าบางชิ้นอาจได้ <b>หมดคลังไปเเล้ว</b> หรือ <b>มีจำนวนสินค้าไม่เพียงพอต่อการสั่งซื้อ</b></p>
                    <p style="font-size: 16px;">โปรดตรวจสอบรายระเอียดการซื้ออีกรอบ</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                </div>
            </div>
        </div>
    </div>
     -->

</body>

</html>



<script>
    var obj = JSON.parse('<?= $json; ?>');
    var objCheckCart = JSON.parse('<?= $jsonCheckCart; ?>');
    var objscid = JSON.parse('<?= $scidList; ?>');
    var objprice = JSON.parse('<?= $priceList; ?>');
    //console.log(obj)
</script>