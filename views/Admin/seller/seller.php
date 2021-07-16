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
                                        <span class="link-active font-weight-bold" style="color:<?= $color ?>;">บัญชีรายชื่อผู้ขาย</span>
                                        <span style="float:right;">
                                            <i class="fas fa-bookmark"></i>
                                            <a class="link-path" href="../dashboard/dashboard.php">หน้าแรก</a>
                                            <span> > บัญชีรายชื่อผู้ขาย</span>
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
                                    <h6 class="m-0 font-weight-bold d-flex justify-content-start" style="color: #006664;">บัญชีรายชื่อผู้ขาย</h6>
                                </div>
                                <div class="col-md-2 d-flex align-items-center align-self-center d-flex justify-content-end">
                                    <button class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i>&nbsp&nbsp เพิ่มรายการสินค้า</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">ลำดับ</th>
                                            <th style="text-align: center;">ชื่อร้าน</th>
                                            <th style="text-align: center;">ชื่อบัญชี</th>
                                            <th style="text-align: center;">ชื่อ-นามสกุล</th>
                                            <th style="text-align: center;">คะแนนความถึงพอใจ</th>
                                            <th style="text-align: center;">วันที่สมัคร</th>
                                            <th style="text-align: center;">ยอดขาย (ชิ้น)</th>
                                            <th style="text-align: center;">ยอดขายต่อ 1 สัปดาห์ (ชิ้น)</th>
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
                                        <tr>
                                            <td class="d-flex align-items-center d-flex justify-content-center">1</td>
                                            <td style="vertical-align: middle;">ขายอะไรก็ไม่รู้ แต่อยากขายนะ</td>
                                            <td style="vertical-align: middle;">a-rai-wa</td>
                                            <td style="vertical-align: middle; text-align: end;">120.00</td>
                                            <td style="vertical-align: middle; text-align: end;">45.00</td>
                                            <td style="vertical-align: middle; text-align: end;">650</td>
                                            <td style="vertical-align: middle; text-align: end;">458</td>
                                            <td style="vertical-align: middle; text-align: end;">420</td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                <button type="button" id="btm_qrcode" class="btn btn-primary btn-md" title='ดู qr-code สินค้า' data-toggle="modal" data-target="#showQRcodeModal">
                                                    <i class="fas fa-bars"></i>
                                                </button>
                                                <button type="button" id="btn_info" class="btn btn-warning btn-md" title='แก้ไขข้อมูลสินค้า' data-toggle="modal" data-target="#editModal">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" id="btn_pass" class="btn btn-danger btn-md" title='ลบสินค้า' onclick="delfunction('1','ชุดสุดคุ้ม','อาหาร','ราคา','จำนวน')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
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
            <script type="text/javascript" src="product.js"></script>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->



</body>

</html>