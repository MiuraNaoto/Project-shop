<?php
include_once("../../../query/query.php");
// $USER = getUser($uid);
$SELLER = getSeller($shop_id);
$BANK = getBank();
$UTID = getUserTitleByid($SELLER[1]["title_id"]);
$UTID1 = getUserTitleSelect($SELLER[1]["title_id"]);
$DELIVERY = getDeliveryType();
// print_r($DELIVERY);
?>

<!-- <style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {

        opacity: 0;

    }
</style> -->
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" a aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลส่วนตัว</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="manage.php" method="post" enctype="multipart/form-data" id="form-edit-profile" name="form-edit-profile" role="form">
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ชื่อร้านค้า<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="e_shop_name" name="e_shop_name" placeholder="กรุณากรอกชื่อร้าน" value="<?php echo $SELLER[1]["shop_name"] ?>" required oninvalid="this.setCustomValidity('กรุณากรอกชื่อร้าน')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>คำนำหน้า<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <select name="e_title" id="e_title" class="form-control" required oninvalid="this.setCustomValidity('กรุณากรอกคำนำหน้าชื่อ')" oninput="this.setCustomValidity('')">
                                <option value="" selected disabled>เลือกคำนำหน้า</option>
                                <option value="<?php echo  $UTID[1]['id']; ?>" selected><?php echo  $UTID['1']['title']; ?></option>
                                <?php
                                print_r($UTID1);
                                for ($i = 1; $i <= count($UTID1); $i++) {
                                    // echo $fcwd[$i]['id'];
                                    echo "<option value=" . $UTID1[$i]['id'] . ">" . $UTID1[$i]['title'] . "</option>";
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ชื่อ<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="e_firstname" name="e_firstname" placeholder="กรุณากรอกชื่อ" value="<?php echo $SELLER[1]["firstname"] ?>" required oninvalid="this.setCustomValidity('กรุณากรอกชื่อจริง')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>นามสกุล<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="e_lastname" name="e_lastname" placeholder="กรุณากรอกนามสกุล" value="<?php echo $SELLER[1]["lastname"] ?>" required oninvalid="this.setCustomValidity('กรุณากรอกนามสกุล')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>เบอร์โทร<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="e_tel" name="e_tel" placeholder="กรุณากรอกเบอร์โทร" value="<?php echo $SELLER[1]["tel"] ?>" required oninvalid="this.setCustomValidity('กรุณากรอกเบอร์โทรศัพท์')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>อีเมล<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="e_email" name="e_email" placeholder="กรุณากรอกอีเมล์" value="<?php echo $SELLER[1]["email"] ?>" required oninvalid="this.setCustomValidity('กรุณากรอกอีเมล')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <!-- <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ชื่อบัญชี <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="e_username" name="e_username" placeholder="กรุณากรอกชื่อบัญชี" value="<?php echo $SELLER[1]["username"] ?>" required oninvalid="this.setCustomValidity('กรุณากรอกชื่อบัญชีผู้ใช้')" oninput="this.setCustomValidity('')">
                        </div>
                    </div> -->
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ที่อยู่<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="e_address" name="e_address" placeholder="กรุณากรอกที่อยู่" value="<?php echo $SELLER[1]["address_shop"] ?>" required oninvalid="this.setCustomValidity('กรุณากรอกที่อยู่')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>จังหวัด<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <?php
                            $province_id = "SELECT * FROM `subdistricts` LEFT JOIN `districts` ON `subdistricts`.`district_id` = `districts`.`id` LEFT JOIN `provinces` ON `districts`.`province_id` = `provinces`.`id` WHERE `subdistricts`.`id` =  '" . $SELLER[1]['subdistrict_shop'] . "'";
                            $province = selectData($province_id);
                            // print_r($province);
                            ?>
                            <select name="e_provice" id="e_provice" onchange="selectProvince();" class="form-control" required oninvalid="this.setCustomValidity('กรุณากรอกจังหวัด')" oninput="this.setCustomValidity('')">
                                <option value="" disabled>เลือกจังหวัด</option>
                                <option value="" selected><?php echo $province[1]['provinces_name_in_thai'] ?></option>
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
                            <?php
                            $ds = "SELECT * FROM `districts` LEFT JOIN `provinces` ON `districts`.`province_id` = `provinces`.`id` WHERE `provinces`.`id` =  '" . $province[1]['province_id'] . "'";
                            $dst = selectData($ds);
                            // print_r($dst);
                            ?>
                            <select name="e_district" id="e_district" onchange="selectDistrict();" class="form-control" required oninvalid="this.setCustomValidity('กรุณากรอกอำเภอ/เขต')" oninput="this.setCustomValidity('')">
                                <option value="" disabled>เลือกอำเภอ/เขต</option>
                                <option value="" selected><?php echo $province[1]['districts_name_in_thai'] ?></option>
                                <?php
                                for ($i = 1; $i < count($dst); $i++) {
                                    echo '<option value="' . $dst[$i]["id"] . '">' . $dst[$i]["districts_name_in_thai"] . '</option>';
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ตำบล/แขวง<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <?php
                            $sds = "SELECT * FROM `subdistricts` LEFT JOIN `districts` ON `subdistricts`.`district_id` = `districts`.`id` WHERE `districts`.`id` =  '" . $province[1]['district_id'] . "'";
                            $sdst = selectData($sds);
                            // print_r($dst);
                            ?>
                            <select name="e_subdistrict" id="e_subdistrict" class="form-control" required oninvalid="this.setCustomValidity('กรุณากรอกตำบล/แขวง')" oninput="this.setCustomValidity('')">
                                <option value="" disabled>เลือกตำบล/แขวง</option>
                                <option value="<?php echo $SELLER[1]["subdistrict_shop"] ?>" selected><?php echo $province[1]['subdistricts_name_in_thai'] ?></option>
                                <?php
                                for ($i = 1; $i < count($sdst); $i++) {
                                    echo '<option value="' . $sdst[$i]["id"] . '">' . $sdst[$i]["subdistricts_name_in_thai"] . '</option>';
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                            <span>เวลาทำการ <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="time" name="e_time_opened" id="e_time_opened" class="form-control" value="<?php echo $SELLER[1]["time_opened"] ?>" required oninvalid="this.setCustomValidity('กรุณากรอกเวลาเปิดทำการ')" oninput="this.setCustomValidity('')">
                                </div>
                                <div class="col-md-2" style="text-align: center;">
                                    <span> - </span>
                                </div>
                                <div class="col-md-5">
                                    <input type="time" name="e_time_closed" id="e_time_closed" class="form-control" value="<?php echo $SELLER[1]["time_closed"] ?>" required oninvalid="this.setCustomValidity('กรุณากรอกเวลาปิดทำการ')" oninput="this.setCustomValidity('')">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                            <span>จำนวนพนักงงาน <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="number" name="e_amount_staff" id="e_amount_staff" class="form-control" placeholder="กรุณากรอกจำนวนพนักงงาน" value="<?php echo $SELLER[1]["quantity_staff"] ?>" required oninvalid="this.setCustomValidity('กรุณากรอกจำนวนพนักงงาน')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right">
                            <span>พนักงานประจำของร้านค้า <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="e_fulltime" name="e_fulltime" value="option1" checked>
                                    <label class="form-check-label" for="inlineCheckbox1">มีพนักงานประจำ (Full Time)</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="e_parttime" name="e_parttime" value="option2">
                                    <label class="form-check-label" for="inlineCheckbox2">มีพนักงงานชั่วคราว (Part Time)</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="e_none" name="e_none" value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">ไม่มีพนักงานขายประจำ/ชั่วคราว</label>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <input type="hidden" name="e_time" id="e_time" />


                <div class="modal-footer">
                    <input type="hidden" id="hidden_id" name="request" value="edit_profile" />
                    <button type="button" id="edit" class="btn btn-danger" data-dismiss="modal" style="width: 70px;">ยกเลิก</button>
                    <button type="submit" class="btn btn-success edit-profile" style="width: 70px;">แก้ไข</button>
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
            <form action="manage.php" method="post" enctype="multipart/form-data" id="form-change-passowrd" name="form-change-passowrd" role="form">
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>รหัสผ่านปัจจุบัน<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="password" class="form-control" id="current_password" name="current_password" placeholder="กรุณากรอกรหัสผ่านปัจจุบัน" required oninvalid="this.setCustomValidity('กรุณากรอกรหัสผ่านปัจจุบัน')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>รหัสผ่านใหม่<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="กรุณากรอกรหัสผ่านใหม่" required oninvalid="this.setCustomValidity('กรุณากรอกรหัสผ่านใหม่')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ยืนยันรหัสผ่าน<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" placeholder="กรุณากรอกรหัสผ่านยืนยัน" required oninvalid="this.setCustomValidity('กรุณากรอกรหัสผ่านยืนยัน')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>

                </div>
                <input type="hidden" name="e_time" id="e_time" />

                <div class="modal-footer">
                    <input type="hidden" id="hidden_id" name="request" value="change_password" />
                    <button type="button" id="edit" class="btn btn-danger" data-dismiss="modal" style="width: 70px;">ยกเลิก</button>
                    <button type="submit" class="btn btn-success change-passowrd">แก้ไขรหัสผ่าน</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ADD BANK -->
<div class="modal fade" id="addBank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" a aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มบัญชีธนาคาร</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="manage.php" method="post" enctype="multipart/form-data" id="form-insert-bank" name="form-insert-bank" role="form">
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ชื่อธนาคาร<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <select name="banktype" id="banktype" class="form-control" required oninvalid="this.setCustomValidity('กรุณาเลือกธนาคาร')" oninput="this.setCustomValidity('')">
                                <option value="" disabled selected>เลือกธนาคาร</option>
                                <?php
                                for ($i = 1; $i < count($BANK); $i++) {
                                    echo '<option value="' . $BANK[$i]["id"] . '">' . $BANK[$i]["name"] . '</option>';
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ชื่อบัญชีธนาคาร<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="bankname" name="bankname" placeholder="กรุณากรอกชื่อบัญชีธนาคาร" required oninvalid="this.setCustomValidity('กรุณากรอกชื่อบัญชีธนาคาร')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>เลขที่บัญชีธนาคาร<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="number" class="form-control" id="bankcode" name="bankcode" placeholder="กรุณากรอกเลขที่บัญชีธนาคาร" required oninvalid="this.setCustomValidity('กรุณากรอกเลขที่บัญชีธนาคาร')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="hidden" id="request" name="request" value="insert_bank" />
                    <button type="button" class="btn btn-danger" data-dismiss="modal" style="width: 70px;">ยกเลิก</button>
                    <button type="submit" id="add_bank" name="add_bank" class="btn btn-success add_bank">เพิ่มบัญชีธนาคาร</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ADD shipping method -->
<div class="modal fade" id="addShippingMethod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" a aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มประเภทการจัดส่ง</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="manage.php" method="post" enctype="multipart/form-data" id="form-insert-shipping-method" name="form-insert-shipping-method" role="form">
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ชื่อธนาคาร<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <select name="type_delivery" id="type_delivery" class="form-control" required oninvalid="this.setCustomValidity('เลือกประเภทการจัดส่ง')" oninput="this.setCustomValidity('')">
                                <option value="" disabled selected>เลือกประเภทการจัดส่ง</option>
                                <?php

                                for ($i = 1; $i < count($DELIVERY); $i++) {
                                    echo '<option value="' . $DELIVERY[$i]["id"] . '">' . $DELIVERY[$i]["delivery_name"] . '</option>';
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>น้ำหนักสินค้า<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="number" class="form-control" min="0" step="0.01" id="weight" name="weight" placeholder="กรุณากรอกชื่อบัญชีธนาคาร" required oninvalid="this.setCustomValidity('กรุณากรอกชื่อบัญชีธนาคาร')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ราคาต่อหน่วย (จากน้ำหนักสินค้า)<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="number" class="form-control" min="0" step="0.01" id="price_w" name="price_w" placeholder="กรุณากรอกราคาต่อหน่วย (น้ำหนักสินค้า)" required oninvalid="this.setCustomValidity('กรุณากรอกราคาต่อหน่วย (น้ำหนักสินค้า)')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="hidden" id="request" name="request" value="insert_shipping_method" />
                    <button type="button" class="btn btn-danger" data-dismiss="modal" style="width: 70px;">ยกเลิก</button>
                    <button type="submit" id="add_shipping_method" name="add_shipping_method" class="btn btn-success add_shipping_method">เพิ่มประเภทการจัดส่ง</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- EDIT BANK -->
<div class="modal fade" id="edit-bank-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลบัญชีธนาคาร</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="manage.php" method="post" enctype="multipart/form-data" id="form-insert-bank" name="form-insert-bank" role="form">
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ชื่อธนาคาร<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <select name="e_banktype" id="e_banktype" class="form-control" required oninvalid="this.setCustomValidity('กรุณาเลือกธนาคาร')" oninput="this.setCustomValidity('')">
                                <option value="" disabled selected>เลือกธนาคาร</option>
                                <?php
                                for ($i = 1; $i < count($BANK); $i++) {
                                    echo '<option value="' . $BANK[$i]["id"] . '">' . $BANK[$i]["name"] . '</option>';
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ชื่อบัญชีธนาคาร<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="e_bankname" name="e_bankname" placeholder="กรุณากรอกชื่อบัญชีธนาคาร" value="" required oninvalid="this.setCustomValidity('กรุณากรอกชื่อบัญชีธนาคาร')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>เลขที่บัญชีธนาคาร<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="number" class="form-control" id="e_bankcode" name="e_bankcode" placeholder="กรุณากรอกเลขที่บัญชีธนาคาร" value="" required oninvalid="this.setCustomValidity('กรุณากรอกเลขที่บัญชีธนาคาร')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="hidden" id="e_baid" name="e_baid" value="" />
                    <input type="hidden" id="request" name="request" value="edit_bank" />
                    <button type="button" class="btn btn-danger" data-dismiss="modal" style="width: 70px;">ยกเลิก</button>
                    <button type="submit" class="btn btn-warning edit-bank">แก้ไขบัญชีธนาคาร</button>
                </div>
            </form>
        </div>
    </div>
</div>