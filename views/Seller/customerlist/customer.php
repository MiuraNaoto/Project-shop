<?php
include_once("../../../query/query.php");
include_once("../../../query/function.php");
session_start();
$USER = $_SESSION[md5('user')];
$uid = $USER[1]["uid"];
$idUT = $_SESSION[md5('typeid')];
$USER = getUser($uid);
$ADDRESS_USER = getAddressUser($uid);
$PROVINCE = getDistricts();
$CurrentMenu = "customerlist";
?>


<!DOCTYPE html>
<html lang="en">

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
                                        <span class="link-active font-weight-bold" style="color:<?= $color ?>;">บัญชีรายชื่อลูกค้า</span>
                                        <span style="float:right;">
                                            <i class="fas fa-bookmark"></i>
                                            <a class="link-path" href="../dashboard/dashboard.php">หน้าแรก</a>
                                            <span> > บัญชีรายชื่อลูกค้า</span>
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
                                    <h6 class="m-0 font-weight-bold d-flex justify-content-start" style="color: #006664;">บัญชีรายชื่อลูกค้า</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">ลำดับ</th>
                                            <th style="text-align: center;">ชื่อ-นามสกุล</th>
                                            <th style="text-align: center;">เบอร์โทรศัพท์</th>
                                            <th style="text-align: center;">ชื่อบัญชี</th>
                                            <th style="text-align: center;">ที่อยู่</th>
                                            <th style="text-align: center;">วันที่สมัคร</th>
                                            <th style="text-align: center;">จัดการ</th>
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

                                        $u = getAllUser();

                                        // print_r($u);
                                        for ($i = 1; $i <= $u[0]['numrow']; $i++) {

                                        ?>
                                            <tr>
                                                <td class="d-flex align-items-center d-flex justify-content-center"><?php echo $i ?></td>
                                                <td style="vertical-align: middle; text-align: end;"><?php echo $u[$i]['firstname'] . ' ' . $u[$i]['lastname'] ?></td>
                                                <td style="vertical-align: middle; text-align: end;"><?php echo format_phonenumber($u[$i]['tel']) ?></td>
                                                <td style="vertical-align: middle;"><?php echo $u[$i]['username'] ?></td>
                                                <td style="vertical-align: middle; text-align: center;">
                                                    <button type="button" id="<?php echo $u[$i]['uid'] ?>" class="btn btn-info btn-md btn_province" title='ดูที่อยู่จัดส่ง' data-toggle="modal" data-target="#addressModal">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </td>
                                                <td style="vertical-align: middle; text-align: end;"><?php echo date("d-m-Y H:i:s", $u[$i]['modify_user']); ?></td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <!-- <button type="button" id="btm_qrcode" class="btn btn-primary btn-md" title='ดู qr-code สินค้า' data-toggle="modal" data-target="#showQRcodeModal">
                                                    <i class="fas fa-bars"></i>
                                                </button> -->
                                                    <!-- <button type="button" id="btn_info" class="btn btn-warning btn-md" title='แก้ไขข้อมูลผู้ใช้' data-toggle="modal" data-target="#editModal">
                                                    <i class="fas fa-edit"></i>
                                                </button> -->
                                                    <button type="button" id="btn_pass" class="btn btn-danger btn-md" title='บล็อคผู้ใช้' style="background-color: #e67e22; border-color: #e67e22;" onclick="banfunction('<?php echo $i ?>','<?php echo $u[$i]['shop_name'] ?>','<?php echo $u[$i]['firstname'] . ' ' . $u[$i]['lastname'] ?>',
                                                    '<?php echo $u[$i]['username'] ?>','65')">
                                                        <i class="fas fa-ban"></i>
                                                    </button>
                                                    <button type="button" id="btn_pass" class="btn btn-danger btn-md" title='ลบผู้ใช้' onclick="delfunction('<?php echo $i ?>','<?php echo $u[$i]['shop_name'] ?>','<?php echo $u[$i]['firstname'] . ' ' . $u[$i]['lastname'] ?>',
                                                    '<?php echo $u[$i]['username'] ?>','65')">
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
            include_once("customerModal.php");

            ?>
            <script type="text/javascript" src="customer.js"></script>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->



</body>

</html>