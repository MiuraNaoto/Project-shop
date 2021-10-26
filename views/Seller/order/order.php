<!DOCTYPE html>
<html lang="en">

<?php
include_once("../../../query/query.php");
include_once("../../../query/function.php");
session_start();
$idUT = $_SESSION[md5('typeid')];
$username = $_SESSION[md5('username')];
$USER = $_SESSION[md5('user')];
$SELLER = $_SESSION[md5('shop')];
$uid = $USER[1]["uid"];
$shop_id = $SELLER[1]["shop_id"];

$CurrentMenu = "order";

// $ORDER = getAllOrder();
// $ORDER_DETAIL = getAllOrderDetail();
// $ORDER_DISAPPROVED = getOrderDisapproved();
// $ORDER_CANCEL = getOrderCancel();
// $ORDER_REFUND = getOrderRefund();
// $ORDER_IS_REFUND = getOrderIsRefund();
date_default_timezone_set("asia/bangkok");

$files = scandir("../../../data");
$count_file = (int) (count($files));
$scan_dir = array_diff(scandir("../../../data/"), array('..', '.'));

// echo $count_file . "<br>";
// print_r($scan_dir);
// echo "<br>";
// $file_json = file_get_contents("../../../data/" . $scan_dir[2]);
// $data = json_decode($file_json, true);
// echo (int) (count($data['order']['order_detail'])) . "<br>";
// print_r($data['order']);

// for ($i=2; $i < $count_file; $i++) { 
//     # code... 
//     echo readfile("../../../data/".$scan_dir[$i]);
// }

// print_r($ORDER);  
?>

<head>
    <?php
    include_once("../layout/header.php");
    ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include_once("../layout/sidebar.php") ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include_once("../layout/topbar.php") ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12 col-12 mb-4">
                            <div class="card-header card-bg">
                                <div class="row">
                                    <div class="col-12">
                                        <span class="link-active font-weight-bold" style="color:<?= $color ?>;">คำสั่งซื้อ</span>
                                        <span style="float:right;">
                                            <i class="fas fa-bookmark"></i>
                                            <a class="link-path" href="../dashboard/dashboard.php">หน้าแรก</a>
                                            <span> > รายการคำสั่งซื้อ</span>
                                            <!-- <a class="link-path link-active" href="#" style="padding-top:20px;color:#006664">รายการคำสั่งซื้อ</a> -->
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <!-- <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold d-flex justify-content-start" style="color: #006664;">รายการคำสั่งซื้อ</h6>
                        </div> -->
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tap1-tab" data-toggle="tab" href="#tap1" role="tab" aria-controls="tap1" aria-selected="true">รายการคำสั่งซื้อ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tap2-tab" data-toggle="tab" href="#tap2" role="tab" aria-controls="tap2" aria-selected="false">รายการคำสั่งซื้อที่ไม่อนุมัติ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tap3-tab" data-toggle="tab" href="#tap3" role="tab" aria-controls="tap3" aria-selected="false">ยกเลิกแล้ว</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tap4-tab" data-toggle="tab" href="#tap4" role="tab" aria-controls="tap4" aria-selected="false">การคืนเงิน</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tap5-tab" data-toggle="tab" href="#tap5" role="tab" aria-controls="tap5" aria-selected="false">คืนเงินแล้ว</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent" style="margin-top:20px;">
                                <!-- รายการคำสั่งซื้อ -->
                                <div class="tab-pane fade show active" id="tap1" role="tabpanel" aria-labelledby="tap1-tab">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <!-- <th style="text-align: center;">ลำดับ</th> -->
                                                <th style="text-align: center;">หมายเลข<br>คำสั่งซื้อ</th>
                                                <th style="text-align: center;">ชื่อ-นามสกุล</th>
                                                <!-- <th style="text-align: center;">รายการสินค้า</th> -->
                                                <th style="text-align: center;">จำนวนรวม</th>
                                                <th style="text-align: center;">ยอดรวม</th>
                                                <th style="text-align: center;">วัน-เวลาสั่งซื้อ</th>
                                                <th style="text-align: center;">วิธีการ<br>ชำระเงิน</th>
                                                <th style="text-align: center;">ยอดชำระ</th>
                                                <th style="text-align: center;">วัน-เวลาชำระ</th>
                                                <th style="text-align: center;">สถานะการชำระ</th>
                                                <th style="width: 13%; text-align: center;">จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            for ($i = 2; $i < $count_file; $i++) {
                                                // print_r($ORDER)
                                                $file_json = file_get_contents("../../../data/" . $scan_dir[$i]);
                                                $ORDER = json_decode($file_json, true);
                                                $ordernumber = $ORDER["order"]["order_number"];
                                                $firstname = $ORDER["user"]["firstname"];
                                                $lastname = $ORDER["user"]["lastname"];
                                                $total_unit = $ORDER["order"]["total_unit"];
                                                $total_price = $ORDER["order"]["total_price"];
                                                $time_order = $ORDER["order"]["time_order"];
                                                $total_price_user = $ORDER["order"]["total_price_user"];
                                                $time_payment = $ORDER["order"]["time_payment"];
                                                $status_order = $ORDER["order"]["status_order"]["status"];
                                                $delivery_address = $ORDER["order"]["delivery_address"]["address"];
                                                $tel = $ORDER["user"]["tel"];
                                                $picture_payment = $ORDER["order"]["picture_payment"];

                                                $sql_order_id = "SELECT `order_id` FROM `orders` WHERE `orders`.`order_number` = '" . $ordernumber . "' ";
                                                $orderId = selectDataOne($sql_order_id)["order_id"];
                                                if ($status_order == "ชำระเงินแล้ว") {
                                            ?>
                                                    <tr>
                                                        <!-- <td style="vertical-align: middle; text-align: center;"><?php echo $i; ?></td> -->
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo $ordernumber ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo $firstname . " " . $lastname ?></td>
                                                        <!-- <td style="vertical-align: middle; text-align: center;">
                                                        <button type="button" id="show" class="btn btn-primary btn-md" style="background-color: #6f42c1; border-color: #6f42c1;" title='รายละเอียดคำสั่งซื้อ' data-toggle="modal" data-target="#viewModal">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </td> -->
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo $total_unit ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo number_format($total_price, 2) ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo date("Y-m-d H:i:s", $time_order)  ?></td>
                                                        <td style="vertical-align: middle; text-align: end;">
                                                            <?php
                                                            if ($ORDER["order"]["type_payment"]["id"] == 1) {
                                                                echo "ชำระเงินแล้ว";
                                                            } else {
                                                                echo "ยังไม่ได้ชำระเงิน";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo number_format($total_price_user, 2) ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo date("Y-m-d H:i:s", $time_payment)  ?></td>
                                                        <td style="vertical-align: middle; text-align: center;"><?php echo $status_order ?></td>
                                                        <td style="text-align: center; vertical-align: middle;">
                                                            <?php
                                                            if ($status_order == "รอชำระเงิน") {
                                                            ?>
                                                                <button type="button" id="show" order_number='<?php echo $ordernumber ?>' fullname='<?php echo $firstname . " " . $lastname ?>' address='<?php $delivery_address ?>' tel='<?php echo format_phonenumber($tel) ?>' status_order='<?php echo $status_order ?>' total='<?php echo number_format($total_price, 2) ?>' class="btn btn-primary btn-md detail-order" style="background-color: #6f42c1; border-color: #6f42c1;" title='รายละเอียดคำสั่งซื้อ' data-toggle="modal" data-target="#detailOderModal">
                                                                    <i class="fas fa-bars"></i>
                                                                </button>
                                                                <!-- <button type="button" id="show" class="btn btn-primary btn-md" title='หลักฐานการโอนเงิน' data-toggle="modal" data-target="#paymentModal">
                                                                <i class="fas fa-image"></i>
                                                            </button>
                                                            <button type="button" id="show" class="btn btn-success btn-md" title='ยืนยันการซื้อ' disabled>
                                                                <i class="fas fa-check"></i>
                                                            </button>
                                                            <button type="button" id="show" class="btn btn-danger btn-md" title='ไม่ยืนยันการซื้อ' data-toggle="modal" data-target="#disapprovedModal" disabled>
                                                                <i class="fas fa-ban"></i>
                                                            </button> -->
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <button type="button" id="show" order_number='<?php echo $ordernumber ?>' fullname='<?php echo $firstname . " " . $lastname ?>' address='<?php echo $delivery_address ?>' tel='<?php echo format_phonenumber($tel) ?>' status_order='<?php echo $status_order ?>' total='<?php echo number_format($total_price, 2) ?>' class="btn btn-primary btn-md detail-order" style="background-color: #6f42c1; border-color: #6f42c1;" title='รายละเอียดคำสั่งซื้อ' data-toggle="modal" data-target="#detailOderModal">
                                                                    <i class="fas fa-bars"></i>
                                                                </button>
                                                                <button type="button" id="show" payment='<?php echo "../../../img/payment/bill/" . $picture_payment ?>' class="btn btn-primary btn-md payment" title='หลักฐานการโอนเงิน' data-toggle="modal" data-target="#paymentModal">
                                                                    <i class="fas fa-image"></i>
                                                                </button>
                                                                <button type="button" id="success" name="success" onclick="approved('<?php echo $orderId ?>', '<?php echo $ordernumber ?>')" class="btn btn-success btn-md" title='ยืนยันการซื้อ'>
                                                                    <i class="fas fa-check"></i>
                                                                </button>
                                                                <button type="button" id="show" class="btn btn-danger btn-md" onclick="disapproved('<?php echo $orderId ?>', '<?php echo $ordernumber ?>')" title='ไม่ยืนยันการซื้อ' data-toggle="modal" data-target="#disapprovedModal">
                                                                    <i class="fas fa-ban"></i>
                                                                </button>
                                                            <?php
                                                            }

                                                            ?>

                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- รายการคำสั่งซื้อที่ไม่อนุมัติ -->
                                <div class="tab-pane fade" id="tap2" role="tabpanel" aria-labelledby="tap2-tab">
                                    <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <!-- <th style="text-align: center;">ลำดับ</th> -->
                                                <th style="text-align: center;">หมายเลข<br>คำสั่งซื้อ</th>
                                                <th style="text-align: center;">ชื่อ-นามสกุล</th>
                                                <th style="text-align: center;">จำนวน</th>
                                                <th style="text-align: center;">ยอดรวม</th>
                                                <th style="text-align: center;">วัน-เวลาสั่งซื้อ</th>
                                                <!-- <th style="width: 9%; text-align: center;">วิธีการ<br>ชำระเงิน</th> -->
                                                <th style="width: 18%; text-align: center;">เหตุผล</th>
                                                <th style="width: 18%; text-align: center;">รายละเอียด</th>
                                                <th style="width: 18%; text-align: center;">จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            for ($i = 2; $i < $count_file; $i++) {
                                                $file_json = file_get_contents("../../../data/" . $scan_dir[$i]);
                                                $ORDER = json_decode($file_json, true);
                                                $ordernumber = $ORDER["order"]["order_number"];
                                                $firstname = $ORDER["user"]["firstname"];
                                                $lastname = $ORDER["user"]["lastname"];
                                                $total_unit = $ORDER["order"]["total_unit"];
                                                $total_price = $ORDER["order"]["total_price"];
                                                $time_order = $ORDER["order"]["time_order"];
                                                $total_price_user = $ORDER["order"]["total_price_user"];
                                                $time_payment = $ORDER["order"]["time_payment"];
                                                $status_order = $ORDER["order"]["status_order"]["status"];
                                                $delivery_address = $ORDER["order"]["delivery_address"]["address"];
                                                $tel = $ORDER["user"]["tel"];
                                                $picture_payment = $ORDER["order"]["picture_payment"];

                                                $sql_order_id = "SELECT `order_id` FROM `orders` WHERE `orders`.`order_number` = '" . $ordernumber . "' ";
                                                $orderId = selectDataOne($sql_order_id)["order_id"];

                                                if ($status_order == "ไม่อนุมัติคำสั่งซื้อ") {
                                                    $reason = $ORDER["order"]["status_order"]["reason"];
                                                    $reason_desc = $ORDER["order"]["status_order"]["reason_desc"];
                                            ?>
                                                    <tr>
                                                        <!-- <td style="vertical-align: middle; text-align: center;"><?php echo $i; ?></td> -->
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo $ordernumber ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo $firstname . " " . $lastname ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo $total_unit ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo number_format($total_price, 2) ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo date("Y-m-d H:i:s", $time_order) ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo $reason ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo $reason_desc ?></td>
                                                        <td style="width: 15%;  text-align: center; vertical-align: middle;">
                                                            <button type="button" id="show" order_number='<?php echo $ordernumber ?>' fullname='<?php echo $firstname . " " . $lastname ?>' address='<?php echo $delivery_address ?>' tel='<?php echo format_phonenumber($tel) ?>' status_order='<?php echo $status_order ?>' total='<?php echo number_format($total_price, 2) ?>' class="btn btn-primary btn-md detail-order" style="background-color: #6f42c1; border-color: #6f42c1;" title='รายละเอียดคำสั่งซื้อ' data-toggle="modal" data-target="#detailOderModal">
                                                                <i class="fas fa-bars"></i>
                                                            </button>
                                                            <button type="button" id="show" payment='<?php echo "../../../img/payment/bill/" . $picture_payment ?>' class="btn btn-primary btn-md payment" title='หลักฐานการโอนเงิน' data-toggle="modal" data-target="#paymentModal">
                                                                <i class="fas fa-image"></i>
                                                            </button>
                                                            <button type="button" id="success" name="success" onclick="approved('<?php echo $orderId ?>', '<?php echo $ordernumber ?>')" class="btn btn-success btn-md" title='ยืนยันการซื้อ'>
                                                                <i class="fas fa-check"></i>
                                                            </button>
                                                            <button type="button" id="show" class="btn btn-danger btn-md" title='ยกเลิกคำสั่งซื้อ' onclick="cancelfunction('<?php echo $orderId ?>', '<?php echo $ordernumber ?>')">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- ยกเลิกแล้ว -->
                                <div class="tab-pane fade" id="tap3" role="tabpanel" aria-labelledby="tap3-tab">
                                    <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">หมายเลข<br>คำสั่งซื้อ</th>
                                                <th style="text-align: center;">ชื่อ-นามสกุล</th>
                                                <th style="text-align: center;">จำนวน</th>
                                                <th style="text-align: center;">ยอดรวม</th>
                                                <th style="text-align: center;">วัน-เวลาสั่งซื้อ</th>
                                                <!-- <th style="width: 9%; text-align: center;">วิธีการ<br>ชำระเงิน</th> -->
                                                <th style="width: 18%; text-align: center;">เหตุผล</th>
                                                <th style="width: 18%; text-align: center;">รายละเอียด</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            for ($i = 2; $i < $count_file; $i++) {
                                                $file_json = file_get_contents("../../../data/" . $scan_dir[$i]);
                                                $ORDER = json_decode($file_json, true);
                                                $ordernumber = $ORDER["order"]["order_number"];
                                                $firstname = $ORDER["user"]["firstname"];
                                                $lastname = $ORDER["user"]["lastname"];
                                                $total_unit = $ORDER["order"]["total_unit"];
                                                $total_price = $ORDER["order"]["total_price"];
                                                $time_order = $ORDER["order"]["time_order"];
                                                $total_price_user = $ORDER["order"]["total_price_user"];
                                                $time_payment = $ORDER["order"]["time_payment"];
                                                $status_order = $ORDER["order"]["status_order"]["status"];
                                                $delivery_address = $ORDER["order"]["delivery_address"]["address"];
                                                $tel = $ORDER["user"]["tel"];
                                                $picture_payment = $ORDER["order"]["picture_payment"];

                                                $sql_order_id = "SELECT `order_id` FROM `orders` WHERE `orders`.`order_number` = '" . $ordernumber . "' ";
                                                $orderId = selectDataOne($sql_order_id)["order_id"];

                                                if ($status_order == "ยกเลิกคำสั่งซื้อ") {
                                                    $reason = $ORDER["order"]["status_order"]["reason"];
                                                    $reason_desc = $ORDER["order"]["status_order"]["reason_desc"];
                                            ?>
                                                    <tr>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo $ordernumber ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo $firstname . " " . $lastname ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo $total_unit ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo number_format($total_price, 2) ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo date("Y-m-d H:i:s", $time_order) ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo $reason ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo $reason_desc ?></td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- การคืนเงิน -->
                                <div class="tab-pane fade" id="tap4" role="tabpanel" aria-labelledby="tap4-tab">
                                    <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">หมายเลข<br>คำสั่งซื้อ</th>
                                                <th style="text-align: center;">ชื่อ-นามสกุล</th>
                                                <th style="text-align: center;">จำนวน</th>
                                                <th style="text-align: center;">ยอดรวม</th>
                                                <th style="text-align: center;">วัน-เวลาสั่งซื้อ</th>
                                                <!-- <th style="width: 9%; text-align: center;">วิธีการ<br>ชำระเงิน</th> -->
                                                <th style="width: 18%; text-align: center;">เหตุผล</th>
                                                <th style="width: 18%; text-align: center;">รายละเอียด</th>
                                                <th style="width: 18%; text-align: center;">จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            for ($i = 2; $i < $count_file; $i++) {
                                                $file_json = file_get_contents("../../../data/" . $scan_dir[$i]);
                                                $ORDER = json_decode($file_json, true);
                                                $ordernumber = $ORDER["order"]["order_number"];
                                                $firstname = $ORDER["user"]["firstname"];
                                                $lastname = $ORDER["user"]["lastname"];
                                                $total_unit = $ORDER["order"]["total_unit"];
                                                $total_price = $ORDER["order"]["total_price"];
                                                $time_order = $ORDER["order"]["time_order"];
                                                $total_price_user = $ORDER["order"]["total_price_user"];
                                                $time_payment = $ORDER["order"]["time_payment"];
                                                $status_order = $ORDER["order"]["status_order"]["status"];
                                                if (isset($ORDER["order"]["status_order"]["status_refund"])) {
                                                    $status_refund = $ORDER["order"]["status_order"]["status_refund"];
                                                }
                                                $delivery_address = $ORDER["order"]["delivery_address"]["address"];
                                                $tel = $ORDER["user"]["tel"];
                                                $picture_payment = $ORDER["order"]["picture_payment"];

                                                $sql_order_id = "SELECT `order_id` FROM `orders` WHERE `orders`.`order_number` = '" . $ordernumber . "' ";
                                                $orderId = selectDataOne($sql_order_id)["order_id"];

                                                if ($status_order == "ยกเลิกคำสั่งซื้อ" && $status_refund == "0") {
                                                    $reason = $ORDER["order"]["status_order"]["reason"];
                                                    $reason_desc = $ORDER["order"]["status_order"]["reason_desc"];
                                            ?>
                                                    <tr>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo $ordernumber ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo $firstname . " " . $lastname ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo $total_unit ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo number_format($total_price, 2) ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo date("Y-m-d H:i:s", $time_order) ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo $reason ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo $reason_desc ?></td>
                                                        <td style="width: 15%;  text-align: center; vertical-align: middle;">
                                                            <button type="button" id="show" order_number='<?php echo $ordernumber ?>' fullname='<?php echo $firstname . " " . $lastname ?>' address='<?php echo $delivery_address ?>' tel='<?php echo format_phonenumber($tel) ?>' status_order='<?php echo $status_order ?>' total='<?php echo number_format($total_price, 2) ?>' class="btn btn-primary btn-md detail-order" style="background-color: #6f42c1; border-color: #6f42c1;" title='รายละเอียดคำสั่งซื้อ' data-toggle="modal" data-target="#detailOderModal">
                                                                <i class="fas fa-bars"></i>
                                                            </button>
                                                            <button type="button" id="show" payment='<?php echo "../../../img/payment/bill/" . $picture_payment ?>' class="btn btn-primary btn-md payment" title='หลักฐานการโอนเงิน' data-toggle="modal" data-target="#paymentModal">
                                                                <i class="fas fa-image"></i>
                                                            </button>
                                                            <button type="button" id="success" name="success" onclick="refund('<?php echo $orderId ?>', '<?php echo $ordernumber ?>')" class="btn btn-success btn-md" title='ยืนยันการคืนเงิน'>
                                                                <i class="fas fa-check"></i>
                                                            </button>

                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- คืนเงินแล้ว -->
                                <div class="tab-pane fade" id="tap5" role="tabpanel" aria-labelledby="tap5-tab">
                                    <table class="table table-bordered" id="dataTable4" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">หมายเลข<br>คำสั่งซื้อ</th>
                                                <th style="text-align: center;">ชื่อ-นามสกุล</th>
                                                <th style="text-align: center;">จำนวน</th>
                                                <th style="text-align: center;">ยอดรวม</th>
                                                <th style="text-align: center;">วัน-เวลาสั่งซื้อ</th>
                                                <!-- <th style="width: 9%; text-align: center;">วิธีการ<br>ชำระเงิน</th> -->
                                                <th style="width: 18%; text-align: center;">เหตุผล</th>
                                                <th style="width: 18%; text-align: center;">รายละเอียด</th>
                                                <th style="width: 18%; text-align: center;">สถานะการคืนเงิน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            for ($i = 2; $i < $count_file; $i++) {
                                                $file_json = file_get_contents("../../../data/" . $scan_dir[$i]);
                                                $ORDER = json_decode($file_json, true);
                                                $ordernumber = $ORDER["order"]["order_number"];
                                                $firstname = $ORDER["user"]["firstname"];
                                                $lastname = $ORDER["user"]["lastname"];
                                                $total_unit = $ORDER["order"]["total_unit"];
                                                $total_price = $ORDER["order"]["total_price"];
                                                $time_order = $ORDER["order"]["time_order"];
                                                $total_price_user = $ORDER["order"]["total_price_user"];
                                                $time_payment = $ORDER["order"]["time_payment"];
                                                $status_order = $ORDER["order"]["status_order"]["status"];
                                                if (isset($ORDER["order"]["status_order"]["status_refund"])) {
                                                    $status_refund = $ORDER["order"]["status_order"]["status_refund"];
                                                }
                                                $delivery_address = $ORDER["order"]["delivery_address"]["address"];
                                                $tel = $ORDER["user"]["tel"];
                                                $picture_payment = $ORDER["order"]["picture_payment"];

                                                $sql_order_id = "SELECT `order_id` FROM `orders` WHERE `orders`.`order_number` = '" . $ordernumber . "' ";
                                                $orderId = selectDataOne($sql_order_id)["order_id"];

                                                if ($status_order == "ยกเลิกคำสั่งซื้อ" && $status_refund == "1") {
                                                    $reason = $ORDER["order"]["status_order"]["reason"];
                                                    $reason_desc = $ORDER["order"]["status_order"]["reason_desc"];
                                            ?>
                                                    <tr>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo $ordernumber ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo $firstname . " " . $lastname ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo $total_unit ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo number_format($total_price, 2) ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo date("Y-m-d H:i:s", $time_order) ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo $reason ?></td>
                                                        <td style="vertical-align: middle; text-align: end;"><?php echo $reason_desc ?></td>
                                                        <td style="width: 15%;  text-align: center; vertical-align: middle;"><?php echo "คืนเงินแล้ว"; ?></td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?php
            include_once("../layout/footer.php");
            include_once("orderModal.php");
            ?>

            <script src="order.js"></script>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

</body>

</html>