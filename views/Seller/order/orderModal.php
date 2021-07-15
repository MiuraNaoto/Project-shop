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
            <div class="modal-body text-center">
                <img src="../../../img/payment/bill/transfer-6.png" width="75%" />
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
                <h5 class="modal-title" id="exampleModalCenterTitle">หลักฐานการชำระเงิน</h5>
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
                        <input type="text" class="form-control" value="2103254" disabled>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                        <span>คำนำหน้า</span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <select name="title" id="title" class="form-control" disabled>
                            <option value="">เลือกคำนำหน้า</option>
                            <option value="" selected>นาย</option>
                            <option value="">นาง</option>
                            <option value="">นางสาว</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                        <span>ชื่อ</span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" value="ก" disabled>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                        <span>นามสกุล</span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" value="ขคง" disabled>
                    </div>
                </div>
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
                        <span>ยอดรวม</span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" value="2,400.00" disabled>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                        <span>ที่อยู่จัดส่ง</span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" value="1 หมู่ 6 ต.กำแพงแสน อ.กำแพงแสน จ.นครปฐม 73140" disabled>
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
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                        <span>สถานะการชำระ</span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" value="กำลังตรวจสอบ" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>