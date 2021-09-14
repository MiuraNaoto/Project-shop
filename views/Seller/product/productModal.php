<?php
include_once("../../../query/query.php");

$USER = $_SESSION[md5('user')];
$uid = $USER[1]["uid"];
$PRODUCT_TYPE = getProductType();
$DELIVERY_TYPE = getDeliveryType();
?>

<!-- SHOW QR-CODE Modal -->
<div class="modal fade" id="showQRcodeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">QR-CODE สินค้า</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="showForm" name="showForm" role="form">
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <img src="../../../img/qr-code/testqr.png" width="100%">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <div class="row mb-4">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                                    <span>รหัสสินค้า</span>
                                </div>
                                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                                    <input type="text" class="form-control" value="654981" disabled>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                                    <span>ประเภทสินค้า</span>
                                </div>
                                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                                    <input type="text" class="form-control" value="อาหาร" disabled>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                                    <span>ชื่อสินค้า</span>
                                </div>
                                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                                    <input type="text" class="form-control" value="ชุดอิ่มคุ้ม" disabled>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                                    <span>ราคาต่อชิ้น</span>
                                </div>
                                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                                    <input type="text" class="form-control" value="120.00" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="hidden_id" name="request" value="insertUser" />
                    <button type="submit" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" id="insert" name="insert" class="btn btn-primary">พิมพ์ QR-CODE สินค้า</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ADDModal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลสินค้า</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="manage.php" method="post" enctype="multipart/form-data" id="form-insert-product" name="form-insert-product">
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>รหัสสินค้า<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="product_code" name="product_code" placeholder="กรุณากรอกรหัสสินค้า" required oninvalid="this.setCustomValidity('กรุณากรอกรหัสสินค้า')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ชื่อสินค้า<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="กรุณากรอกชื่อสินค้า" required oninvalid="this.setCustomValidity('กรุณากรอกชื่อสินค้า')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>รายละเอียดสินค้า<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <textarea class="form-control" id="product_description" name="product_description" placeholder="กรุณากรอกรายละเอียดสินค้า" required oninvalid="this.setCustomValidity('กรุณากรอกรายละเอียดสินค้า')" oninput="this.setCustomValidity('')"></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ข้อมูลจำเพาะสินค้า<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <textarea class="form-control" id="product_specification" name="product_specification" placeholder="กรุณากรอกข้อมูลจำเพาะสินค้า" required oninvalid="this.setCustomValidity('กรุณากรอกข้อมูลจำเพาะสินค้า')" oninput="this.setCustomValidity('')"></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ประเภทสินค้า<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <select name="type_product" id="type_product" class="form-control" required oninvalid="this.setCustomValidity('กรุณาเลือกประเภทสินค้า')" oninput="this.setCustomValidity('')">
                                <option value="">กรุณาเลือกประเภทสินค้า</option>
                                <?php
                                for ($i = 1; $i < count($PRODUCT_TYPE); $i++) {
                                    echo '<option value="' . $PRODUCT_TYPE[$i]["id"] . '">' . $PRODUCT_TYPE[$i]["type"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ราคาสินค้าต่อชิ้น (บาท) <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="กรุณากรอกราคาสินค้า" required oninvalid="this.setCustomValidity('กรุณากรอกรหัสสินค้า')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>จำนวนสินค้า (ชิ้น) <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="number" class="form-control" id="stock" name="stock" placeholder="กรุณากรอกจำนวนสินค้า" required oninvalid="this.setCustomValidity('กรุณากรอกรหัสสินค้า')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ประเภทการจัดส่ง<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <select name="delivery_type" id="delivery_type" class="form-control" required oninvalid="this.setCustomValidity('กรุณาเลือกประเภทการจัดส่ง')" oninput="this.setCustomValidity('')">
                                <option value="">กรุณาเลือกประเภทการจัดส่ง</option>
                                <?php
                                for ($i = 1; $i < count($DELIVERY_TYPE); $i++) {
                                    echo '<option value="' . $DELIVERY_TYPE[$i]["id"] . '">' . $DELIVERY_TYPE[$i]["delivery_name"] . '</option>';
                                }

                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ค่าจัดส่งสินค้า (บาท) <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="number" step="0.01" class="form-control" id="price_transport" name="price_transport" placeholder="กรุณากรอกราคาค่าจัดส่งสินค้าสินค้า" required oninvalid="this.setCustomValidity('กรุณากรอกรหัสสินค้า')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ภาพปกสินค้า<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <span id="propro"></span>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="profile-product" name="profile-product" accept="image/png, image/jpeg, image/jpg" onchange="loadImage(event)" required oninvalid="this.setCustomValidity('กรุณากรอกรหัสสินค้า')" oninput="this.setCustomValidity('')">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ภาพสินค้า<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <span id="picpro"></span>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="picture-product" name="picture-product[]" accept="image/png, image/jpeg, image/jpg" multiple required oninvalid="this.setCustomValidity('กรุณากรอกรหัสสินค้า')" oninput="this.setCustomValidity('')">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" id="request" name="request" value="insert_product" />
                    <button type="submit" class="btn btn-danger" data-dismiss="modal" style="width: 70px;">ยกเลิก</button>
                    <button type="submit" id="insert" name="insert" class="btn btn-success insert-product">เพิ่มสินค้า</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" a aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลสินค้า</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="manage.php" method="post" enctype="multipart/form-data" id="editform" id="editForm" name="editform" role="form">

                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ชื่อสินค้า<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="กรุณากรอกชื่อสินค้า" value="ชุดสุดคุ้ม" required="" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ประเภทสินค้า<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <select name="type_product" id="type_product" class="form-control">
                                <option value="">เลือกประเภทสินค้า</option>
                                <option value="" selected>อาหาร</option>
                                <option value="">เครื่องดื่ม</option>
                                <option value="">ของใช้</option>
                                <option value="">เครื่องนุ่งห่ม</option>
                                <option value="">สมุนไพร</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ราคาสินค้าต่อชิ้น (บาท)<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="กรุณากรอกราคาสินค้า" value="120.00" required="" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ค่าจัดส่งสินค้า (บาท) <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="number" step="0.01" class="form-control" id="price_transport" name="price_transport" placeholder="กรุณากรอกราคาค่าจัดส่งสินค้าสินค้า" value="45.00" required="" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>จำนวนสินค้า (ชิ้น)<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="number" class="form-control" id="count" name="count" placeholder="กรุณากรอกจำนวนสินค้า" value="650" required="" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>รูปสินค้า<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 d-flex justify-content-center d-flex align-items-center">
                            <img src="../../../img/product/Seller/bags.png" width="150" height="150">
                        </div>
                        <div class="col-lg-3 d-flex justify-content-center d-flex align-items-center">
                            <img src="../../../img/product/Seller/clothes-hanger.png" width="150" height="150">
                        </div>
                        <div class="col-lg-3 d-flex justify-content-center d-flex align-items-center">
                            <img src="../../../img/product/Seller/fast-food.png" width="150" height="150">
                        </div>
                        <div class="col-lg-3 d-flex justify-content-center d-flex align-items-center">
                            <img src="../../../img/product/Seller/drink.png" width="150" height="150">
                        </div>


                    </div>
                    <input type="hidden" name="e_time" id="e_time" />
                </div>

                <div class="modal-footer">
                    <input type="hidden" id="hidden_id" name="request" value="edit" />
                    <button type="submit" id="edit" class="btn btn-danger" data-dismiss="modal" style="width: 70px;">ยกเลิก</button>
                    <button type="submit" id="editsub" name="editsub" class="btn btn-success" style="width: 70px;">แก้ไข</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Show -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลสินค้า</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="insertForm" name="insertform" role="form">
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right">
                            <span>ชื่อสินค้า<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="กรุณากรอกชื่อสินค้า" required="" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right">
                            <span>ประเภทสินค้า<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <select name="type_product" id="type_product" class="form-control">
                                <option value="">เลือกประเภทสินค้า</option>
                                <option value="">อาหาร</option>
                                <option value="">เครื่องดื่ม</option>
                                <option value="">ของใช้</option>
                                <option value="">เครื่องนุ่งห่ม</option>
                                <option value="">สมุนไพร</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right">
                            <span>ราคาสินค้า<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="กรุณากรอกราคาสินค้า" required="" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right">
                            <span>จำนวนสินค้า<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="number" class="form-control" id="count" name="count" placeholder="กรุณากรอกจำนวนสินค้า" required="" oninput="setCustomValidity('')">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="hidden_id" name="request" value="insertUser" />
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="insert" name="insert" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>