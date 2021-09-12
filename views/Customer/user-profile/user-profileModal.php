<?php
include_once("../../../query/query.php");
session_start();
$USER = $_SESSION[md5('user')];
$uid = $USER[1]["uid"];
$USER = getUser($uid);
$ADDRESS_USER = getAddressUser($uid);
$PROVINCE = getDistricts();
?>


<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" a aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลส่วนตัว</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="manage.php" method="post" enctype="multipart/form-data" id="form-edit" name="form-edit" role="form">
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                            <span>ชื่อบัญชี <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="text" class="form-control" id="e_username" name="e_username" placeholder="กรุณากรอกชื่อบัญชีผู้ใช้" value="<?php echo $USER[1]["username"] ?>" required oninvalid="this.setCustomValidity('กรุณากรอกชื่อบัญชีผู้ใช้')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                            <span>เบอร์โทรศัพท์ <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="text" class="form-control" id="e_tel" name="e_tel" placeholder="กรุณากรอกเบอร์โทรศัพท์" value="<?php echo $USER[1]["tel"] ?>" required oninvalid="this.setCustomValidity('กรุณากรอกเบอร์โทรศัพท์')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="e_time" id="e_time" />

                <div class="modal-footer">
                    <input type="hidden" id="request" name="request" value="edit_user" />
                    <button type="submit" id="edit" class="btn btn-danger" data-dismiss="modal" style="width: 70px;">ยกเลิก</button>
                    <button type="submit" id="editsub" name="editsub" class="btn btn-success" style="width: 70px;">แก้ไข</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Password -->
<div class="modal fade" id="editPassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" a aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เปลี่ยนรหัสผ่าน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="manage.php" method="post" enctype="multipart/form-data" id="form-edit-address" name="form-edit-address" role="form">
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>รหัสผ่านใหม่<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="shop_name" name="shop_name" placeholder="กรุณากรอกรหัสผ่านใหม่" required="" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>รหัสผ่านปัจจุบัน<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="กรุณากรอกรหัสผ่านปัจจุบัน" required="" oninput="setCustomValidity('')">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="e_time" id="e_time" />


                <div class="modal-footer">
                    <input type="hidden" id="hidden_id" name="request" value="edit" />
                    <button type="submit" id="edit" class="btn btn-danger" data-dismiss="modal" style="width: 70px;">ยกเลิก</button>
                    <button type="submit" id="editsub" name="editsub" class="btn btn-success" style="width: 70px;" value="edit">แก้ไข</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Add Address -->
<div class="modal fade" id="insertAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" a aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มที่อยู่จัดส่ง</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="manage.php" method="post" enctype="multipart/form-data" id="form-insert-address" name="form-insert-address">
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>คำนำหน้า<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <select name="title" id="title" class="form-control" required oninvalid="this.setCustomValidity('กรุณากรอกคำนำหน้า')" oninput="this.setCustomValidity('')">
                                <option value="" selected disabled>กรุณาเลือกคำนำหน้า</option>
                                <?php
                                $USER_TITLE = getUserTitle();
                                for ($i = 1; $i < count($USER_TITLE); $i++) {
                                    echo '<option value="' . $USER_TITLE[$i]["id"] . '">' . $USER_TITLE[$i]["title"] . '</option>';
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                            <span>ชื่อจริง <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="กรุณากรอกชื่อจริง" required oninvalid="this.setCustomValidity('กรุณากรอกชื่อ')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                            <span>นามสกุล <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="กรุณากรอกนามสกุล" required oninvalid="this.setCustomValidity('กรุณากรอกนามสกุล')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                            <span>เบอร์โทรศัพท์ <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="text" class="form-control" id="tel" name="tel" placeholder="กรุณากรอกเบอร์โทรศัพท์" required oninvalid="this.setCustomValidity('กรุณากรอกเบอร์โทรศัพท์')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <!-- <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                        <span>รหัสไปรษณีย์ <span class="text-danger"> *</span></span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="กรุณากรอกรหัสไปรษณีย์" required="" oninput="setCustomValidity('')">
                    </div>
                </div> -->
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>จังหวัด<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <select name="provice" id="provice" class="form-control" onchange="selectProvince();" required oninvalid="this.setCustomValidity('กรุณากรอกจังหวัด')" oninput="this.setCustomValidity('')">
                                <option value="" selected disabled>กรุณาเลือกจังหวัด</option>
                                <?php
                                $PROVINCE = getProvince();
                                for ($i = 1; $i < count($PROVINCE); $i++) {
                                    echo '<option value="' . $PROVINCE[$i]["id"] . '">' . $PROVINCE[$i]["provinces_name_in_thai"] . '</option>';
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>อำเภอ/เขต<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <select name="district" id="district" class="form-control" required onchange="selectDistrict();" oninvalid="this.setCustomValidity('กรุณากรอกอำเภอ/เขต')" oninput="this.setCustomValidity('')">
                                <option value="" selected disabled>กรุณาเลือกอำเภอ/เขต</option>
                                <?php
                                $DISTRICTS = getDistricts();
                                for ($i = 1; $i < count($DISTRICTS); $i++) {
                                    echo '<option value="' . $DISTRICTS[$i]["id"] . '">' . $DISTRICTS[$i]["districts_name_in_thai"] . '</option>';
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ตำบล/แขวง<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
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
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                            <span>ที่อยู่ <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="text" class="form-control" id="address" name="address" placeholder="กรุณากรอกที่อยู่" required oninvalid="this.setCustomValidity('กรุณากรอกที่อยู่')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>

                </div>
                <input type="hidden" id="request" name="request" value="insert_address" />
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" id="add_address" name="add_address" class="btn btn-success" value="insert">เพิ่มที่อยู่จัดส่ง</button>
                </div>
            </form>
        </div>

    </div>

</div>

<!-- edit Address  -->
<div class="modal fade" id="editAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" a aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">แก้ไขที่อยู่จัดส่ง</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="manage.php" method="post" enctype="multipart/form-data" id="form-edit-address" name="form-edit-address">
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>คำนำหน้า<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <select name="title" id="title" class="form-control">
                                <option value="" disabled>เลือกคำนำหน้า</option>
                                <option value="" selected>นาย</option>
                                <option value="">นาง</option>
                                <option value="">นางสาว</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                            <span>ชื่อจริง <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="text" class="form-control" id="ea_firstname" name="ea_firstname" value="สมหมาย" placeholder="กรุณากรอกชื่อจริง">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                            <span>นามสกุล <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="text" class="form-control" id="ea_lastname" name="ea_lastname" value="หมายปอง" placeholder="กรุณากรอกนามสกุล">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                            <span>เบอร์โทรศัพท์ <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="text" class="form-control" id="ea_tel" name="ea_tel" value="089-657-1234" placeholder="กรุณากรอกเบอร์โทรศัพท์">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>รหัสไปรษณีย์ <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="ea_zipcode" name="ea_zipcode" placeholder="กรุณากรอกรหัสไปรษณีย์" value="73140" required="" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>จังหวัด<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <select name="ea_provice" id="ea_provice" class="form-control">
                                <option value="" disabled>เลือกจังหวัด</option>
                                <option value="" selected>นครปฐม</option>
                                <option value="">กรุงเทพมหานคร</option>
                                <option value="">ราชบุรี</option>
                                <option value="">กาญจนบุรี</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>อำเภอ/เขต<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <select name="ea_district" id="ea_district" class="form-control">
                                <option value="" disabled>เลือกอำเภอ/เขต</option>
                                <option value="" selected>กำแพงแสน</option>
                                <option value="">เมือง</option>
                                <option value="">สามพราน</option>
                                <option value="">นครชัยศรี</option>
                                <option value="">บางเลน</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ตำบล/แขวง<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <select name="ea_subdistrict" id="ea_subdistrict" class="form-control">
                                <option value="" disabled>เลือกตำบล/แขวง</option>
                                <option value="" selected>กำแพงแสน</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                            <span>ที่อยู่ <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="text" class="form-control" id="ea_address" name="ea_address" value="เลขที่ 1 หมู่ 6" placeholder="กรุณากรอกที่อยู่">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" id="request" name="request" value="edit_address" />
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-success">แก้ไขอยู่จัดส่ง</button>
                </div>
            </form>
        </div>
    </div>
</div>

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