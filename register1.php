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
                                    <form class="form-signin" method="POST" action='sign-in-verify.php'>
                                        <center>
                                            <h6>สมัครมาชิก</h6>
                                        </center>
                                        <br>
                                        <div class="form-label-group">
                                            <label for="inputEmail">เบอร์โทรศัพท์</label>
                                            <div class="col-12" style="padding: 0px;">
                                                <input type="text" name="tel" id="tel" class="form-control" placeholder="กรุณากรอกเบอร์โทรศัพท์" required autofocus>
                                            </div>
                                        </div>
                                        <br>

                                        <button type="submit" class="btn btn-success" style="width: 100%;" type="submit">ถัดไป</button>

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