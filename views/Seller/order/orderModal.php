<?php
include_once("../../../query/query.php");

$USER = $_SESSION[md5('user')];
$uid = $USER[1]["uid"];
$REASON = getAllReason();
?>

<!-- Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">หลักฐานการชำระเงิน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center" id="payment-m">

            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>

<!-- transportModal -->
<div class="modal fade" id="transportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">เพิ่มเลขพัสดุ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                        <span>บริษัทขนส่ง <span class="text-danger"> *</span></span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <select name="transport" id="transport" class="form-control">
                            <option value="" selected disabled>เลือกบริษัทขนส่ง</option>
                            <option value="">ไปรษณีย์ไทย</option>
                            <option value="">Kerry Express</option>
                            <option value="">DHL Express</option>
                            <option value="">Ninja Van</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                        <span>หมายเลขพัสดุ <span class="text-danger"> *</span></span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="track" name="track" required>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">บันทึก</button>
            </div>
        </div>
    </div>
</div>


<!-- disapproved -->
<div class="modal fade" id="disapprovedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">เหตุผลที่ไม่อนุมัติ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <form action="manage.php" method="post" enctype="multipart/form-data" id="form-disapproved" name="form-disapproved">
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>เหตุผล <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <!-- <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea> -->
                            <select name="reason" id="reason" class="form-control">
                                <option value="" selected disabled>เลือกเหตุผลที่ไม่อนุมัติ</option>
                                <?php
                                for ($i = 1; $i <  count($REASON); $i++) {
                                    echo '<option value="' . $REASON[$i]["id"] . '">' . $REASON[$i]["reason"] . '</option>';
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                    <div class="row mb-4" id="etc">
                        <div class="col-xl-3 col-12 text-right" style="align-self: center;">
                            <span>รายละเอียด</span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <textarea class="form-control" id="reason_desc" name="reason_desc" placeholder="กรุณากรอกรายละเอียด" rows="3"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" name="disapproved-modal" id="disapproved-modal" class="btn btn-success disapproved-modal">บันทึก</button>
            </div>
        </div>
    </div>
</div>

<!-- Detail Oder Modal -->
<div class="modal fade" id="detailOderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">รายละเอียดคำสั่งซื้อ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                        <span>หมายเลขคำสั่งซื้อ</span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="d_order_number" name="d_order_number" value="" disabled>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                        <span>ชื่อผู้สั่ง</span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="d_fullname" name="d_fullname" value="" disabled>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                        <span>ที่อยู่จัดส่ง</span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="d_address" name="d_address" value="" disabled>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                        <span>เบอร์โทรศัพท์</span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="d_tel" name="d_tel" value="" disabled>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                        <span>สถานะการชำระ</span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="d_status_order" name="d_status_order" value="" disabled>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                        <span>ยอดรวม</span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="d_total" name="d_total" value="" disabled>
                    </div>
                </div>
                <hr>
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                        <span>รายการสินค้า</span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" value="ชุดอิ่มคุ้ม" disabled>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                        <span>วัน-เวลาสั่งซื้อ</span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" value="11/07/2564 17:30:14	" disabled>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                        <span>วิธีการชำระเงิน</span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" value="โอนผ่านธนาคาร" disabled>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>