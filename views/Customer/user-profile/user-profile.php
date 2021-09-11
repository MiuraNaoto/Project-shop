<?php
include_once("../../../query/query.php");
session_start();
// $idUT = $_SESSION[md5('typeid')];
// $username = $_SESSION[md5('username')];
$USER = $_SESSION[md5('user')];
echo print_r($USER);
echo "<br>" . "<br>";
// $SUBDISTRICTS = getSubDistricts();
// echo print_r($SUBDISTRICTS);
function format_phonenumber($phonenumber)
{
    if (preg_match('/^(\d{3})(\d{3})(\d{4})$/',  $phonenumber,  $matches)) {
        $result = $matches[1] . '-' . $matches[2] . '-' . $matches[3];
    }
    return $result;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../layout/header.php") ?>
</head>

<body>
    <?php include_once("../layout/navbar.php"); ?>

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="../../../index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Profile</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
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
                                        <img class="img-radius img-profile" src='<?php echo  "../../../img/profile/" . $USER[1]["profile_user"] ?>' width="350px" height="350px">
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-xl-12 col-12">
                                            <center>
                                                <button type="button" id="edit_photo" class="btn btn-primary btn-md" title='เปลี่ยนรูปโปรไฟล์'>
                                                    <i class="fas fa-image"></i>
                                                </button>
                                                <button type="button" class="btn btn-success btn-md" title='เพิ่มที่อยู่จัดส่ง' data-toggle="modal" data-target="#insertAddress">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                                <button type="button" id="btn_info" class="btn btn-warning btn-md text-light" title='เปลี่ยนข้อมูลบัญชี' data-toggle="modal" data-target="#editModal">
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

                    <div class="card mb-4">
                        <div class="card-header card-bg font-weight-bold" style="color:<?= $color ?>;">
                            รายละเอียดบัญชี
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                    <span>ชื่อบัญชี :</span>
                                </div>
                                <div class="col-xl-9 col-12">
                                    <input type="text" class="form-control" id="title" value="<?php echo $USER[1]["username"] ?>" disabled>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                    <span>เบอร์โทรศัพท์ :</span>
                                </div>
                                <div class="col-xl-9 col-12">
                                    <input type="text" class="form-control" id="firstname" value="<?php echo format_phonenumber($USER[1]["tel"]); ?>" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header card-bg font-weight-bold" style="color:<?= $color ?>;">
                            <div class="row">
                                <div class="col-md-8 align-self-center">
                                    <span>
                                        ที่อยู่จัดส่ง
                                    </span>
                                </div>
                                <div class="col-md-4 d-flex justify-content-end">
                                    <button type="button" id="btn_info" class="btn btn-warning text-light" title='เปลี่ยนข้อมูลบัญชี' data-toggle="modal" data-target="#editAddress">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                    <span>คำนำหน้า :</span>
                                </div>
                                <div class="col-xl-9 col-12">
                                    <input type="text" class="form-control" id="title" value="นาย" disabled>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                    <span>ชื่อจริง :</span>
                                </div>
                                <div class="col-xl-9 col-12">
                                    <input type="text" class="form-control" id="title" value="สมหมาย" disabled>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                    <span>นามสกุล :</span>
                                </div>
                                <div class="col-xl-9 col-12">
                                    <input type="text" class="form-control" id="title" value="หมายปอง" disabled>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                    <span>เบอร์โทรศัพท์ :</span>
                                </div>
                                <div class="col-xl-9 col-12">
                                    <input type="text" class="form-control" id="firstname" value="089-657-1234" disabled>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                                    <span>ที่อยู่ :</span>
                                </div>
                                <div class="col-xl-9 col-12">
                                    <input type="text" class="form-control" id="title" value="เลขที่ 1 หมู่ 6 ต.กำแพงแสน อ.กำแพงแสน จ.นครปฐม 73140" disabled>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- Shop Cart Section End -->

    <!-- Js Plugins -->
    <?php
    include_once("../layout/js.php");
    include_once("user-profileModal.php");
    ?>
    <script src="user-profile.js"></script>
</body>

</html>