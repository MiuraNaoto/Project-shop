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
            <form action="manage.php" method="post" enctype="multipart/form-data" id="editform" id="editForm" name="editform" role="form">

                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                            <span>ชื่อบัญชี <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="text" class="form-control" id="username" name="username" value="test_customer">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                            <span>เบอร์โทรศัพท์ <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="text" class="form-control" id="tel" name="tel" value="089-657-1234">
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


<!-- Add  -->
<div class="modal fade" id="insertAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" a aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มที่อยู่จัดส่ง</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                        <span>คำนำหน้า<span class="text-danger"> *</span></span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <select name="title" id="title" class="form-control">
                            <option value="" selected disabled>เลือกคำนำหน้า</option>
                            <option value="">นาย</option>
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
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="กรุณากรอกชื่อจริง">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                        <span>นามสกุล <span class="text-danger"> *</span></span>
                    </div>
                    <div class="col-xl-9 col-12">
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="กรุณากรอกนามสกุล">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                        <span>เบอร์โทรศัพท์ <span class="text-danger"> *</span></span>
                    </div>
                    <div class="col-xl-9 col-12">
                        <input type="text" class="form-control" id="tel" name="tel" placeholder="กรุณากรอกเบอร์โทรศัพท์">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                        <span>รหัสไปรษณีย์ <span class="text-danger"> *</span></span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="กรุณากรอกรหัสไปรษณีย์" required="" oninput="setCustomValidity('')">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                        <span>จังหวัด<span class="text-danger"> *</span></span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <select name="provice" id="provice" class="form-control">
                            <option value="" selected disabled>เลือกจังหวัด</option>
                            <option value="">นครปฐม</option>
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
                        <select name="district" id="district" class="form-control">
                            <option value="" selected disabled>เลือกอำเภอ/เขต</option>
                            <option value="">กำแพงแสน</option>
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
                        <select name="subdistrict" id="subdistrict" class="form-control">
                            <option value="" selected disabled>เลือกตำบล/แขวง</option>
                            <option value="">กำแพงแสน</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                        <span>ที่อยู่ <span class="text-danger"> *</span></span>
                    </div>
                    <div class="col-xl-9 col-12">
                        <input type="text" class="form-control" id="address" name="address" placeholder="กรุณากรอกที่อยู่">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-success">เพิ่มที่อยู่จัดส่ง</button>
            </div>
        </div>
    </div>
</div>

<!-- edit  -->
<div class="modal fade" id="editAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" a aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มที่อยู่จัดส่ง</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
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
                        <input type="text" class="form-control" id="firstname" name="firstname" value="สมหมาย" placeholder="กรุณากรอกชื่อจริง">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                        <span>นามสกุล <span class="text-danger"> *</span></span>
                    </div>
                    <div class="col-xl-9 col-12">
                        <input type="text" class="form-control" id="lastname" name="lastname" value="หมายปอง" placeholder="กรุณากรอกนามสกุล">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                        <span>เบอร์โทรศัพท์ <span class="text-danger"> *</span></span>
                    </div>
                    <div class="col-xl-9 col-12">
                        <input type="text" class="form-control" id="tel" name="tel" value="089-657-1234" placeholder="กรุณากรอกเบอร์โทรศัพท์">
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
                    <div class="col-xl-3 col-12 d-flex align-items-center d-flex justify-content-end">
                        <span>ที่อยู่ <span class="text-danger"> *</span></span>
                    </div>
                    <div class="col-xl-9 col-12">
                        <input type="text" class="form-control" id="address" name="address" value="เลขที่ 1 หมู่ 6" placeholder="กรุณากรอกที่อยู่">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-success">เพิ่มที่อยู่จัดส่ง</button>
            </div>
        </div>
    </div>
</div>