<!DOCTYPE html>
<html lang="en">

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
                                <div class="tab-pane fade show active" id="tap1" role="tabpanel" aria-labelledby="tap1-tab">
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
                                                <th style="width: 9%; text-align: center;">วิธีการ<br>ชำระเงิน</th>
                                                <th style="text-align: center;">สถานะการชำระ</th>
                                                <th style="width: 18%; text-align: center;">จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            for ($i = 1; $i < 101; $i++) {
                                            ?>
                                                <tr>
                                                    <td style="vertical-align: middle; text-align: center;"><?php echo $i; ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo rand() ?></td>
                                                    <td style="vertical-align: middle; text-align: end;">นายก ขคง</td>
                                                    <td style="vertical-align: middle; text-align: end;">ชุดอิ่มคุ้ม</td>
                                                    <td style="vertical-align: middle; text-align: end;">20</td>
                                                    <td style="vertical-align: middle; text-align: end;">2,400.00</td>
                                                    <td style="vertical-align: middle; text-align: end;">11/07/2564 17:30:14</td>
                                                    <td style="vertical-align: middle; text-align: end;">โอนผ่านธนาคาร</td>
                                                    <td style="vertical-align: middle; text-align: center;">กำลังตรวจสอบ</td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        <button type="button" id="show" class="btn btn-primary btn-md" style="background-color: #6f42c1; border-color: #6f42c1;" title='รายละเอียดคำสั่งซื้อ' data-toggle="modal" data-target="#detailOderModal">
                                                            <i class="fas fa-bars"></i>
                                                        </button>
                                                        <button type="button" id="show" class="btn btn-primary btn-md" title='หลักฐานการโอนเงิน' data-toggle="modal" data-target="#paymentModal">
                                                            <i class="fas fa-image"></i>
                                                        </button>
                                                        <button type="button" id="show" class="btn btn-success btn-md" title='ยืนยันการซื้อ'>
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                        <button type="button" id="show" class="btn btn-danger btn-md" title='ไม่ยืนยันการซื้อ' data-toggle="modal" data-target="#disapprovedModal">
                                                            <i class="fas fa-ban"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="tap2" role="tabpanel" aria-labelledby="tap2-tab">
                                    <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">ลำดับ</th>
                                                <th style="text-align: center;">หมายเลข<br>คำสั่งซื้อ</th>
                                                <th style="text-align: center;">ชื่อ-นามสกุล</th>
                                                <th style="text-align: center;">รายการสินค้า</th>
                                                <th style="text-align: center;">จำนวน</th>
                                                <th style="text-align: center;">ยอดรวม</th>
                                                <th style="text-align: center;">วัน-เวลาสั่งซื้อ</th>
                                                <!-- <th style="width: 9%; text-align: center;">วิธีการ<br>ชำระเงิน</th> -->
                                                <th style="width: 18%; text-align: center;">เหตุผล</th>
                                                <th style="width: 18%; text-align: center;">จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            for ($i = 1; $i < 5; $i++) {
                                            ?>
                                                <tr>
                                                    <td style="vertical-align: middle; text-align: center;"><?php echo $i; ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo rand() ?></td>
                                                    <td style="vertical-align: middle; text-align: end;">นายก ขคง</td>
                                                    <td style="vertical-align: middle; text-align: end;">ชุดอิ่มคุ้ม</td>
                                                    <td style="vertical-align: middle; text-align: end;">20</td>
                                                    <td style="vertical-align: middle; text-align: end;">2,400.00</td>
                                                    <td style="vertical-align: middle; text-align: end;">11/07/2564 17:30:14</td>
                                                    <!-- <td style="vertical-align: middle; text-align: end;">โอนผ่านธนาคาร</td> -->
                                                    <td style="width: 12%; vertical-align: middle; text-align: center;">โอนเงินไม่ครบจำนวน</td>
                                                    <td style="width: 15%;  text-align: center; vertical-align: middle;">
                                                        <button type="button" id="show" class="btn btn-primary btn-md" style="background-color: #6f42c1; border-color: #6f42c1;" title='รายละเอียดคำสั่งซื้อ' data-toggle="modal" data-target="#detailOderModal">
                                                            <i class="fas fa-bars"></i>
                                                        </button>
                                                        <button type="button" id="show" class="btn btn-primary btn-md" title='หลักฐานการโอนเงิน' data-toggle="modal" data-target="#paymentModal">
                                                            <i class="fas fa-image"></i>
                                                        </button>
                                                        <button type="button" id="show" class="btn btn-success btn-md" title='ยืนยันการซื้อ'>
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                        <button type="button" id="show" class="btn btn-danger btn-md" title='ยกเลิกคำสั่งซื้อ' onclick="cancelfunction('1810089695	','ชุดสุดคุ้ม','อาหาร','ราคา','จำนวน')">
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

                                <div class="tab-pane fade" id="tap3" role="tabpanel" aria-labelledby="tap3-tab">
                                    <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">ลำดับ</th>
                                                <th style="text-align: center;">หมายเลข<br>คำสั่งซื้อ</th>
                                                <th style="text-align: center;">ชื่อ-นามสกุล</th>
                                                <th style="text-align: center;">รายการสินค้า</th>
                                                <th style="text-align: center;">จำนวน</th>
                                                <th style="text-align: center;">ยอดรวม</th>
                                                <th style="text-align: center;">วัน-เวลาสั่งซื้อ</th>
                                                <!-- <th style="width: 9%; text-align: center;">วิธีการ<br>ชำระเงิน</th> -->
                                                <th style="width: 18%; text-align: center;">เหตุผล</th>
                                                <th style="width: 18%; text-align: center;">จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            for ($i = 1; $i < 5; $i++) {
                                            ?>
                                                <tr>
                                                    <td style="vertical-align: middle; text-align: center;"><?php echo $i; ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo rand() ?></td>
                                                    <td style="vertical-align: middle; text-align: end;">นายก ขคง</td>
                                                    <td style="vertical-align: middle; text-align: end;">ชุดอิ่มคุ้ม</td>
                                                    <td style="vertical-align: middle; text-align: end;">20</td>
                                                    <td style="vertical-align: middle; text-align: end;">2,400.00</td>
                                                    <td style="vertical-align: middle; text-align: end;">11/07/2564 17:30:14</td>
                                                    <!-- <td style="vertical-align: middle; text-align: end;">โอนผ่านธนาคาร</td> -->
                                                    <td style="width: 12%; vertical-align: middle; text-align: center;">โอนเงินไม่ครบจำนวน</td>
                                                    <td style="width: 15%;  text-align: center; vertical-align: middle;">
                                                        <button type="button" id="show" class="btn btn-primary btn-md" style="background-color: #6f42c1; border-color: #6f42c1;" title='รายละเอียดคำสั่งซื้อ' data-toggle="modal" data-target="#detailOderModal">
                                                            <i class="fas fa-bars"></i>
                                                        </button>
                                                        <button type="button" id="show" class="btn btn-primary btn-md" title='หลักฐานการโอนเงิน' data-toggle="modal" data-target="#paymentModal">
                                                            <i class="fas fa-image"></i>
                                                        </button>
                                                        <button type="button" id="show" class="btn btn-success btn-md" title='ยืนยันการซื้อ'>
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

                                <div class="tab-pane fade" id="tap4" role="tabpanel" aria-labelledby="tap4-tab">
                                    <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">ลำดับ</th>
                                                <th style="text-align: center;">หมายเลข<br>คำสั่งซื้อ</th>
                                                <th style="text-align: center;">ชื่อ-นามสกุล</th>
                                                <th style="text-align: center;">รายการสินค้า</th>
                                                <th style="text-align: center;">จำนวน</th>
                                                <th style="text-align: center;">ยอดรวม</th>
                                                <th style="text-align: center;">วัน-เวลาสั่งซื้อ</th>
                                                <!-- <th style="width: 9%; text-align: center;">วิธีการ<br>ชำระเงิน</th> -->
                                                <th style="width: 18%; text-align: center;">เหตุผล</th>
                                                <th style="width: 18%; text-align: center;">จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            for ($i = 1; $i < 5; $i++) {
                                            ?>
                                                <tr>
                                                    <td style="vertical-align: middle; text-align: center;"><?php echo $i; ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo rand() ?></td>
                                                    <td style="vertical-align: middle; text-align: end;">นายก ขคง</td>
                                                    <td style="vertical-align: middle; text-align: end;">ชุดอิ่มคุ้ม</td>
                                                    <td style="vertical-align: middle; text-align: end;">20</td>
                                                    <td style="vertical-align: middle; text-align: end;">2,400.00</td>
                                                    <td style="vertical-align: middle; text-align: end;">11/07/2564 17:30:14</td>
                                                    <!-- <td style="vertical-align: middle; text-align: end;">โอนผ่านธนาคาร</td> -->
                                                    <td style="width: 12%; vertical-align: middle; text-align: center;">โอนเงินไม่ครบจำนวน</td>
                                                    <td style="width: 15%;  text-align: center; vertical-align: middle;">
                                                        <button type="button" id="show" class="btn btn-warning btn-md" title='เพิ่มหลักฐานการโอน' data-toggle="modal" data-target="#AddbillOderModal">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                        <button type="button" id="show" class="btn btn-primary btn-md" style="background-color: #6f42c1; border-color: #6f42c1;" title='รายละเอียดคำสั่งซื้อ' data-toggle="modal" data-target="#detailOderModal">
                                                            <i class="fas fa-bars"></i>
                                                        </button>
                                                        <button type="button" id="show" class="btn btn-primary btn-md" title='หลักฐานการโอนเงิน' data-toggle="modal" data-target="#paymentModal">
                                                            <i class="fas fa-image"></i>
                                                        </button>
                                                        <button type="button" id="show" class="btn btn-success btn-md" title='ยืนยันการซื้อ'>
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

                                <div class="tab-pane fade" id="tap5" role="tabpanel" aria-labelledby="tap5-tab">
                                    <table class="table table-bordered" id="dataTable4" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">ลำดับ</th>
                                                <th style="text-align: center;">หมายเลข<br>คำสั่งซื้อ</th>
                                                <th style="text-align: center;">ชื่อ-นามสกุล</th>
                                                <th style="text-align: center;">รายการสินค้า</th>
                                                <th style="text-align: center;">จำนวน</th>
                                                <th style="text-align: center;">ยอดรวม</th>
                                                <th style="text-align: center;">วัน-เวลาสั่งซื้อ</th>
                                                <!-- <th style="width: 9%; text-align: center;">วิธีการ<br>ชำระเงิน</th> -->
                                                <th style="width: 18%; text-align: center;">เหตุผล</th>
                                                <th style="width: 18%; text-align: center;">สถานะการคืนเงิน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            for ($i = 1; $i < 5; $i++) {
                                            ?>
                                                <tr>
                                                    <td style="vertical-align: middle; text-align: center;"><?php echo $i; ?></td>
                                                    <td style="vertical-align: middle; text-align: end;"><?php echo rand() ?></td>
                                                    <td style="vertical-align: middle; text-align: end;">นายก ขคง</td>
                                                    <td style="vertical-align: middle; text-align: end;">ชุดอิ่มคุ้ม</td>
                                                    <td style="vertical-align: middle; text-align: end;">20</td>
                                                    <td style="vertical-align: middle; text-align: end;">2,400.00</td>
                                                    <td style="vertical-align: middle; text-align: end;">11/07/2564 17:30:14</td>
                                                    <!-- <td style="vertical-align: middle; text-align: end;">โอนผ่านธนาคาร</td> -->
                                                    <td style="width: 12%; vertical-align: middle; text-align: center;">โอนเงินไม่ครบจำนวน</td>
                                                    <td style="width: 15%;  text-align: center; vertical-align: middle;">
                                                        คืนเงินแล้ว
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

            <script type="text/javascript" src="order.js"></script>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

</body>

</html>