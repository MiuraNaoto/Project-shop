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
        /* background-color: #006664 !important; */
        background-color: #00766a;
        background-image: linear-gradient(180deg, #00766a 10%, #108579 100%);
        background-size: cover;
    }

    /*
    .card-signin {
        background-color: white;
    }

    #login-header {
        color: white;

    }

    .card-signin {
        align: center;
    }

    .login-small {
        float: center;
    } */
</style>

<body>
    <div class="container">
        <!-- Outer Row -->
        <div class="row d-flex justify-content-center">
            <div class="container" style="margin-top: 230px;">
                <div class="row" style="margin-left: 25%;">
                    <div class="col-xl-7 col-lg-12 col-md-12">
                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card card-signin my-1">
                                <div class="card-body">
                                    <form id="form-register" name="form-register" class="form-register" method="POST" action='register-verify.php'>
                                        <center>
                                            <h6>สมัครมาชิก</h6>
                                        </center>
                                        <br>
                                        <div class="container" id="regester1">
                                            <div class="form-label-group">
                                                <label for="inputTel">เบอร์โทรศัพท์</label>
                                                <div class="col-12" style="padding: 0px;">
                                                    <input type="text" name="tel" id="tel" maxlength="10" class="form-control" placeholder="กรุณากรอกเบอร์โทรศัพท์" autofocus required>
                                                </div>
                                            </div>
                                            <br>

                                            <button type="button" class="btn btn-success next-register" id="next-register" name="next-register" style="width: 100%;">ถัดไป</button>

                                            <div class="custom-control custom-checkbox mb-1 align-self-center" style="padding: 0px;">
                                                <hr>
                                                <a href="index.php" class="btn btn-google btn-user btn-block">
                                                    <i class="fab fa-google fa-fw"></i> Login with Google
                                                </a>
                                                <a href="index.php" class="btn btn-facebook btn-user btn-block">
                                                    <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                                </a>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="container" id="regester2">
                                            <div class="form-label-group">
                                                <label for="inputEmail">ชื่อผู้ใช้</label>
                                                <div class="col-12" style="padding: 0px;">
                                                    <input type="text" name="username" id="username" class="form-control" placeholder="กรุณากรอกชื่อบัญชี" autofocus required>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-label-group">
                                                <label for="inputPassword">รหัสผ่าน</label>

                                                <div class="col-12" style="padding: 0px;">
                                                    <input class="form-control" type="password" name="password" id="password" placeholder="กรุณากรอกรหัสผ่าน" autofocus required>
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
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1" name="customCheck1" required>
                                                <label class="custom-control-label" for="customCheck1">เงื่อนไขและข้อตกลง</label>
                                            </div>
                                            <br>
                                            <button type="button" class="btn btn-success register" id="register" name="register" style="width: 100%;">สมัครสมาชิก</button>
                                        </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="register.js"></script>
</body>

</html>