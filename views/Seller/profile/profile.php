<?php
include_once("../../../query/query.php");
include_once("../../../query/function.php");
session_start();
$idUT = $_SESSION[md5('typeid')];
$username = $_SESSION[md5('username')];
$SELLER = $_SESSION[md5('shop')];
$USER = $_SESSION[md5('user')];
// print_r($SELLER);
$uid = $USER[1]["uid"];
$shop_id = $SELLER[1]["shop_id"];
$CurrentMenu = "profile";

$INFO_SALER = getsalerInfo($shop_id);
$BANK_ACCOUNT = getBankAccount($shop_id);
$SHIPPING_METHOD = getShippingMethod($shop_id)
// $UTID = getUserTitleByid($uid);
// $UTID1 = getUserTitleSelect($uid);

// print_r($SELLER);
// print_r($UTID);
// print_r($UTID1);
// echo print_r($BANK_ACCOUNT);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../layout/header.php") ?>
    <link rel="stylesheet" href="profile.css">
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
                                        <div class="card-body align-self-center mt-2" style="height: 100%; ">
                                            <form name="uploadpic" id="uploadpic" method="POST" action="manage.php" enctype="multipart/form-data">
                                                <div class="profile-pic">
                                                    <input type="text" id="uid" name="uid" value="<?php echo $shop_id ?>" style="display:none" />
                                                    <input type="text" id="request" name="request" value="updateprofile" style="display:none" />
                                                    <input type="text" id="profile_shop" name="profile_shop" value="<?php echo $SELLER[1]["profile_shop"]; ?>" style="display:none" />
                                                    <input id="uploadImage" type="file" accept="image/jpeg, image/jpg, image/png" name="image" hidden />
                                                    <label class="-label" for="uploadImage">
                                                        <span class="glyphicon glyphicon-camera"></span>
                                                        <span>เปลี่ยนรูปโปรไฟล์</span>
                                                    </label>
                                                    <img class='img-radius img-profile' src='<?php echo "../../../img/profile/saler/" . $SELLER[1]["profile_shop"] ?>' style="object-fit: cover;" />
                                                </div>
                                            </form>
                                            <br>
                                            <div class="row mb-2">
                                                <div class="col-xl-12 col-12">
                                                    <center>
                                                        <button type="button" id="btn_info" class="btn btn-warning btn-md" title='แก้ไขข้อมูลส่วนตัว' data-toggle="modal" data-target="#editModal">
                                                            <i class="fas fa-edit"></i>&nbsp;&nbsp;&nbsp;แก้ไขข้อมูลส่วนตัว
                                                        </button>
                                                        <button type="button" id="btn_pass" class="btn btn-secondary btn-md pass_edit" title='เปลี่ยนรหัสผ่าน' data-toggle="modal" data-target="#editPassModal" onclick="change_password('<?php echo $SELLER[1]['uid'] ?>','<?php echo $SELLER[1]['password'] ?>')">
                                                            <i class="fa fa-cog"></i>&nbsp;&nbsp;&nbsp;เปลี่ยนรหัสผ่าน
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
                                            <input type="text" class="form-control" id="mail" value="<?php
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
                                            <input type="text" class="form-control" id="staff" value="<?php echo $INFO_SALER[1]["time_opened"] . " - " . $INFO_SALER[1]["time_closed"] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right">
                                            <span>พนักงานประจำของร้านค้า</span>
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                                            <?php
                                            if ($INFO_SALER[1]["fulltime_staff"] == 1 && $INFO_SALER[1]["parttime_staff"] == 0 && $INFO_SALER[1]["donthave_staff"] == 0) {
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
                                            } else if ($INFO_SALER[1]["fulltime_staff"] == 0 && $INFO_SALER[1]["parttime_staff"] == 1 && $INFO_SALER[1]["donthave_staff"] == 0) {
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
                                            } else if ($INFO_SALER[1]["fulltime_staff"] == 1 && $INFO_SALER[1]["parttime_staff"] == 1 && $INFO_SALER[1]["donthave_staff"] == 0) {
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
                                            } else if ($INFO_SALER[1]["fulltime_staff"] == 0 && $INFO_SALER[1]["parttime_staff"] == 0 && $INFO_SALER[1]["donthave_staff"] == 1) {
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
                                            <div class="card edit-bank-account" data-toggle="modal" onclick="delfunction('<?php echo $BANK_ACCOUNT[$i]['baid'] ?>', '<?php echo $BANK_ACCOUNT[$i]['account_code'] ?>', '<?php echo $BANK_ACCOUNT[$i]['account_name'] ?>')" baid="<?php echo $BANK_ACCOUNT[$i]["baid"] ?>" account_code="<?php echo $BANK_ACCOUNT[$i]["account_code"] ?>" account_name="<?php echo $BANK_ACCOUNT[$i]["account_name"] ?>" bank_id="<?php echo $BANK_ACCOUNT[$i]["id"] ?>" style="cursor: pointer;">
                                                <img class="card-img-top" src='<?php echo "../../../img/payment/" . $BANK_ACCOUNT[$i]["picture"] ?>' alt="<?php echo $BANK_ACCOUNT[$i]["name"] ?>">
                                                <div class="card-body text-center font-weight-bold">
                                                    <div class="row mt-2 mb-4 ">
                                                        <div class="col-md-4">
                                                            <h6 class="font-weight-bold d-flex justify-content-start">เลขบัญชี</h6>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h6 class="d-flex justify-content-start"><?php echo format_banknumber($BANK_ACCOUNT[$i]["account_code"]) ?></h6>
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


                    <div class="row">
                        <div class="col-xl-12 col-12 mb-4">
                            <div class="card">
                                <div class="card-header card-bg font-weight-bold" style="color: #006664;">
                                    <div class="row">
                                        <div class="col-md-8 d-flex align-items-center">
                                            ประเภทการจัดส่ง
                                        </div>
                                        <div class="col-md-4 d-flex align-items-center d-flex justify-content-end">
                                            <button type="button" id="add_shipping_method" class="btn btn-success btn-md" title='เพิ่มประเภทการจัดส่ง' data-toggle="modal" data-target="#addShippingMethod">
                                                <i class="fas fa-money-check-alt"></i>&nbsp;&nbsp;&nbsp;เพิ่มประเภทการจัดส่ง
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <?php if ($SHIPPING_METHOD[0]['numrow']) {
                                    echo '<div class="card-body">
                                             <div class="row">';
                                    for ($i = 1; $i < count($SHIPPING_METHOD); $i++) {
                                        // print_r($SHIPPING_METHOD);
                                ?>
                                        <div class="col-lg-3 mb-4">
                                            <div class="card edit-bank-account" data-toggle="modal" onclick="delDfunction('<?php echo $SHIPPING_METHOD[$i]['sm_id'] ?>', '<?php echo $SHIPPING_METHOD[$i]['delivery_name'] ?>', '<?php echo $SHIPPING_METHOD[$i]['weight_product'] ?>', '<?php echo $SHIPPING_METHOD[$i]['price_per_unit'] ?>')" baid="<?php echo $BANK_ACCOUNT[$i]["baid"] ?>" account_code="<?php echo $BANK_ACCOUNT[$i]["account_code"] ?>" account_name="<?php echo $BANK_ACCOUNT[$i]["account_name"] ?>" bank_id="<?php echo $BANK_ACCOUNT[$i]["id"] ?>" style="cursor: pointer;">
                                                <!-- <img class="card-img-top" src='<?php echo "../../../img/payment/" . $SHIPPING_METHOD[$i]["picture"] ?>' alt="<?php echo $SHIPPING_METHOD[$i]["name"] ?>"> -->
                                                <div class="card-body text-center font-weight-bold">
                                                    <div class="row mt-2 mb-4 ">
                                                        <div class="col-md-5">
                                                            <h6 class="font-weight-bold d-flex justify-content-start">ประเภทการจัดส่ง</h6>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <h6 class="d-flex justify-content-start"><?php echo $SHIPPING_METHOD[$i]["delivery_name"] ?></h6>
                                                        </div>
                                                    </div>
                                                    <div class="row  mt-4">
                                                        <div class="col-md-5">
                                                            <h6 class="font-weight-bold d-flex justify-content-start">ราคา</h6>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <h6 class="text-left"><?php echo $SHIPPING_METHOD[$i]["price_per_unit"] ?></h6>
                                                        </div>
                                                    </div>
                                                    <div class="row  mt-4">
                                                        <div class="col-md-5">
                                                            <h6 class="font-weight-bold d-flex justify-content-start">น้ำหนัก</h6>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <h6 class="text-left"><?php echo $SHIPPING_METHOD[$i]["weight_product"] ?></h6>
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

            </div>
            <?php
            include_once("profileModal.php");
            include_once("../layout/footer.php");

            ?>
            <script src="profile.js"></script>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

</body>

</html>