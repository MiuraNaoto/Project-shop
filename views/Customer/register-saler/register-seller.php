<?php
include_once("../../../query/query.php");
include_once("../../../query/function.php");
session_start();
$USER = $_SESSION[md5('user')];
$uid = $USER[1]["uid"];
$USER = getUser($uid);
$ADDRESS_USER = getAddressUser($uid);
$PROVINCE = getDistricts();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../layout/header.php") ?>
</head>
<style>
    body {
        /* background-color: #006664 !important; */
        background-color: #00766a;
        background-image: linear-gradient(180deg, #00766a 10%, #108579 100%);
        background-size: cover;
    }

    .p-5-6 {
        padding: 1.56rem !important;
    }

    .dropdown-menu {
        max-height: 100px;
    }
</style>

<body id="page-top">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Content Wrapper -->
                <div id="content-wrapper" class="d-flex flex-column">
                    <!-- Main Content -->
                    <div id="content">
                        <div class="container-fluid">
                            <div class="p-5-6" style="padding: 0px;">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">สมัครบัญชีผู้ขายสินค้า</h1>
                                    <hr>
                                </div>
                            </div>
                            <!-- Nested Row within Card Body -->
                            <form action="register-seller-verify.php" method="post" enctype="multipart/form-data" id="register-saler-form" name="register-saler-form" role="form">
                                <div class="col-lg-12" style="margin-top: 0px;">
                                    <div class="form-group">
                                        <div class="col mb-2" style="margin: 1px;">
                                            <h6 class="font-weight-bold mb-0 h6 text-dark">รูปภาพโลโก้ร้านค้า</h6>
                                            <span class="text-muted" style="font-size: 14px;">(โลโก้ร้านค้า เป็นรูปโลโก้หรือรูปสินค้า แต่ไม่สามารถใช้รูปบุคคลได้)</span>
                                        </div>
                                        <div class="col d-flex justify-content-center mb-4 mt-4">
                                            <img src="../../../img/icon/default-image-620x600.jpg" id="img-shop-profile" name="img-shop-profile" width="215px">
                                        </div>
                                        <div class="col custom-file ">

                                            <input type="file" class="custom-file-input" id="shop-profile-img" name="shop-profile-img" accept="image/png, image/jpeg" onchange="loadImage(event)">
                                            <label class="custom-file-label" for="shop-profile-img">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <label>คุณมีสินค้าพร้อมจำหน่ายหรือไม่ <span class="text-danger">*</span></label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input " type="radio" name="have_product" id="have_product" value="1">
                                                <label class="form-check-label" for="exampleRadios1">มีสินค้าพร้อมจำหน่าย</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="havent_product" id="havent_product" value="2">
                                                <label class="form-check-label" for="exampleRadios2">ไม่มีสินค้าพร้อมจำหน่าย</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <label>คุณต้องการขายสินค้าอะไร <span class="text-danger">*</span></label>
                                            <select class="js-example-tokenizer form-control" id="type-product[]" name="type-product[]" multiple="multiple" style="height: 38px;" required oninvalid="this.setCustomValidity('กรุณาเลือกต้องการขายสินค้าที่ต้องการขาย')" oninput="this.setCustomValidity('')">
                                                <?php
                                                $TYPE_PRODUCT = getProductType();
                                                for ($i = 1; $i < count($TYPE_PRODUCT); $i++) {
                                                    echo '<option value="' . $TYPE_PRODUCT[$i]["id"] . '">' . $TYPE_PRODUCT[$i]["type"] . '</option>';
                                                } ?>
                                            </select>
                                            <!-- <select name="provice" id="provice" class="form-control" required oninvalid="this.setCustomValidity('กรุณากรอกจังหวัด')" oninput="this.setCustomValidity('')">
                                                <option value="" selected disabled>กรุณาเลือกสินค้าที่คุณต้องการขาย</option>
                                                
                                            </select> -->
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <label>ร้านค้าของคุณมีสินค้ากี่ชนิด <span class="text-danger">*</span></label>
                                            <label style="font-size: 12px;">(เช่น ร้านของคุณขาย เสื้อเชิ้ตแขนสั้น, เสื้อยืดพิมพ์ลาย, กางเกงยีนส์ขาตรง และกางเกงยีนส์ทรงบอย นับเป็น 4 ชนิด สินค้ารุ่นเดียวกัน ต่างสี/ไซส์ นับเป็นชนิดเดียวกัน)</label>
                                            <input type="number" min="0" class="form-control" id="amount_type_product" name="amount_type_product" placeholder="กรุณากรอกจำนวนสินค้า" required oninvalid="this.setCustomValidity('กรุณากรอกจำนวนสินค้า')" oninput="this.setCustomValidity('')">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label>คำนำหน้า <span class="text-danger">*</span></label>
                                            <select name="title" id="title" class="form-control" required oninvalid="this.setCustomValidity('กรุณากรอกคำนำหน้า')" oninput="this.setCustomValidity('')">
                                                <option value="" selected disabled>กรุณาเลือกคำนำหน้า</option>
                                                <?php
                                                $USER_TITLE = getUserTitle();
                                                for ($i = 1; $i < count($USER_TITLE); $i++) {
                                                    echo '<option value="' . $USER_TITLE[$i]["id"] . '">' . $USER_TITLE[$i]["title"] . '</option>';
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>ชื่อ <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="กรุณากรอกชื่อ" required oninvalid="this.setCustomValidity('กรุณากรอกชื่อ')" oninput="this.setCustomValidity('')">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>นามสกุล <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="กรุณากรอกนามสกุล" required oninvalid="this.setCustomValidity('กรุณากรอกนามสกุล')" oninput="this.setCustomValidity('')">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label>เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                                            <input type="number" min="0" class="form-control" id="tel" name="tel" placeholder="กรุณากรอกอีเมล" required oninvalid="this.setCustomValidity('กรุณากรอกอีเมล')" oninput="this.setCustomValidity('')">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>อีเมล <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="กรุณากรอกอีเมล" required oninvalid="this.setCustomValidity('กรุณากรอกอีเมล')" oninput="this.setCustomValidity('')">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label>พนักงานประจำร้านของคุณ <span class="text-danger">*</span></label>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="fulltime" name="fulltime" value="fulltime">
                                                <label class="form-check-label" for="inlineCheckbox1">มีพนักงานประจำ</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="parttime" name="parttime" value="parttime">
                                                <label class="form-check-label" for="inlineCheckbox2">มีพนักงงานชั่วคราว</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="none" name="none" value="none">
                                                <label class="form-check-label" for="inlineCheckbox1">ไม่มีพนักงานขายประจำ/ชั่วคราว</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row mb-3">
                                                        <div class="col-6 align-self-center">
                                                            <label class="align-self-center">จำนวนพนักงาน <span style="font-size: 14px;">(รวมเจ้าของร้าน)</span> <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="row d-flex align-items-center">
                                                                <div class="col-lg-12">
                                                                    <input type="number" min="0" class="form-control" id="amountataff" name="amountataff" placeholder="กรุณากรอกจำนวน (คน)" required oninvalid="this.setCustomValidity('กรุณากรอกจำนวน (คน)')" oninput="this.setCustomValidity('')">
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-3 align-self-center">
                                                            <label class="align-self-center">เวลาทำการ <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-9">
                                                            <div class="row d-flex align-items-center">
                                                                <div class="col-lg-5">
                                                                    <input type="time" class="form-control" id="time_open" name="time_open" placeholder="กรุณากรอกเวลาเปิด" required oninvalid="this.setCustomValidity('กรุณากรอกเวลาทำการ')" oninput="this.setCustomValidity('')">
                                                                </div>
                                                                <div class="col-lg-2" style="text-align: center;">
                                                                    <span> - </span>
                                                                </div>
                                                                <div class="col-lg-5">
                                                                    <input type="time" class="form-control" id="time_closed" name="time_closed" placeholder="กรุณากรอกเวลาเปิด" required oninvalid="this.setCustomValidity('กรุณากรอกเวลาปิดทำการ')" oninput="this.setCustomValidity('')">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label>ชื่อร้าน <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="shop-name" name="shop-name" placeholder="กรุณากรอกขื่อร้าน" required oninvalid="this.setCustomValidity('กรุณากรอกชื่อร้าน')" oninput="this.setCustomValidity('')">
                                        </div>

                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label>ที่อยู่ร้าน <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="address" name="address" placeholder="กรุณากรอกที่อยู่ร้าน" required oninvalid="this.setCustomValidity('กรุณากรอกที่อยู่ร้าน')" oninput="this.setCustomValidity('')">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label>จังหวัด <span class="text-danger">*</span></label>
                                            <select name="provice" id="provice" class="form-control" onchange="selectProvince();" required oninvalid="this.setCustomValidity('กรุณากรอกจังหวัด')" oninput="this.setCustomValidity('')">
                                                <option value="" selected disabled>กรุณาเลือกจังหวัด</option>
                                                <?php
                                                $PROVINCE = getProvince();
                                                for ($i = 1; $i < count($PROVINCE); $i++) {
                                                    echo '<option value="' . $PROVINCE[$i]["id"] . '">' . $PROVINCE[$i]["provinces_name_in_thai"] . '</option>';
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>อำเภอ/เขต <span class="text-danger">*</span></label>
                                            <select name="district" id="district" class="form-control" required onchange="selectDistrict();" oninvalid="this.setCustomValidity('กรุณากรอกอำเภอ/เขต')" oninput="this.setCustomValidity('')">
                                                <option value="" selected disabled>กรุณาเลือกอำเภอ/เขต</option>
                                                <?php
                                                $DISTRICTS = getDistricts();
                                                for ($i = 1; $i < count($DISTRICTS); $i++) {
                                                    echo '<option value="' . $DISTRICTS[$i]["id"] . '">' . $DISTRICTS[$i]["districts_name_in_thai"] . '</option>';
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label>ตำบล/แขวง <span class="text-danger">*</span></label>
                                            <select name="subdistrict" id="subdistrict" class="form-control" required oninvalid="this.setCustomValidity('กรุณากรอกตำบล/แขวง')" oninput="this.setCustomValidity('')">
                                                <option value="" selected disabled>กรุณาเลือกตำบล/แขวง</option>
                                                <?php
                                                $SUBDISTRICTS = getSubDistricts();
                                                for ($i = 1; $i < count($SUBDISTRICTS); $i++) {
                                                    echo '<option value="' . $SUBDISTRICTS[$i]["id"] . '">' . $SUBDISTRICTS[$i]["subdistricts_name_in_thai"] . '</option>';
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="p-5-6" style="padding: 0px;">
                                        <div class="col-lg-12 text-right" style="padding: 0px; margin-left: 20px;">
                                            <input type="hidden" id="request" name="request" value="register" />
                                            <a href="../../../index.php"><button type="button" class="btn btn-danger">ยกเลิก</button></a>
                                            <button type="submit" id="register-saler" name="register-saler" class="btn btn-success">สมัครสมาชิก</button>
                                        </div>
                                    </div>
                                    <!-- Scroll to Top Button-->
                                    <a class="scroll-to-top rounded" href="#page-top">
                                        <i class="fas fa-angle-up"></i>
                                    </a>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End of Main Content -->

        <?php include_once("../layout/js.php"); ?>

        <script src="register-seller.js"></script>


    </div>
    <!-- End of Page Wrapper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        function selectProvince() {
            var provinceObject = document.getElementById("provice");
            var districtObject = document.getElementById("district");
            var subdistrictObject = document.getElementById("subdistrict");
            var provinceId = document.getElementById("provice").value;
            // console.log(provinceId)

            districtObject.innerHTML = '<option value="" >กรุณาเลือกอำเภอ/เขต</option>';
            subdistrictObject.innerHTML = '<option value="" >กรุณาเลือกตำบล/แขวง</option>';
            $.get('./districts.php?province_id=' + provinceId, function(data) {
                // console.log(data)
                var result = JSON.parse(data);
                // console.log(result);
                $.each(result, function(index, item) {
                    // console.log(item)
                    if (index != 0) {
                        districtObject.innerHTML += "<option value='" + item.id + "'> " + item.districts_name_in_thai + "</option>";
                    }
                });
            });

        }

        function selectDistrict() {
            var districtObject = document.getElementById("district");
            var subdistrictObject = document.getElementById("subdistrict");
            var districtId = document.getElementById("district").value;
            // console.log(provinceId)

            subdistrictObject.innerHTML = '<option value="" >กรุณาเลือกตำบล/แขวง</option>';
            $.get('./sub-districts.php?district_id=' + districtId, function(data) {
                // console.log(data)
                var result = JSON.parse(data);
                // console.log(result);
                $.each(result, function(index, item) {
                    // console.log(item)
                    if (index != 0) {
                        subdistrictObject.innerHTML += "<option value='" + item.id + "'> " + item.subdistricts_name_in_thai + "</option>";
                    }
                });
            });

        }
    </script>

</body>

</html>