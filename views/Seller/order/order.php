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

$ORDER = getAllOrder();
$ORDER_DETAIL = getAllOrderDetail();
$ORDER_DISAPPROVED = getOrderDisapproved();
$ORDER_CANCEL = getOrderCancel();
$ORDER_REFUND = getOrderRefund();
$ORDER_IS_REFUND = getOrderIsRefund();
date_default_timezone_set("asia/bangkok");
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
                                            for ($i = 1; $i < count($ORDER); $i++) {
                                            ?>
                                                <tr>
                                                    <!-- <td style="vertical-align: middle; text-align: center;"><?php echo $i; ?></td> -->
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $ORDER[$i]["order_number"] ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $ORDER[$i]["title"] . $ORDER[$i]["firstname"] . " " . $ORDER[$i]["lastname"] ?></td>
                                                    <!-- <td style="vertical-align: middle; text-align: center;">
                                                        <button type="button" id="show" class="btn btn-primary btn-md" style="background-color: #6f42c1; border-color: #6f42c1;" title='รายละเอียดคำสั่งซื้อ' data-toggle="modal" data-target="#viewModal">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </td> -->
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $ORDER[$i]["total_unit"] ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo number_format($ORDER[$i]["total_price"], 2) ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo date("Y-m-d H:i:s", $ORDER[$i]["time_order"])  ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $ORDER[$i]["type_payment"] ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo number_format($ORDER[$i]["total_price_user"], 2) ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo date("Y-m-d H:i:s", $ORDER[$i]["time_payment"])  ?></td>
                                                    <td style="vertical-align: middle; text-align: center;"><?php echo $ORDER[$i]["status_order"] ?></td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        <?php
                                                        if ($ORDER[$i]["status_order"] == "รอชำระเงิน") {
                                                        ?>
                                                            <button type="button" id="show" order_number='<?php echo $ORDER[$i]["order_number"] ?>' fullname='<?php echo $ORDER[$i]["title"] . $ORDER[$i]["firstname"] . " " . $ORDER[$i]["lastname"] ?>' address='<?php
                                                                                                                                                                                                                                                                    if ($ORDER[1]["provinces_name_in_thai"] == "กรุงเทพมหานคร") {
                                                                                                                                                                                                                                                                        echo "เลขที่ " . $ORDER[1]["address"] .
                                                                                                                                                                                                                                                                            " แขวง" . $ORDER[1]["subdistricts_name_in_thai"] .
                                                                                                                                                                                                                                                                            " " . $ORDER[1]["districts_name_in_thai"] .
                                                                                                                                                                                                                                                                            " " . $ORDER[1]["provinces_name_in_thai"] .
                                                                                                                                                                                                                                                                            ", " . $ORDER[1]["zip_code"];
                                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                                        echo "เลขที่ " . $ORDER[1]["address"] .
                                                                                                                                                                                                                                                                            " ต." . $ORDER[1]["subdistricts_name_in_thai"] .
                                                                                                                                                                                                                                                                            " อ." . $ORDER[1]["districts_name_in_thai"] .
                                                                                                                                                                                                                                                                            " จ." . $ORDER[1]["provinces_name_in_thai"] .
                                                                                                                                                                                                                                                                            ", " . $ORDER[1]["zip_code"];
                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                    ?>' tel='<?php echo format_phonenumber($ORDER[$i]["tel"]) ?>' status_order='<?php echo $ORDER[$i]["status_order"] ?>' total='<?php echo number_format($ORDER[$i]["total_price"], 2) ?>' class="btn btn-primary btn-md detail-order" style="background-color: #6f42c1; border-color: #6f42c1;" title='รายละเอียดคำสั่งซื้อ' data-toggle="modal" data-target="#detailOderModal">
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
                                                            <button type="button" id="show" order_number='<?php echo $ORDER[$i]["order_number"] ?>' fullname='<?php echo $ORDER[$i]["title"] . $ORDER[$i]["firstname"] . " " . $ORDER[$i]["lastname"] ?>' address='<?php
                                                                                                                                                                                                                                                                    if ($ORDER[1]["provinces_name_in_thai"] == "กรุงเทพมหานคร") {
                                                                                                                                                                                                                                                                        echo "เลขที่ " . $ORDER[1]["address"] .
                                                                                                                                                                                                                                                                            " แขวง" . $ORDER[1]["subdistricts_name_in_thai"] .
                                                                                                                                                                                                                                                                            " " . $ORDER[1]["districts_name_in_thai"] .
                                                                                                                                                                                                                                                                            " " . $ORDER[1]["provinces_name_in_thai"] .
                                                                                                                                                                                                                                                                            ", " . $ORDER[1]["zip_code"];
                                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                                        echo "เลขที่ " . $ORDER[1]["address"] .
                                                                                                                                                                                                                                                                            " ต." . $ORDER[1]["subdistricts_name_in_thai"] .
                                                                                                                                                                                                                                                                            " อ." . $ORDER[1]["districts_name_in_thai"] .
                                                                                                                                                                                                                                                                            " จ." . $ORDER[1]["provinces_name_in_thai"] .
                                                                                                                                                                                                                                                                            ", " . $ORDER[1]["zip_code"];
                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                    ?>' tel='<?php echo format_phonenumber($ORDER[$i]["tel"]) ?>' status_order='<?php echo $ORDER[$i]["status_order"] ?>' total='<?php echo number_format($ORDER[$i]["total_price"], 2) ?>' class="btn btn-primary btn-md detail-order" style="background-color: #6f42c1; border-color: #6f42c1;" title='รายละเอียดคำสั่งซื้อ' data-toggle="modal" data-target="#detailOderModal">
                                                                <i class="fas fa-bars"></i>
                                                            </button>
                                                            <button type="button" id="show" payment='<?php echo $ORDER[$i]["picture_payment"] ?>' class="btn btn-primary btn-md payment" title='หลักฐานการโอนเงิน' data-toggle="modal" data-target="#paymentModal">
                                                                <i class="fas fa-image"></i>
                                                            </button>
                                                            <button type="button" id="success" name="success" onclick="approved('<?php echo $ORDER[$i]['order_id'] ?>', '<?php echo $ORDER[$i]['order_number'] ?>')" class="btn btn-success btn-md" title='ยืนยันการซื้อ'>
                                                                <i class="fas fa-check"></i>
                                                            </button>
                                                            <button type="button" id="show" class="btn btn-danger btn-md" onclick="disapproved('<?php echo $ORDER[$i]['order_id'] ?>', '<?php echo $ORDER[$i]['order_number'] ?>')" title='ไม่ยืนยันการซื้อ' data-toggle="modal" data-target="#disapprovedModal">
                                                                <i class="fas fa-ban"></i>
                                                            </button>
                                                        <?php
                                                        }

                                                        ?>

                                                    </td>
                                                </tr>
                                            <?php
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
                                            for ($i = 1; $i < count($ORDER_DISAPPROVED); $i++) {
                                            ?>
                                                <tr>
                                                    <!-- <td style="vertical-align: middle; text-align: center;"><?php echo $i; ?></td> -->
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $ORDER_DISAPPROVED[$i]["order_number"] ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $ORDER_DISAPPROVED[$i]["title"] . $ORDER_DISAPPROVED[$i]["firstname"] . " " . $ORDER_DISAPPROVED[$i]["lastname"] ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $ORDER_DISAPPROVED[$i]["total_unit"] ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo number_format($ORDER_DISAPPROVED[$i]["total_price"], 2) ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo date("Y-m-d H:i:s", $ORDER_DISAPPROVED[$i]["time_order"])  ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $ORDER_DISAPPROVED[$i]["reason"] ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $ORDER_DISAPPROVED[$i]["reason_desc"] ?></td>
                                                    <td style="width: 15%;  text-align: center; vertical-align: middle;">
                                                        <button type="button" id="show" order_number='<?php echo $ORDER_DISAPPROVED[$i]["order_number"] ?>' fullname='<?php echo $ORDER_DISAPPROVED[$i]["title"] . $ORDER_DISAPPROVED[$i]["firstname"] . " " . $ORDER_DISAPPROVED[$i]["lastname"] ?>' address='<?php
                                                                                                                                                                                                                                                                                                                if ($ORDER_DISAPPROVED[1]["provinces_name_in_thai"] == "กรุงเทพมหานคร") {
                                                                                                                                                                                                                                                                                                                    echo "เลขที่ " . $ORDER_DISAPPROVED[1]["address"] .
                                                                                                                                                                                                                                                                                                                        " แขวง" . $ORDER_DISAPPROVED[1]["subdistricts_name_in_thai"] .
                                                                                                                                                                                                                                                                                                                        " " . $ORDER_DISAPPROVED[1]["districts_name_in_thai"] .
                                                                                                                                                                                                                                                                                                                        " " . $ORDER_DISAPPROVED[1]["provinces_name_in_thai"] .
                                                                                                                                                                                                                                                                                                                        ", " . $ORDER_DISAPPROVED[1]["zip_code"];
                                                                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                                                                    echo "เลขที่ " . $ORDER_DISAPPROVED[1]["address"] .
                                                                                                                                                                                                                                                                                                                        " ต." . $ORDER_DISAPPROVED[1]["subdistricts_name_in_thai"] .
                                                                                                                                                                                                                                                                                                                        " อ." . $ORDER_DISAPPROVED[1]["districts_name_in_thai"] .
                                                                                                                                                                                                                                                                                                                        " จ." . $ORDER_DISAPPROVED[1]["provinces_name_in_thai"] .
                                                                                                                                                                                                                                                                                                                        ", " . $ORDER_DISAPPROVED[1]["zip_code"];
                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                ?>' tel='<?php echo format_phonenumber($ORDER_DISAPPROVED[$i]["tel"]) ?>' status_order='<?php echo $ORDER_DISAPPROVED[$i]["status_order"] ?>' total='<?php echo number_format($ORDER_DISAPPROVED[$i]["total_price"], 2) ?>' class="btn btn-primary btn-md detail-order" style="background-color: #6f42c1; border-color: #6f42c1;" title='รายละเอียดคำสั่งซื้อ' data-toggle="modal" data-target="#detailOderModal">
                                                            <i class="fas fa-bars"></i>
                                                        </button>
                                                        <button type="button" id="show" payment='<?php echo $ORDER_DISAPPROVED[$i]["picture_payment"] ?>' class="btn btn-primary btn-md payment" title='หลักฐานการโอนเงิน' data-toggle="modal" data-target="#paymentModal">
                                                            <i class="fas fa-image"></i>
                                                        </button>
                                                        <button type="button" id="success" name="success" onclick="approved('<?php echo $ORDER_DISAPPROVED[$i]['order_id'] ?>', '<?php echo $ORDER_DISAPPROVED[$i]['order_number'] ?>')" class="btn btn-success btn-md" title='ยืนยันการซื้อ'>
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                        <button type="button" id="show" class="btn btn-danger btn-md" title='ยกเลิกคำสั่งซื้อ' onclick="cancelfunction('<?php echo $ORDER_DISAPPROVED[$i]['order_id'] ?>', '<?php echo $ORDER_DISAPPROVED[$i]['order_number'] ?>')">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php
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
                                            for ($i = 1; $i < count($ORDER_CANCEL); $i++) {
                                            ?>
                                                <tr>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $ORDER_CANCEL[$i]["order_number"] ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $ORDER_CANCEL[$i]["title"] . $ORDER_CANCEL[$i]["firstname"] . " " . $ORDER_CANCEL[$i]["lastname"] ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $ORDER_CANCEL[$i]["total_unit"] ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo number_format($ORDER_CANCEL[$i]["total_price"], 2) ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo date("Y-m-d H:i:s", $ORDER_CANCEL[$i]["time_order"])  ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $ORDER_CANCEL[$i]["reason"] ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $ORDER_CANCEL[$i]["reason_desc"] ?></td>
                                                </tr>
                                            <?php
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
                                            for ($i = 1; $i < count($ORDER_REFUND); $i++) {
                                            ?>
                                                <tr>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $ORDER_REFUND[$i]["order_number"] ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $ORDER_REFUND[$i]["title"] . $ORDER_REFUND[$i]["firstname"] . " " . $ORDER_REFUND[$i]["lastname"] ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $ORDER_REFUND[$i]["total_unit"] ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo number_format($ORDER_REFUND[$i]["total_price"], 2) ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo date("Y-m-d H:i:s", $ORDER_REFUND[$i]["time_order"])  ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $ORDER_REFUND[$i]["reason"] ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $ORDER_REFUND[$i]["reason_desc"] ?></td>
                                                    <td style="width: 15%;  text-align: center; vertical-align: middle;">
                                                        <button type="button" id="show" order_number='<?php echo $ORDER_REFUND[$i]["order_number"] ?>' fullname='<?php echo $ORDER_REFUND[$i]["title"] . $ORDER_REFUND[$i]["firstname"] . " " . $ORDER_REFUND[$i]["lastname"] ?>' address='<?php
                                                                                                                                                                                                                                                                                            if ($ORDER_REFUND[1]["provinces_name_in_thai"] == "กรุงเทพมหานคร") {
                                                                                                                                                                                                                                                                                                echo "เลขที่ " . $ORDER_REFUND[1]["address"] .
                                                                                                                                                                                                                                                                                                    " แขวง" . $ORDER_REFUND[1]["subdistricts_name_in_thai"] .
                                                                                                                                                                                                                                                                                                    " " . $ORDER_REFUND[1]["districts_name_in_thai"] .
                                                                                                                                                                                                                                                                                                    " " . $ORDER_REFUND[1]["provinces_name_in_thai"] .
                                                                                                                                                                                                                                                                                                    ", " . $ORDER_REFUND[1]["zip_code"];
                                                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                                                                echo "เลขที่ " . $ORDER_REFUND[1]["address"] .
                                                                                                                                                                                                                                                                                                    " ต." . $ORDER_REFUND[1]["subdistricts_name_in_thai"] .
                                                                                                                                                                                                                                                                                                    " อ." . $ORDER_REFUND[1]["districts_name_in_thai"] .
                                                                                                                                                                                                                                                                                                    " จ." . $ORDER_REFUND[1]["provinces_name_in_thai"] .
                                                                                                                                                                                                                                                                                                    ", " . $ORDER_REFUND[1]["zip_code"];
                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                            ?>' tel='<?php echo format_phonenumber($ORDER_REFUND[$i]["tel"]) ?>' status_order='<?php echo $ORDER_REFUND[$i]["status_order"] ?>' total='<?php echo number_format($ORDER_REFUND[$i]["total_price"], 2) ?>' class="btn btn-primary btn-md detail-order" style="background-color: #6f42c1; border-color: #6f42c1;" title='รายละเอียดคำสั่งซื้อ' data-toggle="modal" data-target="#detailOderModal">
                                                            <i class="fas fa-bars"></i>
                                                        </button>
                                                        <button type="button" id="show" payment='<?php echo $ORDER_DISAPPROVED[$i]["picture_payment"] ?>' class="btn btn-primary btn-md payment" title='หลักฐานการโอนเงิน' data-toggle="modal" data-target="#paymentModal">
                                                            <i class="fas fa-image"></i>
                                                        </button>
                                                        <button type="button" id="success" name="success" onclick="refund('<?php echo $ORDER_REFUND[$i]['order_id'] ?>', '<?php echo $ORDER_REFUND[$i]['order_number'] ?>')" class="btn btn-success btn-md" title='ยืนยันการคืนเงิน'>
                                                            <i class="fas fa-check"></i>
                                                        </button>

                                                    </td>
                                                </tr>
                                            <?php
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
                                            for ($i = 1; $i < count($ORDER_IS_REFUND); $i++) {
                                            ?>
                                                <tr>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $ORDER_IS_REFUND[$i]["order_number"] ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $ORDER_IS_REFUND[$i]["title"] . $ORDER_IS_REFUND[$i]["firstname"] . " " . $ORDER_IS_REFUND[$i]["lastname"] ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $ORDER_IS_REFUND[$i]["total_unit"] ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo number_format($ORDER_IS_REFUND[$i]["total_price"], 2) ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo date("Y-m-d H:i:s", $ORDER_IS_REFUND[$i]["time_order"])  ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $ORDER_IS_REFUND[$i]["reason"] ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $ORDER_IS_REFUND[$i]["reason_desc"] ?></td>
                                                    <td style="width: 15%;  text-align: center; vertical-align: middle;">
                                                        <?php
                                                        if ($ORDER_IS_REFUND[$i]["status_refund"] == 1) {
                                                            echo "คืนเงินแล้ว";
                                                        } else {
                                                            echo "ยังม่ได้คืนเงินแล้ว";
                                                        }

                                                        ?>
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