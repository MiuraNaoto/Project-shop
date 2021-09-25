<?php
include_once("../../../query/query.php");

$USER = $_SESSION[md5('user')];
$uid = $USER[1]["uid"];
$REASON = getAllReason();
$DELIVERY = getAllDelivery();
?>

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
            <form action="manage.php" method="post" enctype="multipart/form-data" id="form-delivery" name="form-delivery" role="form">
                <div class="modal-body text-center">
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>บริษัทขนส่ง <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <select name="transport" id="transport" class="form-control" required>
                                <option value="" selected disabled>เลือกบริษัทขนส่ง</option>
                                <?php
                                for ($i = 1; $i < count($DELIVERY); $i++) {
                                    echo '<option value="' . $DELIVERY[$i]["id"] . '">' . $DELIVERY[$i]["delivery_name"] . '</option>';
                                }
                                ?>
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
                    <input type="hidden" id="request" name="request" value="insert_delivery" />
                    <input type="hidden" id="order_id" name="order_id" value="" />
                    <input type="hidden" id="order_number" name="order_number" value="" />
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>