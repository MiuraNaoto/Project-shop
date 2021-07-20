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
                                        <span class="link-active font-weight-bold" style="color:<?= $color ?>;">คำสั่งซื้อที่รอพิจารณา</span>
                                        <span style="float:right;">
                                            <i class="fas fa-bookmark"></i>
                                            <a class="link-path" href="../dashboard/dashboard.php">หน้าแรก</a>
                                            <span> > คำสั่งซื้อที่รอพิจารณา</span>
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
                                    <h6 class="m-0 font-weight-bold d-flex justify-content-start" style="color: #006664;">คำสั่งซื้อที่รอพิจารณา </h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tap2-tab" data-toggle="tab" href="#tap1" role="tab" aria-controls="tap1" aria-selected="true">คำสั่งซื้อที่เกิดข้อผิดพลาด</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tap2-tab" data-toggle="tab" href="#tap2" role="tab" aria-controls="tap2" aria-selected="false">จัดการแล้ว</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent" style="margin-top:20px;">
                                <div class="tab-pane fade show active" id="tap1" role="tabpanel" aria-labelledby="tap1-tab">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;">ลำดับ</th>
                                                    <th style="text-align: center;">หมายเลขคำสั่งซื้อ</th>
                                                    <th style="text-align: center;">ชื่อ-นามสกุล</th>
                                                    <th style="width: 20%; text-align: center;">รายการสินค้า</th>
                                                    <th style="text-align: center;">ยอดรวม</th>
                                                    <th style="text-align: center;">เหตุผล</th>
                                                    <th style="width: 18%;  text-align: center;">การจัดการ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="vertical-align: middle; text-align: center;">1</td>
                                                    <td style="vertical-align: middle;"><?php echo rand(); ?></td>
                                                    <td style="vertical-align: middle; text-align: end;">นายมั่นหมาย หมายมั่น</td>
                                                    <td style="vertical-align: middle; text-align: end;">น้ำส้มสูตรโปบราณพึ่งคิดได้เมื่อวานแต่บอกโบราณเผื่อขายดี</td>
                                                    <td style="vertical-align: middle;">20</td>
                                                    <td style="vertical-align: middle; text-align: end;">โอนเงินไม่ครบจำนวน</td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        <button type="button" id="show" class="btn btn-primary btn-md" style="background-color: #6f42c1; border-color: #6f42c1;" title='รายละเอียดคำสั่งซื้อ' data-toggle="modal" data-target="#detailOderModal">
                                                            <i class="fas fa-bars"></i>
                                                        </button>
                                                        <!-- <button type="button" id="show" class="btn btn-primary btn-md" title='หลักฐานการโอนเงิน' data-toggle="modal" data-target="#paymentModal">
                                                            <i class="fas fa-image"></i>
                                                        </button> -->
                                                        <button type="button" id="show" class="btn btn-success btn-md" title='ยืนยันการซื้อ'>
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                        <button type="button" id="show" class="btn btn-danger btn-md" title='ติดต่อไม่ได้' data-toggle="modal" data-target="#disapprovedModal">
                                                            <i class="fas fa-ban"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tap2" role="tabpanel" aria-labelledby="tap2-tab">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;">ลำดับ</th>
                                                    <th style="text-align: center;">หมายเลขคำสั่งซื้อ</th>
                                                    <th style="text-align: center;">ชื่อ-นามสกุล</th>
                                                    <th style="width: 20%; text-align: center;">รายการสินค้า</th>
                                                    <th style="text-align: center;">ยอดรวม</th>
                                                    <th style="text-align: center;">เหตุผล</th>
                                                    <th style="width: 18%;  text-align: center;">สถานะคำสั่งซื้อ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="vertical-align: middle; text-align: center;">1</td>
                                                    <td style="vertical-align: middle;"><?php echo rand(); ?></td>
                                                    <td style="vertical-align: middle; text-align: end;">นายมั่นหมาย หมายมั่น</td>
                                                    <td style="vertical-align: middle; text-align: end;">น้ำส้มสูตรโปบราณพึ่งคิดได้เมื่อวานแต่บอกโบราณเผื่อขายดี</td>
                                                    <td style="vertical-align: middle;">20</td>
                                                    <td style="vertical-align: middle; text-align: end;">โอนเงินไม่ครบจำนวน</td>
                                                    <td style="text-align: left; vertical-align: middle;">
                                                        1. ไม่มีการตอบกลับจากลูกค้า<br>
                                                        2. ร้านจัดการสินค้าช้า
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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
            <script type="text/javascript" src="order.js"></script>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->



</body>

</html>