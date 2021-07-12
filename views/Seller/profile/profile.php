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
                            <div class="card">
                                <div class="card-header card-bg">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="link-active font-weight-bold" style="color:<?= $color ?>;">บัญชีผู้ใช้</span>
                                            <span style="float:right;">
                                                <i class="fas fa-bookmark"></i>
                                                <a class="link-path" href="../dashboard/dashboard.php">หน้าแรก</a>
                                                <span> > บัญชีผู้ใช้</span>
                                                <!-- <a class="link-path link-active" href="#" style="color:<?= $color ?>;">บัญชีผู้ใช้</a> -->
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-12 mb-4">
                            <div class="row">
                                <div class="col-xl-12 col-12">
                                    <div class="card">
                                        <div class="card-header card-bg font-weight-bold" style="color:<?= $color ?>;">
                                            รูปโปรไฟล์
                                        </div>
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-center d-flex align-items-center">
                                                <img class="img-radius img-profile" src="../../../img/profile/vendor.png" width="350px" height="350px">
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-xl-12 col-12">
                                                    <center>
                                                        <button type="button" id="edit_photo" class="btn btn-primary btn-md" title='เปลี่ยนรูปโปรไฟล์'>
                                                            <i class="fas fa-image"></i>
                                                        </button>
                                                        <button type="button" id="btn_info" class="btn btn-warning btn-md" title='เปลี่ยนข้อมูลบัญชี' data-toggle="modal" data-target="#editModal">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" id="btn_pass" class="btn btn-success btn-md pass_edit" title='เปลี่ยนรหัสผ่าน' data-toggle="modal" data-target="#editPassModal">
                                                            <i class="fa fa-cog"></i>
                                                        </button>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-12 mb-4">
                            <div class="card">
                                <div class="card-header card-bg font-weight-bold" style="color:<?= $color ?>;">
                                    รายละเอียดบัญชี
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                            <span>ชื่อร้านค้า :</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="title" value="ขายอะไรก็ไม่รู้ แต่อยากขายนะ" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                            <span>คำนำหน้า :</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="firstname" value="นาย" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                            <span>ชื่อ :</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="firstname" value="มั่นหมาย" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                            <span>นามสกุล :</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="firstname" value="หมายมั่น" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                            <span>เบอร์โทร :</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="firstname" value="098-765-4321" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                            <span>อีเมล์ :</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="mail" value="awaiwa@gmail.com" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                            <span>ชื่อบัญชี : </span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="username" value="a-rai-wa" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                            <span>ที่อยู่ :</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="mail" value="123 หมู่บ้านปลาฉลามขึ้นบก ซอย 456 ต.กำแพงแสน อ.กำแพงแสน จ.นครปฐม 73140" disabled>
                                        </div>
                                    </div>
                                    <!-- <div class="row mb-4">
                                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                            <span>ตำบล/แขวง :</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="mail" value="กำแพงแสน" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                            <span>อำเภอ/เขต :</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="mail" value="กำแพงแสน" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                            <span>จังหวัด :</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="mail" value="นครปฐม" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                            <span>รหัสไปรษณีย์ :</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="mail" value="73140" disabled>
                                        </div>
                                    </div> -->
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                            <span>จำนวนพนักงงาน : </span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="number" class="form-control" id="staff" value="5" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right">
                                            <span>พนักงานประจำของร้านค้า</span>
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="admin" name="admin" value="option1" disabled checked>
                                                <label class="form-check-label" for="inlineCheckbox1">มีพนักงานประจำ (Full Time)</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="admin" name="admin" value="option1" disabled>
                                                <label class="form-check-label" for="inlineCheckbox1">ไม่มีพนักงานขายประจำ</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="research" name="research" value="option2" disabled>
                                                <label class="form-check-label" for="inlineCheckbox2">มีพนักงงานชั่วคราว (Part Time)</label>
                                            </div>
                                        </div>
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
            include_once("profileModal.php");
            ?>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

</body>

</html>