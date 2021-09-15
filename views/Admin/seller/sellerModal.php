<?php
include_once("./query.php");
$id = $_POST['sid'];
?>
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
                            <input type="text" class="form-control" id="tel" name="tel" placeholder="กรุณากรอกชื่อ" value="098-765-4321" required="" oninput="setCustomValidity('')">
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
                            <span>คะแนนความพึงพอใจ <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="username" name="username" placeholder="กรุณากรอกชื่อบัญชี" value="65" required="" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>วันที่สมัครสมาชิก </span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="username" name="username" placeholder="กรุณากรอกชื่อบัญชี" value="11/07/2564 17:30:14" required="" oninput="setCustomValidity('')" disabled>
                        </div>
                    </div>
                    <!-- <div class="row mb-4">
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
                    </div> -->
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

<div class="modal fade" id="blockSaler" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Block Saler</h4>
            </div>

            <div class="modal-body">
                Do you want to block saler name <b style="color: red;"></b> ?

                <input type="text" id="sidBlock" name="sidBlock" hidden />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info btn" data-dismiss="modal" style="background: red; border-color:red">Cancel</button>
                <button type="button" id="block" name="block" class="btn btn-info btn" data-dismiss="modal" style="width: 17%; background:yellowgreen; border-color:yellowgreen" data-toggle="modal" data-target="#successBlock" onclick="confirmBlock()">Yes</button>
            </div>

        </div>

    </div>
</div>

<div class="modal fade" id="unblockSaler" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Unblock Saler</h4>
            </div>

            <div class="modal-body">
                Do you want to unblock saler name <b style="color: red;"></b> ?

                <input type="text" id="sidUnblock" name="sidUnblock" hidden />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info btn" data-dismiss="modal" style="background: red; border-color:red">Cancel</button>
                <button type="button" class="btn btn-info btn" data-dismiss="modal" style="width: 17%; background:yellowgreen; border-color:yellowgreen" data-toggle="modal" data-target="#successUnblock" onclick="confirmUnblock()">Yes</button>
            </div>

        </div>

    </div>
</div>

<div class="modal fade" id="delSaler" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Seler</h4>
            </div>
            <div class="modal-body" id="delModal">
                Do you want to delete saler name <b style="color: red;"></b> ?
                <input type="text" id="sidDel" name="sidDel" hidden />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info btn" data-dismiss="modal" style="background: red; border-color:red">Cancel</button>
                <button type="button" class="btn btn-info btn" data-dismiss="modal" style="width: 17%; background:yellowgreen; border-color:yellowgreen" data-toggle="modal" data-target="#successDelete" onclick="confirmDelete()">Yes</button>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="successBlock" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Success</h4>
            </div>
            <div class="modal-body" id="delModal">
                <p><b>Block saler sucessfully.</b></p>
            </div>
            <button type="button" class="btn btn-info btn" data-dismiss="modal" style="background: yellowgreen; border-color:yellowgreen" onclick="reload()">OK</button>
        </div>
    </div>
</div>

<div class="modal fade" id="successUnblock" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Success</h4>
            </div>
            <div class="modal-body" id="delModal">
                <p><b>Unblock saler sucessfully.</b></p>
            </div>
            <button type="button" class="btn btn-info btn" data-dismiss="modal" style="background: yellowgreen; border-color:yellowgreen" onclick="reload()">OK</button>
        </div>
    </div>
</div>

<div class="modal fade" id="successDelete" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Success</h4>
            </div>
            <div class="modal-body" id="delModal">
                <p><b>Delete saler sucessfully.</b></p>
            </div>
            <button type="button" class="btn btn-info btn" data-dismiss="modal" style="background: yellowgreen; border-color:yellowgreen" onclick="reload()">OK</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    function reload() {
        location.reload();
    }


    function confirmBlock() {
        var id = document.getElementById('sidBlock').value

        $.ajax({
            url: 'query.php',
            type: 'POST',
            data: {
                id: id,
                call: "blockSaler",
            },
            success: function(data) {
                console.log(data); // Inspect this in your console
                $("#successBlock").modal(show);

            }
        });
    }

    function confirmUnblock() {
        var id = document.getElementById('sidUnblock').value

        $.ajax({
            url: 'query.php',
            type: 'POST',
            data: {
                id: id,
                call: "unblockSaler",
            },
            success: function(data) {
                console.log(data); // Inspect this in your console
                $("#successUnblock").modal(show);
            }
        });
    }

    function confirmDelete() {
        var id = document.getElementById('sidDel').value

        $.ajax({
            url: 'query.php',
            type: 'POST',
            data: {
                id: id,
                call: "deleteSaler",
            },
            success: function(data) {
                console.log(data); // Inspect this in your console
                $("#successDelete").modal(show);
            }
        });
    }
</script>