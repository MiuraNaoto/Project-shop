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

$CurrentMenu = "delivery";
// $ORDER_CONFIRM = getOrderConfirm();
// print_r($ORDER_CONFIRM);

$files = scandir("../../../data");
$count_file = (int) (count($files));
$scan_dir = array_diff(scandir("../../../data/"), array('..', '.'));
?>

<head>
    <?php
    include_once("../layout/header.php");
    // include_once("./exportPDF.php")
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
                                        <span class="link-active font-weight-bold" style="color:<?= $color ?>;">การจัดส่งสินค้า</span>
                                        <span style="float:right;">
                                            <i class="fas fa-bookmark"></i>
                                            <a class="link-path" href="../dashboard/dashboard.php">หน้าแรก</a>
                                            <span> > การจัดส่งสินค้า</span>
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
                            <h6 class="m-0 font-weight-bold d-flex justify-content-start" style="color: #006664;">การจัดส่งสินค้า</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-xl-3 col-12">
                                    <button type="button" id="btn_excel" class="btn btn-outline-success btn-sm"><i class="fas fa-file-excel"></i> Excel</button>
                                    <a href="./exportPDF.php"><button type="button" id="btn_comfirm" class="btn btn-outline-danger btn-sm"><i class="fas fa-file-pdf"></i> PDF</button></a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">หมายเลข<br>คำสั่งซื้อ</th>
                                            <th style="text-align: center;">ชื่อ-นามสกุล</th>
                                            <th style="text-align: center;">จำนวน</th>
                                            <th style="text-align: center;">ยอดรวม</th>
                                            <th style="text-align: center;">วัน-เวลาสั่งซื้อ</th>
                                            <th style="width: 18%; text-align: center;">เพิ่มเลขพัสดุ</th>
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
                                            if ($status_order == "ยืนยันการชำระ") {
                                        ?>
                                                <tr>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $ordernumber ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $firstname . " " . $lastname ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo $total_unit ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo number_format($total_price, 2) ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo date("Y-m-d H:i:s", $time_order) ?></td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        <button type="button" id="show" onclick="delivery('<?php echo $orderId ?>', '<?php echo $ordernumber ?>')" class="btn btn-warning btn-md" title='เพิ่มเลขพัสดุ' data-toggle="modal" data-target="#transportModal">
                                                            <i class="fas fa-plus"></i>
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
                        </div>
                    </div>
                </div>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?php
            include_once("../layout/footer.php");
            include_once("deliveryModal.php");
            ?>

            <script src="delivery.js"></script>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

</body>

</html>