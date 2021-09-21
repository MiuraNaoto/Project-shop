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
                                            <th style="text-align: center;">ลำดับ</th>
                                            <th style="text-align: center;">หมายเลข<br>คำสั่งซื้อ</th>
                                            <th style="text-align: center;">ชื่อ-นามสกุล</th>
                                            <th style="text-align: center;">รายการสินค้า</th>
                                            <th style="text-align: center;">จำนวน</th>
                                            <th style="text-align: center;">ยอดรวม</th>
                                            <th style="text-align: center;">วัน-เวลาสั่งซื้อ</th>
                                            <th style="text-align: center;">สถานะการชำระ</th>
                                            <th style="width: 18%; text-align: center;">เพิ่มเลขพัสดุ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        for ($i = 1; $i < 5; $i++) {
                                        ?>
                                            <tr>
                                                <td class="d-flex align-items-center d-flex justify-content-center"><?php echo $i; ?></td>
                                                <td style="vertical-align: middle; text-align: end;"><?php echo rand() ?></td>
                                                <td style="vertical-align: middle; text-align: end;">นายก ขคง</td>
                                                <td style="vertical-align: middle; text-align: end;">ชุดอิ่มคุ้ม</td>
                                                <td style="vertical-align: middle; text-align: end;">20</td>
                                                <td style="vertical-align: middle; text-align: end;">2,400.00</td>
                                                <td style="vertical-align: middle; text-align: end;">11/07/2564 17:30:14</td>
                                                <td style="vertical-align: middle; text-align: center;">ชำระแล้ว</td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <button type="button" id="show" class="btn btn-warning btn-md" title='เพิ่มเลขพัสดุ' data-toggle="modal" data-target="#transportModal">
                                                        <i class="fas fa-plus"></i>
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
                </div>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?php
            include_once("../layout/footer.php");
            include_once("deliveryModal.php");
            ?>

            <script type="text/javascript" src="order.js"></script>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

</body>

</html>