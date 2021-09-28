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
    $uid = $USER[1]["uid"];
    $NOTIFICATION = getNotification($uid);
}

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
                        <span>การแจ้งเตือน</span>
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
                                <?php
                                for ($i = 1; $i < count($NOTIFICATION); $i++) {
                                    // print_r($NOTIFICATION)
                                ?>
                                    <tr>
                                        <td class="cart__product__item">
                                            <div class="cart__product__item__title">
                                                
                                                <div class="col-lg-12">

                                                    <?php
                                                    if ($NOTIFICATION[$i]["status_order"] == "ชำระเงินแล้ว") {
                                                        echo '  
                                                                <img src="../../../img/icon/waiting.png" alt="" width="75px" height="75px">
                                                                <h6>รอการยืนยัน</h6>
                                                                <div class="col-lg-12 mt-2">
                                                                    หมายเลขคำสั่งซื้อ <span class="h6" style="color: green; font-size: 15px;">' . $NOTIFICATION[$i]["order_number"] . '</span></span>
                                                                </div>
                                                        ';
                                                    } elseif ($NOTIFICATION[$i]["status_order"] == "รอชำระเงิน") {
                                                        echo '
                                                                <img src="../../../img/icon/payment.png" alt="" width="75px" height="75px"> 
                                                                <h6>รอชำระเงิน</h6>
                                                                <div class="col-lg-12 mt-2">
                                                                    <span class="h6" style="font-size: 15px;">หมายเลขคำสั่งซื้อ <span class="h6" style="color: green; font-size: 15px;">' . $NOTIFICATION[$i]["order_number"] . '</span>
                                                                        <a href="../payment/payment.php?order_number=' . $NOTIFICATION[$i]["order_number"] . '">กรุณาชำระเงิน</a>
                                                                    </span>
                                                                </div>
                                                        ';
                                                    } elseif ($NOTIFICATION[$i]["status_order"] == "ยืนยันการชำระ") {
                                                        echo '  
                                                                <img src="../../../img/icon/steps.png" alt="" width="75px" height="75px"> 
                                                                <h6>กำลังดำเนินการ</h6>
                                                                <div class="col-lg-12 mt-2">
                                                                    <span class="h6" style="font-size: 15px;">หมายเลขคำสั่งซื้อ <span class="h6" style="color: green; font-size: 15px;">' . $NOTIFICATION[$i]["order_number"] . '</span>
                                                                    </span>
                                                                </div>
                                                        ';
                                                        echo '<span class="h6" style="font-size: 15px;">' . $NOTIFICATION[$i]["order_number"] . "</span>";
                                                    } elseif ($NOTIFICATION[$i]["status_order"] == "ไม่อนุมัติคำสั่งซื้อ") {
                                                        if ($NOTIFICATION[$i]["reason_id"] == 1) {
                                                            echo '  
                                                            <img src="../../../img/icon/cancellation.png" alt="" width="75px" height="75px"> 
                                                            <h6>ไม่อนุมัติคำสั่งซื้อ</h6>
                                                            <div class="col-lg-12 mt-2">
                                                                <span class="h6" style="font-size: 15px;">หมายเลขคำสั่งซื้อ <span class="h6" style="color: green; font-size: 15px;">' . $NOTIFICATION[$i]["order_number"] . '</span>
                                                                   ไม่อนุมัติ เนื่องจาก โอนเงินเกินจำนวน
                                                                </span>
                                                            </div>
                                                    ';
                                                        } elseif ($NOTIFICATION[$i]["reason_id"] == 2) {
                                                            echo '  
                                                            <img src="../../../img/icon/cancellation.png" alt="" width="75px" height="75px"> 
                                                            <h6>ไม่อนุมัติคำสั่งซื้อ</h6>
                                                            <div class="col-lg-12 mt-2">
                                                                <span class="h6" style="font-size: 15px;">หมายเลขคำสั่งซื้อ <span class="h6" style="color: green; font-size: 15px;">' . $NOTIFICATION[$i]["order_number"] . '</span>
                                                                   ไม่อนุมัติ เนื่องจาก โอนเงินไม่ครบจำนวน
                                                                </span>
                                                            </div>
                                                    ';
                                                        } else {
                                                            echo '  
                                                            <img src="../../../img/icon/cancellation.png" alt="" width="75px" height="75px"> 
                                                            <h6>ไม่อนุมัติคำสั่งซื้อ</h6>
                                                            <div class="col-lg-12 mt-2">
                                                                <span class="h6" style="font-size: 15px;">หมายเลขคำสั่งซื้อ <span class="h6" style="color: green; font-size: 15px;">' . $NOTIFICATION[$i]["order_number"] . '</span>
                                                                   ไม่อนุมัติ เนื่องจาก' . $NOTIFICATION[$i]["reason_desc"] . '
                                                                </span>
                                                            </div>
                                                    ';
                                                        }
                                                    } elseif ($NOTIFICATION[$i]["status_order"] == "กำลังจัดส่ง") {
                                                        echo '  <img src="../../../img/icon/delivery-truck.png" alt="" width="75px" height="75px"> 
                                                                <h6>กำลังจัดส่ง</h6>
                                                                <div class="col-lg-12 mt-2"> หมายเลขพัสดุ 
                                                                    <span class="h6" style="font-size: 15px;">หมายเลขคำสั่งซื้อ <span class="h6" style="color: green; font-size: 15px;">' . $NOTIFICATION[$i]["tracking_code"] . '</span>
                                                                        <span class="h6" style="font-size: 15px;">หมายเลขคำสั่งซื้อ <span class="h6" style="color: green; font-size: 15px;">' . $NOTIFICATION[$i]["order_number"] . '</span>
                                                                    </span>
                                                                </div>
                                                        ';
                                                    }


                                                    ?>

                                                </div>
                                                <!-- <div class="col-lg-12 mt-2 ">
                                                    <span class="h6 text-muted">รอยืนยัน</span>
                                                </div> -->
                                            </div>
                                            <br>
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
        </div>
    </section>
    <!-- Shop Cart Section End -->

    <!-- Js Plugins -->
    <?php include_once("../layout/js.php"); ?>
</body>

</html>