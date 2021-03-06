<!DOCTYPE html>
<html lang="en">
<?php
include_once("../../../query/query.php");
include_once("../../../query/function.php");
session_start();
$idUT = $_SESSION[md5('typeid')];
$username = $_SESSION[md5('username')];
$USER = $_SESSION[md5('user')];
$USER = $_SESSION[md5('user')];
$uid = $USER[1]["uid"];
$SELLER = $_SESSION[md5('shop')];
$shop_id = $SELLER[1]["shop_id"];

$CurrentMenu = "sales";

// $PRODUCT = getProductByShopID($uid);
// $PRODUCT = getProductByShopID($uid);
// $ORDER_SUCCESS = getOrderSuccess();
// print_r($ORDER_SUCCESS);
$files = scandir("../../../data");
$count_file = (int) (count($files));
$scan_dir = array_diff(scandir("../../../data/"), array('..', '.'));
?>

<head>
    <?php include_once("../layout/header.php") ?>

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
                                        <span class="link-active font-weight-bold" style="color:<?= $color ?>;">รายการขายของฉัน</span>
                                        <span style="float:right;">
                                            <i class="fas fa-bookmark"></i>
                                            <a class="link-path" href="../dashboard/dashboard.php">หน้าแรก</a>
                                            <span> > รายการขายของฉัน</span>
                                            <!-- <a class="link-path link-active" href="#" style="padding-top:20px;color:#006664">รายการคำสั่งซื้อ</a> -->
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold d-flex justify-content-start" style="color: #006664;">รายการขายของฉัน</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">หมายเลข<br>คำสั่งซื้อ</th>
                                            <th style="text-align: center;">ชื่อ-นามสกุล</th>
                                            <th style="text-align: center;">จำนวน</th>
                                            <th style="text-align: center;">ยอดรวม</th>
                                            <th style="text-align: center;">วัน-เวลาสั่งซื้อ</th>
                                            <th style="text-align: center;">วัน-เวลาจัดส่ง</th>
                                            <th style="text-align: center;">ประเภทการจัดส่ง</th>
                                            <th style="width: 18%; text-align: center;">เลขพัสดุ</th>
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
                                            $status_order = $ORDER["order"]["status_order"]["status"];

                                            $sql_order_id = "SELECT `order_id` FROM `orders` WHERE `orders`.`order_number` = '" . $ordernumber . "' ";
                                            $orderId = selectDataOne($sql_order_id)["order_id"];
                                            if ($status_order == "กำลังจัดส่ง") {
                                                $time_delivery = $ORDER["order"]["status_order"]["delivery"]["time_delivery"];
                                                $delivery_name = $ORDER["order"]["status_order"]["delivery"]["transport"];
                                                $tracking_code = $ORDER["order"]["status_order"]["delivery"]["track"];
                                        ?>
                                                <tr>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $ordernumber ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $firstname . " " . $lastname ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $total_unit ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo number_format($total_price, 2) ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo date("Y-m-d H:i:s", $time_order) ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo date("Y-m-d H:i:s", $time_delivery)  ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $delivery_name ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $tracking_code ?></td>
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
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?php
            include_once("../layout/footer.php");
            // include_once("productModal.php");

            ?>
            <!-- <script type="text/javascript" src="product.js"></script> -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->



</body>

</html>