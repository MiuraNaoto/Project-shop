<!DOCTYPE html>
<html lang="en">
<?php
include_once("../../../query/query.php");
include_once("../../../query/function.php");
session_start();
$idUT = $_SESSION[md5('typeid')];
$username = $_SESSION[md5('username')];
$USER = $_SESSION[md5('user')];
$uid = $USER[1]["uid"];
$SELLER = $_SESSION[md5('shop')];
$shop_id = $SELLER[1]["shop_id"];

$CurrentMenu = "sales";

$PRODUCT = getProductByShopID($uid);
// $PRODUCT = getProductByShopID($uid);

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
                                            <th style="text-align: center;">ลำดับ</th>
                                            <th style="text-align: center;">หมายเลขคำสั่งซื้อ</th>
                                            <th style="text-align: center;">รายการสินค้า</th>
                                            <th style="text-align: center;">จำนวน</th>
                                            <th style="text-align: center;">ยอดรวม</th>
                                            <th style="text-align: center;">วันที่สั่งซื้อ</th>
                                            <th style="text-align: center;">วิธีการชำระเงิน</th>
                                            <th style="text-align: center;">สถานะการชำระ</th>
                                            <th style="width: 15%; text-align: center;">เลขพัสดุ</th>

                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                        <tr>
                                            <td class="d-flex align-items-center d-flex justify-content-center">1</td>
                                            <td style="vertical-align: middle; text-align: end;">2103254</td>
                                            <td style="vertical-align: middle; text-align: end;">ชุดอิ่มคุ้ม</td>
                                            <td style="vertical-align: middle; text-align: end;">20</td>
                                            <td style="vertical-align: middle; text-align: end;">2400.00</td>
                                            <td style="vertical-align: middle; text-align: end;">11/07/2564</td>
                                            <td style="vertical-align: middle; text-align: end;">โอนผ่านธนาคาร</td>
                                            <td style="vertical-align: middle; text-align: end;">ชำระแล้ว</td>
                                            <td style="text-align: center; vertical-align: middle;">A1270995656554</td>
                                        </tr>
                                        <tr>
                                            <td class="d-flex align-items-center d-flex justify-content-center">2</td>
                                            <td style="vertical-align: middle; text-align: end;">2103255</td>
                                            <td style="vertical-align: middle; text-align: end;">น้ำส้ม</td>
                                            <td style="vertical-align: middle; text-align: end;">5</td>
                                            <td style="vertical-align: middle; text-align: end;">75.00</td>
                                            <td style="vertical-align: middle; text-align: end;">11/07/2564</td>
                                            <td style="vertical-align: middle; text-align: end;">โอนผ่านธนาคาร</td>
                                            <td style="vertical-align: middle; text-align: end;">ชำระแล้ว</td>
                                            <td style="text-align: center; vertical-align: middle;">A1270991586425</td>
                                        </tr>
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