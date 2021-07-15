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
            <form id="insertForm" name="insertform" role="form">
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ชื่อสินค้า<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="กรุณากรอกชื่อสินค้า" required="" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
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
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>ราคาสินค้าต่อชิ้น (บาท) <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="กรุณากรอกราคาสินค้า" required="" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                            <span>จำนวนสินค้า (ชิ้น) <span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                            <input type="number" class="form-control" id="count" name="count" placeholder="กรุณากรอกจำนวนสินค้า" required="" oninput="setCustomValidity('')">
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

                </div>
                <div class="modal-footer">
                    <input type="hidden" id="hidden_id" name="request" value="insertUser" />
                    <button type="submit" class="btn btn-danger" data-dismiss="modal" style="width: 70px;">ยกเลิก</button>
                    <button type="submit" id="insert" name="insert" class="btn btn-success" style="width: 70px;">เพิ่ม</button>
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