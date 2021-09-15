<!DOCTYPE html>
<html lang="en">

<?php
include_once("./query.php");
include_once("../../../query/query.php");
include_once("../../../query/function.php");
session_start();
$USER = $_SESSION[md5('user')];
$uid = $USER[1]["uid"];
$USER = getUser($uid);
$ADDRESS_USER = getAddressUser($uid);
$PROVINCE = getDistricts();
$sellerList = getAllSaler();
//echo json_encode($sellerList);
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
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">ลำดับ</th>
                                            <th style="text-align: center;">ชื่อร้าน</th>
                                            <th style="text-align: center;">ชื่อ-นามสกุล</th>
                                            <th style="text-align: center;">เบอร์โทรศัพท์</th>
                                            <th style="text-align: center;">ชื่อบัญชี</th>
                                            <th style="text-align: center;">คะแนนความถึงพอใจ</th>
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

                                        <!--
                                            <td class="d-flex align-items-center d-flex justify-content-center">1</td>
                                            <td style="vertical-align: middle;">ขายอะไรก็ไม่รู้ แต่อยากขายนะ</td>
                                            <td style="vertical-align: middle; text-align: end;">นายมั่นหมาย หมายมั่น</td>
                                            <td style="vertical-align: middle; text-align: end;">098-765-4321</td>
                                            <td style="vertical-align: middle;">a-rai-wa</td>
                                            <td style="vertical-align: middle; text-align: end;">65</td>
                                            <td style="vertical-align: middle; text-align: end;">11/07/2564 17:30:14</td>
                                            <td style="text-align: center; vertical-align: middle;">
                                            -->
                                        <!-- <a href="../comment-seller/comment-seller.php">
                                                    <button type="button" id="btn_comment" class="btn btn-primary btn-md" title="ดูคอมเม้นของร้านค้า">
                                                        <i class="fas fa-comment-dots"></i>
                                                    </button>
                                                </a> -->
                                        <!-- <button type="button" id="btn_info" class="btn btn-warning btn-md" title='แก้ไขข้อมูลผู้ใช้' data-toggle="modal" data-target="#editModal">
                                                    <i class="fas fa-edit"></i>
                                                </button> -->
                                        <?php
                                        for ($i = 1; $i < count($sellerList); $i++) {
                                            echo
                                            '<tr>
                                                <td class="d-flex align-items-center d-flex justify-content-center">' . $i . '</td>
                                                <td style="vertical-align: middle;">' . $sellerList[$i]['shop_name'] . '</td>
                                                <td style="vertical-align: middle; text-align: end;">' . $sellerList[$i]['firstname'] . ' ' . $sellerList[$i]['lastname'] . '</td>
                                                <td style="vertical-align: middle; text-align: end;">' . format_phonenumber($sellerList[$i]['tel']) . '</td>
                                                <td style="vertical-align: middle;">' . $sellerList[$i]['username'] . '</td>
                                                <td style="vertical-align: middle; text-align: end;"> - </td>
                                                <td style="vertical-align: middle; text-align: end;">' . date("d/m/Y h:i:s A", $sellerList[$i]['modify_saler']) . '</td>
                                                <td style="text-align: center; vertical-align: middle;">';
                                        ?>

                                            <?php
                                            if ($sellerList[$i]['is-blocked-saler'] == 0) {
                                                echo
                                                ' <button type="button" class="btn btn-danger btn-md openBlockModel" title="บล็อคผู้ใช้" style="background-color: #e67e22; border-color: #e67e22;" data-toggle="modal" data-target="#blockSaler" data-sid="' . $sellerList[$i]['uid'] . '" data-name="' . $sellerList[$i]['firstname'] . ' ' . $sellerList[$i]['lastname'] . '" >
                                                    <i class="fas fa-ban"></i>
                                                    </button>';
                                            } else {
                                                echo
                                                ' <button type="button" class="btn btn-warning btn-md openBlockModel" title="ปลดบล็อคผู้ใช้" style="background-color:yellowgreen; border-color: yellowgreen;" data-toggle="modal" data-target="#unblockSaler" data-sid="' . $sellerList[$i]['uid'] . '" data-name="' . $sellerList[$i]['firstname'] . ' ' . $sellerList[$i]['lastname'] . '" >
                                                    <i class="fas fa-unlock"></i></i>
                                                    </button>';
                                            }


                                            echo '<button type="button" id="delS" class="btn btn-danger btn-md" title="ลบผู้ใช้" data-toggle="modal" data-target="#delSaler" data-sid="' . $sellerList[$i]['uid'] . '" data-name="' . $sellerList[$i]['firstname'] . ' ' . $sellerList[$i]['lastname'] . '">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                            </tr>';
                                            ?>
                                        <?php } ?>

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
            include_once("sellerModal.php");

            ?>
            <script type="text/javascript" src="seller.js"></script>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    <script>
        $('#blockSaler').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('sid') // Extract info from data-* attributes
            var name = button.data('name')
            //var obj = JSON.parse(json);
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-body b').text(name)
            //modal.find('.modal-body ps').text('Do you want to block saler name...'+ name)
            modal.find('.modal-body input').val(id)
            //modal.find('.modal-body input').val(recipient)
        })

        $('#unblockSaler').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('sid') // Extract info from data-* attributes
            var name = button.data('name')
            //var obj = JSON.parse(json);
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-body b').text(name)
            //modal.find('.modal-body ps').text('Do you want to block saler name...'+ name)
            modal.find('.modal-body input').val(id)
            //modal.find('.modal-body input').val(recipient)
        })

        $('#delSaler').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('sid') // Extract info from data-* attributes
            var name = button.data('name')
            //var obj = JSON.parse(json);
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-body b').text(name)
            //modal.find('.modal-body ps').text('Do you want to delete saler name...'+ name)
            modal.find('.modal-body input').val(id)
            //modal.find('.modal-body input').val(recipient)
        })
    </script>


</body>

</html>