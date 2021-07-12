<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>เข้าสู่ระบบ</title>
    <link rel="icon" type="image/png" href="./img/icon/market.png" />
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<style>
    body {
        background-color: #006664 !important;
    }
</style>

<body>
    <div class="container">
        <!-- Outer Row -->
        <div class="row d-flex justify-content-center">
            <div class="container" style="margin-top: 160px;">
                <div class="row" style="margin-left: 25%;">
                    <div class="col-xl-7 col-lg-12 col-md-12">
                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card card-signin my-1">
                                <div class="card-body">
                                    <form class="form-signin" method="POST" action='login.php'>
                                        <center>
                                            <h6>สมัครมาชิก</h6>
                                            <br>
                                        </center>
                                        <div class="form-label-group">
                                            <label for="inputEmail">ชื่อผู้ใช้</label>
                                            <div class="col-12" style="padding: 0px;">
                                                <input type="text" name="username" id="username" class="form-control" placeholder="กรุณากรอกชื่อบัญชี" required autofocus>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-label-group">
                                            <label for="inputPassword">รหัสผ่าน</label>

                                            <div class="col-12" style="padding: 0px;">
                                                <input class="form-control" type="password" name="password1" id="password1" placeholder="กรุณากรอกรหัสผ่าน" required>
                                                <!-- <i class="fa fa-eye-slash eye-setting" id="hide1"></i> -->
                                            </div>

                                        </div>
                                        <br>
                                        <div class="form-label-group">
                                            <label for="inputPassword">ยืนยันรหัสผ่าน</label>
                                            <div class="col-12" style="padding: 0px;">
                                                <input class="form-control" type="password" name="password1" id="password1" placeholder="กรุณากรอกรหัสผ่านยืนยัน" required>
                                                <!-- <i class="fa fa-eye-slash eye-setting" id="hide1"></i> -->
                                            </div>

                                        </div>
                                        <br>

                                        <button type="submit" class="btn btn-success" style="width: 100%;" type="submit">สมัครสมาชิก</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>