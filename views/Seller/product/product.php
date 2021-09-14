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

$PRODUCT = getProductByShopID($uid);
print_r($PRODUCT);
$PRODUCT = getProductByShopID($uid);
print_r($PRODUCT);
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
                                        <span class="link-active font-weight-bold" style="color:<?= $color ?>;">รายการสินค้า</span>
                                        <span style="float:right;">
                                            <i class="fas fa-bookmark"></i>
                                            <a class="link-path" href="../dashboard/dashboard.php">หน้าแรก</a>
                                            <span> > รายการสินค้า</span>
                                            <!-- <a class="link-path link-active" href="#" style="padding-top:20px;color:#006664">รายการสินค้า</a> -->
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- <h6 class="m-0 font-weight-bold text-primary">รายการสินค้า</h6> -->
                            <div class="form-row ">
                                <div class="col-md-10 d-flex align-items-center">
                                    <h6 class="m-0 font-weight-bold d-flex justify-content-start" style="color: #006664;">รายการสินค้า</h6>
                                </div>
                                <div class="col-md-2 d-flex align-items-center align-self-center d-flex justify-content-end">
                                    <button class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i>&nbsp&nbsp เพิ่มรายการสินค้า</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableProduct" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">รูปสินค้า</th>
                                            <th style="text-align: center;">รหัสสินค้า</th>
                                            <th style="text-align: center;">ชื่อสินค้า</th>
                                            <th style="text-align: center;">ประเภทสินค้า</th>
                                            <th style="text-align: center;">ราคาสินค้า (บาท)</th>
                                            <th style="text-align: center;">ค่าจัดส่งสินค้า (บาท)</th>
                                            <th style="text-align: center;">สินค้าคงคลัง (ชิ้น)</th>
                                            <th style="text-align: center;">ยอดขาย (ชิ้น)</th>
                                            <th style="text-align: center;">ยอดขายต่อ 1 สัปดาห์ (ชิ้น)</th>
                                            <th style="width: 15%; text-align: center;">จัดการ</th>
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
                                        <?php
                                        for ($i = 1; $i < count($PRODUCT); $i++) {
                                        ?>
                                            <tr>
                                                <td class="d-flex align-items-center d-flex justify-content-center"><img src="<?php echo "../../../img/product/profile/" . $PRODUCT[$i]["profile_product"] ?>" class="img-circle" width="60" height="60"></td>
                                                <td style="vertical-align: middle;"><?php echo $PRODUCT[$i]["product_number"] ?></td>
                                                <td style="vertical-align: middle;"><?php echo $PRODUCT[$i]["product_name"] ?></td>
                                                <td style="vertical-align: middle;"><?php echo $PRODUCT[$i]["type"] ?></td>
                                                <td style="vertical-align: middle; text-align: end;"><?php echo number_format($PRODUCT[$i]["price"], 2) ?></td>
                                                <td style="vertical-align: middle; text-align: end;"><?php echo number_format($PRODUCT[$i]["shipping_cost"], 2) ?></td>
                                                <td style="vertical-align: middle; text-align: end;"><?php echo number_format($PRODUCT[$i]["stock"]) ?></td>
                                                <td style="vertical-align: middle; text-align: end;">458</td>
                                                <td style="vertical-align: middle; text-align: end;">420</td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <button type="button" id="btm_qrcode" class="btn btn-primary btn-md" title='ดู qr-code สินค้า' data-toggle="modal" data-target="#showQRcodeModal">
                                                        <i class="fas fa-bars"></i>
                                                    </button>
                                                    <button type="button" id="btn_info" class="btn btn-warning btn-md" title='แก้ไขข้อมูลสินค้า' data-toggle="modal" data-target="#editModal">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button type="button" id="btn_pass" class="btn btn-danger btn-md" title='ลบสินค้า' onclick="delfunction('<?php echo $PRODUCT[$i]['product_id'] ?>',
                                                                                                                                                            '<?php echo $PRODUCT[$i]['product_number'] ?>',
                                                                                                                                                            '<?php echo $PRODUCT[$i]['product_name'] ?>')">
                                                        <i class="fas fa-trash"></i>
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
            include_once("productModal.php");
            ?>
            <script type="text/javascript" src="product.js"></script>
            <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->



</body>

</html>