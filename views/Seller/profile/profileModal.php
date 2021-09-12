<?php
include_once("../../../query/query.php");
session_start();
$USER = $_SESSION[md5('user')];
$uid = $USER[1]["uid"];
$USER = getUser($uid);
$BANK = getBank();
?>

<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {

        opacity: 0;

    }
</style>
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
            <form action="manage.php" method="post" enctype="multipart/form-data" id="editform" id="editForm" name="editform" role="form">
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ชื่อร้านค้า<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="shop_name" name="shop_name" placeholder="กรุณากรอกชื่อร้าน" value="ขายอะไรก็ไม่รู้ แต่อยากขายนะ" required="" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>คำนำหน้า<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <select name="title" id="title" class="form-control">
                                <option value="">เลือกคำนำหน้า</option>
                                <option value="" selected>นาย</option>
                                <option value="">นาง</option>
                                <option value="">นางสาว</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ชื่อ<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="กรุณากรอกชื่อ" value="มั่นหมาย" required="" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>นามสกุล<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="surname" name="surname" placeholder="กรุณากรอกนามสกุล" value="หมายมั่น" required="" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>เบอร์โทร<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="tel" name="tel" placeholder="กรุณากรอกเบอร์โทร" value="098-765-4321" required="" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>อีเมล์<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="email" name="email" placeholder="กรุณากรอกอีเมล์" value="awaiwa@gmail.com" required="" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ชื่อบัญชี <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="username" name="username" placeholder="กรุณากรอกชื่อบัญชี" value="a-rai-wa" required="" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ที่อยู่<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="address" name="address" placeholder="กรุณากรอกที่อยู่" value="123 หมู่บ้านปลาฉลามขึ้นบก ซอย 456" required="" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ตำบล/แขวง<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <select name="subdistrict" id="subdistrict" class="form-control">
                                <option value="" disabled>เลือกตำบล/แขวง</option>
                                <option value="" selected>กำแพงแสน</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>อำเภอ/เขต<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <select name="district" id="district" class="form-control">
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
                            <span>จังหวัด<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <select name="provice" id="provice" class="form-control">
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
                            <span>รหัสไปรษณีย์ <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="กรุณากรอกรหัสไปรษณีย์" value="73140" required="" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                            <span>เวลาทำการ <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="time" class="form-control" value="08:00" required="" oninput="setCustomValidity('')">
                                </div>
                                <div class="col-md-2" style="text-align: center;">
                                    <span> - </span>
                                </div>
                                <div class="col-md-5">
                                    <input type="time" class="form-control" value="18:00" required="" oninput="setCustomValidity('')">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                            <span>จำนวนพนักงงาน <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="number" class="form-control" placeholder="กรุณากรอกจำนวนพนักงงาน" value="5" required="" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right">
                            <span>พนักงานประจำของร้านค้า <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="fulltime" name="fulltime" value="option1" checked>
                                    <label class="form-check-label" for="inlineCheckbox1">มีพนักงานประจำ (Full Time)</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="parttime" name="parttime" value="option2">
                                    <label class="form-check-label" for="inlineCheckbox2">มีพนักงงานชั่วคราว (Part Time)</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="none" name="none" value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">ไม่มีพนักงานขายประจำ/ชั่วคราว</label>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <input type="hidden" name="e_time" id="e_time" />


                <div class="modal-footer">
                    <input type="hidden" id="hidden_id" name="request" value="edit" />
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
            <form action="manage.php" method="post" enctype="multipart/form-data" id="editform" id="editForm" name="editform" role="form">

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
                    <button type="submit" id="editsub" name="editsub" class="btn btn-success" style="width: 70px;">แก้ไข</button>
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