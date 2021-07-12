<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>สมัครสมาชิก</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/icon/market.png" />
    <!-- SB-ADMIN -->
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
</head>
<style>
    body {
        background-color: #006664 !important;
    }

    .p-5-6 {
        padding: 1.56rem !important;
    }
</style>

<body id="page-top">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Content Wrapper -->
                <div id="content-wrapper" class="d-flex flex-column">
                    <!-- Main Content -->
                    <div id="content">
                        <div class="container-fluid">
                            <div class="p-5-6" style="padding: 0px;">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">สมัครบัญชีผู้ขายสินค้า</h1>
                                </div>
                            </div>
                            <!-- Nested Row within Card Body -->
                            <form action="views/Seller/profile/profile.php" method="post" enctype="multipart/form-data" id="editform" id="editForm" name="editform" role="form">
                                <div class="row">
                                    <div class="col-lg-5" style="margin-top: 0px;">
                                        <div class="form-group row">
                                            <div class="col mb-2" style="margin: 1px;">
                                                <h6 class="font-weight-bold mb-0 h6 text-dark">รูปภาพโลโก้ร้านค้า</h6>
                                                <span class="text-muted" style="font-size: 14px;">(โลโก้ร้านค้า เป็นรูปโลโก้หรือรูปสินค้า แต่ไม่สามารถใช้รูปบุคคลได้)</span>
                                            </div>
                                            <div class="d-flex justify-content-center mb-1">
                                                <img src="img/icon/default-image-620x600.jpg" width="35%">
                                            </div>
                                            <div class="custom-file ">
                                                <input type="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                <label>คุณมีสินค้าพร้อมจำหน่ายหรือไม่ <span class="text-danger">*</span></label>
                                                <br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input " type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                                    <label class="form-check-label" for="exampleRadios1">มีสินค้าพร้อมจำหน่าย</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                    <label class="form-check-label" for="exampleRadios2">ไม่มีสินค้าพร้อมจำหน่าย</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                <label>คุณต้องการขายสินค้าอะไร <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="product" name="product" placeholder="กรุณากรอกสินค้าที่คุณต้องการขาย" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                <label>ร้านค้าของคุณมีสินค้ากี่ชนิด <span class="text-danger">*</span></label>
                                                <label style="font-size: 12px;">(เช่น ร้านของคุณขาย เสื้อเชิ้ตแขนสั้น, เสื้อยืดพิมพ์ลาย, กางเกงยีนส์ขาตรง และกางเกงยีนส์ทรงบอย นับเป็น 4 ชนิด สินค้ารุ่นเดียวกัน ต่างสี/ไซส์ นับเป็นชนิดเดียวกัน)</label>
                                                <input type="number" class="form-control" id="amount_type_product" name="amount_type_product" placeholder="กรุณากรอกจำนวนสินค้า" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label>ชื่อ <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="กรุณากรอกชื่อ" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>นามสกุล <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="กรุณากรอกนามสกุล" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label>เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="tel" name="tel" placeholder="กรุณากรอกเบอร์โทร" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>อีเมลล์ <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="กรุณากรอกอีเมลล์" required>
                                                <!-- <div class="row">
                                                    <div class="col-lg-6" style="padding: 0px;">
                                                        <input type="text" class="form-control" id="email" name="email" placeholder="กรุณากรอกอีเมลล์" required>
                                                    </div>
                                                    <div class="col-lg-6" style="padding: 0px;">
                                                        <select id="inputState" class="form-control">
                                                            <option disabled selected>กรุณาเลือกอีเมลล์</option>
                                                            <option>@gmail.com</option>
                                                            <option>@ho.com</option>
                                                            <option>@ku.th</option>
                                                        </select>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label>พนักงานประจำร้านของคุณ <span class="text-danger">*</span></label>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="fulltime" name="fulltime" value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">มีพนักงานประจำ</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="parttime" name="parttime" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">มีพนักงงานชั่วคราว</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="none" name="none" value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">ไม่มีพนักงานขายประจำ/ชั่วคราว</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>จำนวนพนักงาน <span style="font-size: 14px;">(รวมเจ้าของร้าน)</span> <span class="text-danger">*</span></label>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-lg-8">
                                                        <input type="number" class="form-control" id="amountataff" name="amountataff" placeholder="กรุณากรอกจำนวน" required>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label> คน</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                <label>ที่อยู่ร้าน <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="address" name="address" placeholder="กรุณากรอกที่อยู่ร้าน" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label>ตำบล/แขวง <span class="text-danger">*</span></label>
                                                <select id="subdistrict" name="subdistrict" class="form-control">
                                                    <option disabled selected>กรุณาเลือกตำบล/แขวง</option>
                                                    <option>กำแพงแสน</option>
                                                    <option>ทุ่งกระพังโหม</option>
                                                    <option>วังน้ำเขียว</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>อำเภอ/เขต <span class="text-danger">*</span></label>
                                                <select iid="district" name="district" class="form-control">
                                                    <option disabled selected>กรุณาเลือกอำเภอ/เขต</option>
                                                    <option>เมือง</option>
                                                    <option>กำแพงแสน</option>
                                                    <option>นครชัยศรี</option>
                                                    <option>บางเลน</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label>จังหวัด <span class="text-danger">*</span></label>
                                                <select id="provice" name="provice" class="form-control">
                                                    <option disabled selected>กรุณาเลือกจังหวัด</option>
                                                    <option>กรุงเทพมหานคร</option>
                                                    <option>นครปฐม</option>
                                                    <option>ราชบุรี</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>รหัสไปรษณีย์ <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="กรุณากรอกรหัสไปรษณีย์" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="p-5-6" style="padding: 0px;">
                                    <div class="col-lg-12 text-right" style="padding: 0px; margin-left: 20px;">
                                        <a href="index.php"><button type="submit" class="btn btn-danger">ยกเลิก</button></a>
                                        <a href="views/Seller/profile/profile.php"><button type="submit" class="btn btn-success">สมัครสมาชิก</button></a>
                                    </div>
                                </div>
                                <!-- Scroll to Top Button-->
                                <a class="scroll-to-top rounded" href="#page-top">
                                    <i class="fas fa-angle-up"></i>
                                </a>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End of Main Content -->
        <!-- Footer -->
        <!-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Computer Engineering 2021</span>
                    </div>
                </div>
            </footer> -->
        <!-- End of Footer -->



        <!-- SB-ADMIN -->
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>
        <script src="js/demo/datatables-demo.js"></script>


        <!-- sweet alert -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->



</body>

</html>