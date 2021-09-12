<?php
include_once("../../../query/query.php");
include_once("../../../query/function.php");
session_start();
// $idUT = $_SESSION[md5('typeid')];
// $username = $_SESSION[md5('username')];
$USER = $_SESSION[md5('user')];
$uid = $USER[1]["uid"];
echo $USER[1]["profile_shop"];
print_r($USER);
$INFO_SALER = getsalerInfo($uid);
$BANK_ACCOUNT = getBankAccount($uid);
echo print_r($BANK_ACCOUNT);
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
                                        <div class="card-header card-bg font-weight-bold" style="color: #006664;">
                                            รูปโปรไฟล์
                                        </div>
                                        <div class="card-body align-self-center mt-6" style="height: 458.26px; padding-top: 30px;">
                                            <div class="row d-flex justify-content-center d-flex align-items-center mt-3 mb-4">
                                                <img class="img-radius img-profile" src='<?php echo "../../../img/profile/saler/" . $USER[1]["profile_shop"] ?>' width="300px" height="300px">
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-xl-12 col-12">
                                                    <center>

                                                        <button type="button" id="edit_photo" class="btn btn-primary btn-md" title='เปลี่ยนรูปโปรไฟล์'>
                                                            <i class="fas fa-image"></i>
                                                        </button>
                                                        <button type="button" id="btn_info" class="btn btn-warning btn-md" title='เปลี่ยนข้อมูลบัญชี' data-toggle="modal" data-target="#editModal">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" id="btn_pass" class="btn btn-secondary btn-md pass_edit" title='เปลี่ยนรหัสผ่าน' data-toggle="modal" data-target="#editPassModal">
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
                                <div class="card-header card-bg font-weight-bold" style="color: #006664;">
                                    รายละเอียดบัญชี
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                            <span>ชื่อร้านค้า :</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="title" value="<?php echo $INFO_SALER[1]["shop_name"] ?>" disabled>
                                        </div>
                                    </div>
                                    <!-- <div class="row mb-3">
                                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                            <span>คำนำหน้า :</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="firstname" value="นาย" disabled>
                                        </div>
                                    </div> -->
                                    <div class="row mb-3">
                                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                            <span>ชื่อ-นามสกุล :</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="firstname" value="<?php echo $INFO_SALER[1]["title"] . $INFO_SALER[1]["firstname"] . " " . $INFO_SALER[1]["lastname"] ?>" disabled>
                                        </div>
                                    </div>
                                    <!-- <div class="row mb-3">
                                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                            <span>นามสกุล :</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="firstname" value="หมายมั่น" disabled>
                                        </div>
                                    </div> -->
                                    <div class="row mb-3">
                                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                            <span>เบอร์โทร :</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="firstname" value="<?php echo format_phonenumber($INFO_SALER[1]["tel"]) ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                            <span>ที่อยู่ :</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="mail" value="<?Php
                                                                                                        if ($INFO_SALER[1]["provinces_name_in_thai"] == "กรุงเทพมหานคร") {
                                                                                                            echo "เลขที่ " . $INFO_SALER[1]["address_shop"] .
                                                                                                                " แขวง" . $INFO_SALER[1]["subdistricts_name_in_thai"] .
                                                                                                                " " . $INFO_SALER[1]["districts_name_in_thai"] .
                                                                                                                " " . $INFO_SALER[1]["provinces_name_in_thai"] .
                                                                                                                ", " . $INFO_SALER[1]["zip_code"];
                                                                                                        } else {
                                                                                                            echo "เลขที่" . $INFO_SALER[1]["address_shop"] .
                                                                                                                " ต." . $INFO_SALER[1]["subdistricts_name_in_thai"] .
                                                                                                                " อ." . $INFO_SALER[1]["districts_name_in_thai"] .
                                                                                                                " จ." . $INFO_SALER[1]["provinces_name_in_thai"] .
                                                                                                                ", " . $INFO_SALER[1]["zip_code"];
                                                                                                        }
                                                                                                        ?>" disabled>
                                            <!-- <input type="text" class="form-control" id="mail" value="123 หมู่บ้านปลาฉลามขึ้นบก ซอย 456" disabled> -->
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                            <span>อีเมล์ :</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="mail" value="<?php echo $INFO_SALER[1]["email"] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                            <span>ชื่อบัญชี : </span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="username" value="<?php echo $INFO_SALER[1]["username"] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                            <span>เวลาทำการ : </span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="staff" value="<?php echo $INFO_SALER[1]["time_open"] . " - " . $INFO_SALER[1]["time_closed"] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right">
                                            <span>พนักงานประจำของร้านค้า</span>
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                                            <?php
                                            if ($INFO_SALER[1]["full_time_staff"] == 1 && $INFO_SALER[1]["temporary_staff"] == 0 && $INFO_SALER[1]["donthave"] == 0) {
                                            ?>
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
                                            <?php
                                            } else if ($INFO_SALER[1]["full_time_staff"] == 0 && $INFO_SALER[1]["temporary_staff"] == 1 && $INFO_SALER[1]["donthave"] == 0) {
                                            ?>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="admin" name="admin" value="option1" disabled>
                                                    <label class="form-check-label" for="inlineCheckbox1">มีพนักงานประจำ (Full Time)</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="admin" name="admin" value="option1" disabled checked>
                                                    <label class="form-check-label" for="inlineCheckbox1">ไม่มีพนักงานขายประจำ</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="research" name="research" value="option2" disabled>
                                                    <label class="form-check-label" for="inlineCheckbox2">มีพนักงงานชั่วคราว (Part Time)</label>
                                                </div>
                                            <?php
                                            } else if ($INFO_SALER[1]["full_time_staff"] == 1 && $INFO_SALER[1]["temporary_staff"] == 1 && $INFO_SALER[1]["donthave"] == 0) {
                                            ?>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="admin" name="admin" value="option1" disabled checked>
                                                    <label class="form-check-label" for="inlineCheckbox1">มีพนักงานประจำ (Full Time)</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="admin" name="admin" value="option1" disabled checked>
                                                    <label class="form-check-label" for="inlineCheckbox1">ไม่มีพนักงานขายประจำ</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="research" name="research" value="option2" disabled>
                                                    <label class="form-check-label" for="inlineCheckbox2">มีพนักงงานชั่วคราว (Part Time)</label>
                                                </div>
                                            <?php
                                            } else if ($INFO_SALER[1]["full_time_staff"] == 0 && $INFO_SALER[1]["temporary_staff"] == 0 && $INFO_SALER[1]["donthave"] == 1) {
                                            ?>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="admin" name="admin" value="option1" disabled>
                                                    <label class="form-check-label" for="inlineCheckbox1">มีพนักงานประจำ (Full Time)</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="admin" name="admin" value="option1" disabled>
                                                    <label class="form-check-label" for="inlineCheckbox1">ไม่มีพนักงานขายประจำ</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="research" name="research" value="option2" disabled checked>
                                                    <label class="form-check-label" for="inlineCheckbox2">มีพนักงงานชั่วคราว (Part Time)</label>
                                                </div>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-12 col-12 mb-4">
                            <div class="card">
                                <div class="card-header card-bg font-weight-bold" style="color: #006664;">
                                    <div class="row">
                                        <div class="col-md-8 d-flex align-items-center">
                                            บัญชีธนาคาร
                                        </div>
                                        <div class="col-md-4 d-flex align-items-center d-flex justify-content-end">
                                            <button type="button" id="edit_photo" class="btn btn-success btn-md" title='เพิ่มบัญชีธนาคาร' data-toggle="modal" data-target="#addBank">
                                                <i class="fas fa-money-check-alt"></i>&nbsp;&nbsp;&nbsp;เพิ่มบัญชีธนาคาร
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <?php if ($BANK_ACCOUNT[0]['numrow']) {
                                    echo '<div class="card-body">
                                             <div class="row">';
                                    for ($i = 1; $i < count($BANK_ACCOUNT); $i++) {

                                ?>

                                        <div class="col-lg-3 mb-4">
                                            <div class="card">
                                                <img class="card-img-top" src='<?php echo "../../../img/payment/" . $BANK_ACCOUNT[$i]["picture"] ?>' alt="<?php echo $BANK_ACCOUNT[$i]["name"] ?>">
                                                <div class="card-body text-center font-weight-bold">
                                                    <div class="row mt-2 mb-4 ">
                                                        <div class="col-md-4">
                                                            <h6 class="font-weight-bold d-flex justify-content-start">เลขบัญชี</h6>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h6 class="d-flex justify-content-start"><?php echo $BANK_ACCOUNT[$i]["account_code"] ?></h6>
                                                        </div>
                                                    </div>
                                                    <div class="row  mt-4">
                                                        <div class="col-md-4">
                                                            <h6 class="font-weight-bold d-flex justify-content-start">ชื่อบัญชี</h6>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h6 class="text-left"><?php echo $BANK_ACCOUNT[$i]["account_name"] ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }

                                    echo '</div>
                                        </div>';
                                }
                                ?>





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
                <script src="profile.js"></script>
            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

</body>

</html>