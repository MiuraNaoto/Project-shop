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
    /*
    echo $username;
    echo print_r($USER);
    echo '<br>'.$USER[1]['uid'];
    */
    $uid = $USER[1]['uid'];
}


$sql = "SELECT * FROM 
((((((`user-list` INNER JOIN `delivery_address` ON `user-list`.`uid`=`delivery_address`.`uid`) 
INNER JOIN `orders` ON `orders`.`daid`=`delivery_address`.`daid`) 
INNER JOIN `orders_detail` ON `orders_detail`.`orders_id`=`orders`.`order_id`)
INNER JOIN `product` ON `product`.`product_id`=`orders_detail`.`product_id`)
INNER JOIN `seller-list` ON `seller-list`.`shop_id`=`product`.`shop_id`)
INNER JOIN `status_order` ON `status_order`.`so_id`=`orders`.`status_order`)
WHERE `user-list`.`uid`= '$uid' ORDER BY `orders`.`order_id` DESC ,`seller-list`.`shop_id` DESC";
$purchaseInfo = selectData($sql);

$checkShopId = "";
$orderid = "";
//echo print_r($purchaseInfo);
//echo "<br>" . $checkShopId;
//echo "<br>" .count($purchaseInfo);
/*
if ($purchaseInfo[1]['shop_id'] == $checkShopId) {
    echo "<br><br> EQUAL...";
}
*/
?>

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
                        <a href="../shop-cart/shop-cart.php"> ตระกร้าสินค้า</a>
                        <span>ประวัติคำสั่งซื้อ</span>
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

                                        <?php for ($i = 1; $i < count($purchaseInfo); $i++) {

                                            if (($purchaseInfo[$i]['order_id'] != $orderid)) {
                                                $orderid = $purchaseInfo[$i]['order_id'];
                                                $checkShopId = "";

                                                $sql2 = "SELECT * FROM `reason`";
                                                $reasonList = selectData($sql2);
                                                for ($j = 1; $j < count($reasonList); $j++) {
                                                    if ($reasonList[$j]['id'] == $purchaseInfo[$i]['reason_id']) {
                                                        $reason = $reasonList[$j]['reason'];

                                                        break;
                                                    }
                                                }

                                                echo ' 
                                       <br>
                                        <h3>Order Number ' . $purchaseInfo[$i]['order_number'] . '</h3><br>
                                        <div class="row">';

                                                if (($purchaseInfo[$i]['shop_id'] != $checkShopId)) {
                                                    $checkShopId = $purchaseInfo[$i]['shop_id'];
                                                    echo '
                                            
                                                <div class="col-md-7 d-flex justify-content-start">
                                                    <span class="font-weight-bold mb-0 h6 align-self-center" id="shop-name" style="margin-right: 25px; color: #336633;">' . $purchaseInfo[$i]['shop_name'] . '</span>
                                                    <a href="../profile-shop/profile-shop.php?shop_id=' . $purchaseInfo[$i]['shop_id'] . '">
                                                        <button type="button" class="btn btn-outline-success" style="font-size: 12px;">ดูร้านค้า <i class="fas fa-store"></i></button>
                                                    </a>
                                                </div>';
                                                }

                                                if ($purchaseInfo[$i]['so_id'] == 1) {
                                                    echo '
                                            <div class="col-md-5 d-flex justify-content-end">
                                                <span class="mb-0 h6 align-self-center text-secondary" style="margin-right: 27px; font-size: 16px;"><i class="fa fa-spinner fa-lg"></i> ' . $purchaseInfo[$i]['status_order'] . '</span>
                                            </div>';
                                                } else if ($purchaseInfo[$i]['so_id'] == 2) {
                                                    echo '
                                            <div class="col-md-5 d-flex justify-content-end">
                                                <span class="mb-0 h6 align-self-center text-success" style="margin-right: 27px; font-size: 16px;"><i class="fa fa-check fa-lg"></i> ' . $purchaseInfo[$i]['status_order'] . '</span>
                                            </div>';
                                                } else if ($purchaseInfo[$i]['so_id'] == 3) {
                                                    echo '
                                            <div class="col-md-5 d-flex justify-content-end">
                                                <span class="mb-0 h6 align-self-center text-success" style="margin-right: 27px; font-size: 16px;"><i class="fa fa-money fa-lg"></i> ' . $purchaseInfo[$i]['status_order'] . '</span>
                                            </div>';
                                                } else if ($purchaseInfo[$i]['so_id'] == 4) {

                                                    if (!isset($reason)) {
                                                        echo '
                                            <div class="col-md-5 d-flex justify-content-end">
                                                <span class="mb-0 h6 align-self-center text-danger" style="margin-right: 27px; font-size: 16px;"><i class="fa fa-times fa-lg"></i> ' . $purchaseInfo[$i]['status_order'] . '</span>
                                            </div>';
                                                    } else {
                                                        echo '
                                            <div class="col-md-5 d-flex justify-content-end">
                                                <span class="mb-0 h6 align-self-center text-danger" style="margin-right: 27px; font-size: 16px;"><i class="fa fa-times fa-lg"></i> ' . $purchaseInfo[$i]['status_order'] . ' ' . $reason . '</span>
                                            </div>';
                                                    }
                                                } else if ($purchaseInfo[$i]['so_id'] == 5) {
                                                    echo '
                                            <div class="col-md-5 d-flex justify-content-end">
                                                <span class="mb-0 h6 align-self-center text-danger" style="margin-right: 27px; font-size: 16px;"><i class="fa fa-ban fa-lg"></i> ' . $purchaseInfo[$i]['status_order'] . '</span>
                                            </div>';
                                                } else if ($purchaseInfo[$i]['so_id'] == 6) {
                                                    echo '
                                            <div class="col-md-5 d-flex justify-content-end">
                                                <span class="mb-0 h6 align-self-center text-warning" style="margin-right: 27px; font-size: 16px;"><i class="fas fa-truck fa-lg"></i> ' . $purchaseInfo[$i]['status_order'] . '</span>
                                            </div>';
                                                } else if ($purchaseInfo[$i]['so_id'] == 7) {
                                                    echo '
                                            <div class="col-md-5 d-flex justify-content-end">
                                                <span class="mb-0 h6 align-self-center text-success" style="margin-right: 27px; font-size: 16px;"><i class="fa fa-flag-checkered fa-lg"></i> ' . $purchaseInfo[$i]['status_order'] . '</span>
                                            </div>';
                                                }
                                                echo '</div>
                                        <hr>';
                                            }


                                            echo '
                                    
                                        <div class="cart__product__item__title">
                                            <img src="../../../img/product/profile/' . $purchaseInfo[$i]['profile_product'] . '" alt="" width="90px" height="90px">
                                            <h6 style="font-size: 20px;"><a href="../product_detail/product-details.php?product_id=' . $purchaseInfo[$i]['product_id'] . '" style="color: inherit;">' . $purchaseInfo[$i]['product_name'] . '</a></h6>
                                            <p class="h6 mt-2 text-muted" style="font-size: 14px;">' . $purchaseInfo[$i]['product_specification'] . '</p> 
                                            <div class="row">
                                                <h6 class="text-muted" style="font-size: 16px;">x' . $purchaseInfo[$i]['quantity_product'] . '<span class="mb-0 h6" style="margin-top: 65px; margin-left: 900px; font-size: 18px">฿' . number_format($purchaseInfo[$i]['price'] * $purchaseInfo[$i]['quantity_product']) . '</span></h6>                                                                                                                  
                                            </div>
                                        </div>
                                    <hr>';

                                            if (count($purchaseInfo) > $i + 1) {
                                                if ($purchaseInfo[$i + 1]['order_id'] != $orderid) {
                                                    //$orderid = $purchaseInfo[$i]['order_id'];
                                                    echo '        
                                            <div class="col-12 d-flex justify-content-end align-self-center">
                                                <span class="mb-0 h6 text-muted" style="margin-right: 25px; align-self: center;">ยอดคำสั่งซื้อทั้งหมด </span>
                                                <span class="mb-0 h5" style="color: #FF6633; font-size: 22px">฿ ' . number_format($purchaseInfo[$i]['total_price']) . '</span>
                                            </div>
                                            <br>';
                                                    if ($purchaseInfo[$i]['so_id'] == 1) {
                                                        echo '
                                            <div class="col-12 d-flex justify-content-end align-self-center">
                                                <button type="button" class="btn btn-danger text-light cancelModal" style="margin-right: 20px"; data-orderid="[' . $purchaseInfo[$i]['order_id'] . ',' . $purchaseInfo[$i]['order_number'] . ']" data-toggle="modal" href="#cancelOrder">ยกเลิกคำสั่งซื้อ</button>
                                                <a href="../payment/payment.php?order_number=' . $purchaseInfo[$i]['order_number'] . '"><button type="button" class="btn btn-primary text-light">ชำระเงิน</button></a>
                                            </div>
                                            <br>';
                                                    } else if ($purchaseInfo[$i]['so_id'] == 2) { //onclick="cancelOrder(' . $purchaseInfo[$i]['order_id'] . ')"
                                                        echo '
                                            <div class="col-12 d-flex justify-content-end align-self-center">
                                                <button type="button" class="btn btn-danger text-light cancelModal" data-orderid="[' . $purchaseInfo[$i]['order_id'] . ',' . $purchaseInfo[$i]['order_number'] . ']" data-toggle="modal" href="#cancelOrder">ยกเลิกคำสั่งซื้อ</button>
                                            </div>
                                            <br>';
                                                    } else if ($purchaseInfo[$i]['so_id'] == 4) {
                                                        echo '
                                                <div class="col-12 d-flex justify-content-end align-self-center">
                                                    <a href="../profile-shop/profile-shop.php"><button type="button" class="btn btn-secondary" style="width: 120px;">ซื้ออีกครั้ง</button></a>
                                                </div>
                                                <br>';
                                                    } else if (($purchaseInfo[$i]['so_id'] == 3) || ($purchaseInfo[$i]['so_id'] == 5) || $purchaseInfo[$i]['so_id'] == 6) {
                                                        echo '<br>';
                                                    } else if ($purchaseInfo[$i]['so_id'] == 7) {
                                                        $sqlOrder = "SELECT * FROM (((`orders` INNER JOIN `orders_detail` ON `orders`.`order_id`=`orders_detail`.`orders_id`) 
                                                        INNER JOIN `product` ON `orders_detail`.`product_id`=`product`.`product_id`)
                                                        INNER JOIN `seller-list` ON `seller-list`.`shop_id`=`product`.`shop_id`)
                                                        WHERE `orders`.`order_id`=$orderid";
                                                        $orderDetail = selectData($sqlOrder);
                                                        $shopName = $orderDetail[1]['shop_name'];
                                                        $shopid = $orderDetail[1]['shop_id'];
                                                        /*
                                                        $productid = array("0");
                                                        for ($k = 1; $k < count($orderDetail); $k++) {
                                                            $productid[$k]['product_id'] = $orderDetail[$k]['product_id'];
                                                            $productid[$k]['product_name'] = $orderDetail[$k]['product_name'];
                                                            $productid[$k]['od_id'] = $orderDetail[$k]['od_id'];
                                                        }
                                                        echo print_r($productid);
                                                        */
                                                        //echo $productid[2]['product_name'];
                                                        //echo print_r($orderDetail);
                                                        //echo "shopid = ".$shopid;
                                                       
                                            echo' 
                                            <div class="col-12 d-flex justify-content-end align-self-center">
                                            <button type="button" class="btn btn-success text-light reviewProductModal" data-productid=';
                                                
                                                for($l=1 ; $l<count($orderDetail) ; $l++){
                                                    if($l == 1){
                                                        echo '{';
                                                    }
                                                     
                                                     if($l == count($orderDetail)-1){
                                                        echo '"'.$l.'":{"product_id":"'.$orderDetail[$l]['product_id'].'","product_name":"'.$orderDetail[$l]['product_name'].'","od_id":"'.$orderDetail[$l]['od_id'].'"}';
                                                        echo '}';
                                                    }else{
                                                        echo '"'.$l.'":{"product_id":"'.$orderDetail[$l]['product_id'].'","product_name":"'.$orderDetail[$l]['product_name'].'","od_id":"'.$orderDetail[$l]['od_id'].'"},';
                                                    }
                                                }
                                                echo '
                                                data-toggle="modal" href="#reviewProduct" style="margin-right: 20px";>ให้คะเเนนสินค้า</button>
                                                <button type="button" class="btn btn-success text-light reviewShopModal" data-shopid="'.$shopid.','.$shopName.'" data-toggle="modal" href="#reviewShop">ให้คะเเนนร้านค้า</button>
                                            </div>
                                            <br>';
                                           
                                                    }
                                                }
                                            } else if ($i == count($purchaseInfo) - 1) {
                                                echo '        
                                        <div class="col-12 d-flex justify-content-end align-self-center">
                                            <span class="mb-0 h6 text-muted" style="margin-right: 25px;">ยอดคำสั่งซื้อทั้งหมด </span>
                                            <span class="mb-0 h5" style="color: #FF6633; font-size: 22px">฿ ' . number_format($purchaseInfo[$i]['total_price']) . '</span>
                                        </div>
                                        <br>';
                                                if ($purchaseInfo[$i]['so_id'] == 1) {
                                                    echo '
                                        <div class="col-12 d-flex justify-content-end align-self-center">
                                            <button type="button" class="btn btn-danger text-light cancelModal" style="margin-right: 20px"; data-orderid="[' . $purchaseInfo[$i]['order_id'] . ',' . $purchaseInfo[$i]['order_number'] . ']"  data-toggle="modal" href="#cancelOrder">ยกเลิกคำสั่งซื้อ</button>
                                            <a href="../payment/payment.php?order_number=' . $purchaseInfo[$i]['order_number'] . '"><button type="button" class="btn btn-primary text-light">ชำระเงิน</button></a>
                                        </div>
                                        <br>';
                                                } else if ($purchaseInfo[$i]['so_id'] == 2) {
                                                    echo '
                                        <div class="col-12 d-flex justify-content-end align-self-center">
                                            <button type="button" class="btn btn-danger text-light cancelModal" data-orderid="[' . $purchaseInfo[$i]['order_id'] . ',' . $purchaseInfo[$i]['order_number'] . ']"  data-toggle="modal" href="#cancelOrder">ยกเลิกคำสั่งซื้อ</button>
                                        </div>
                                        <br>';
                                                } else if ($purchaseInfo[$i]['so_id'] == 4) {
                                                    echo '
                                            <div class="col-12 d-flex justify-content-end align-self-center">
                                                <a href="../profile-shop/profile-shop.php"><button type="button" class="btn btn-secondary" style="width: 120px;">ซื้ออีกครั้ง</button></a>
                                            </div>
                                            <br>';
                                                } else if (($purchaseInfo[$i]['so_id'] == 3) || ($purchaseInfo[$i]['so_id'] == 5) || $purchaseInfo[$i]['so_id'] == 6) {
                                                    echo '<br>';
                                                } else if ($purchaseInfo[$i]['so_id'] == 7) {
                                                    $sqlOrder = "SELECT * FROM (((`orders` INNER JOIN `orders_detail` ON `orders`.`order_id`=`orders_detail`.`orders_id`) 
                                                        INNER JOIN `product` ON `orders_detail`.`product_id`=`product`.`product_id`) 
                                                        INNER JOIN `seller-list` ON `seller-list`.`shop_id`=`product`.`shop_id`)
                                                        WHERE `orders`.`order_id`=$orderid";
                                                    $orderDetail = selectData($sqlOrder);
                                                    $shopid = $orderDetail[1]['shop_id'];
                                                    $shopName = $orderDetail[1]['shop_name'];
                                                    $productid = array("0");
                                                    for ($k = 1; $k < count($orderDetail); $k++) {
                                                        $productid[$k]['product_id'] = $orderDetail[$k]['product_id'];
                                                        $productid[$k]['product_name'] = $orderDetail[$k]['product_name'];
                                                        $productid[$k]['od_id'] = $orderDetail[$k]['od_id'];
                                                    }
                                                    //echo print_r($productid);
                                                    //echo strval(json_encode($productid))

                                                    //echo $productid[2]['product_name'];
                                                    //echo print_r($orderDetail);
                                                    //echo "shopid = ".$shopid;
                                                    /*
                                                    for($l=1 ; $l<count($orderDetail) ; $l++){
                                                        if($l == 1){
                                                            echo '{';
                                                        }
                                                         echo '{"product_id":"'.$orderDetail[$l]['product_id'].'", "product_name":"'.$orderDetail[$l]['product_name'].'", "od_id":"'.$orderDetail[$l]['od_id'].'"},';
                                                         if($l == count($orderDetail)-1){
                                                            echo '}';
                                                        }
                                                    }
                                                    */
                                                    
                                                    echo '
                                            <div class="col-12 d-flex justify-content-end align-self-center">
                                                <button type="button" class="btn btn-success text-light reviewProductModal" data-productid=';
                                               
                                                for($l=1 ; $l<count($orderDetail) ; $l++){
                                                    if($l == 1){
                                                        echo '{';
                                                    }
                                                     
                                                     if($l == count($orderDetail)-1){
                                                        echo '"'.$l.'":{"product_id":"'.$orderDetail[$l]['product_id'].'","product_name":"'.$orderDetail[$l]['product_name'].'","od_id":"'.$orderDetail[$l]['od_id'].'"}';
                                                        echo '}';
                                                    }else{
                                                        echo '"'.$l.'":{"product_id":"'.$orderDetail[$l]['product_id'].'","product_name":"'.$orderDetail[$l]['product_name'].'","od_id":"'.$orderDetail[$l]['od_id'].'"},';
                                                    }
                                                }
                                                echo '
                                                data-toggle="modal" href="#reviewProduct" style="margin-right: 20px";>ให้คะเเนนสินค้า</button>
                                                <button type="button" class="btn btn-success text-light reviewShopModal" data-shopid="'. $shopid.','.$shopName .'" data-toggle="modal" href="#reviewShop">ให้คะเเนนร้านค้า</button>
                                            </div>
                                            <br>';
                                            
                                                }
                                            }
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal -->
        <div class="modal fade" tabindex="-1" role="dialog" id="cancelOrder">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><b>ยกเลิกคำสั่งซื้อ</b></h5>
                    </div>
                    <div class="modal-body" id="modal-body">
                        <span style="font-size: 16px;"><b>Order Number: </b></span><span style="font-size: 20px;" name="order_number" id="order_number"></span><br>
                        <p style="font-size: 16px;">คุณต้องการยกเลิกคำสั่งซื้อนี้หรือไม่?</p>
                        <input name="order_id" id="order_id" value="" hidden />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal" style="width: 15%;" onclick="cancelOrder(document.getElementById('order_id').value)">ตกลง</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade center" tabindex="-1" role="dialog" id="reviewProduct">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><b>ให้คะเเนนสินค้า</b></h5>
                    </div>
                    <div class="modal-body" id="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal" style="width: 10%;" onclick="">ตกลง</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="shopName">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><b>ให้คะเเนนร้านค้า</b></h5>
                    </div>
                    <div class="modal-body" id="modal-body">
                    <span style="font-size: 16px;"><b>ชื่อร้านค้า: </b></span><span style="font-size: 20px;" name="shopName" id="shopName"></span><br>
                        <input name="shop_id" id="shop_id" value=""  />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal" style="width: 15%;" onclick="">ตกลง</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
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

<script>
    var objProduct = JSON.parse('<?= $jsonProduct; ?>');
</script>