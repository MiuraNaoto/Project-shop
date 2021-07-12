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
    }
</style>

<body>

    <div style="float:center;">
        <form id="sign_in" method="POST" action="sign-in-verify.php">
            <br>
            <br>
            <br>
            <br>
            <div id="login-header">
                <h4 class="text-center">ระบบขายสินค้าบนเว็บไซต์รัฐวิสาหกิจชุมชน </h4>
                <h6 class="text-center login-small">Community Enterprise Marketing System</h6>
            </div>
            <div class="container" style="margin-left:30%; margin-top: 4%;">
                <div class="row">
                    <img src="./img/icon/KU.png" style="width:31%;height:40%;margin-top:80px; padding-right: 50px;">
                    <div class="col-sm-9 col-md-7 col-lg-5">


                        <div class="card card-signin my-1">

                            <div class="card-body">
                                <form class="form-signin" method="POST" action='sign-in-verify.php'>
                                    <center>
                                        <h6>ล็อกอินเข้าสู่ระบบ</h6>
                                    </center>
                                    <br>
                                    <div class="form-label-group">
                                        <label for="inputEmail">ชื่อผู้ใช้</label>
                                        <div class="col-12" style="padding: 0px;">
                                            <input type="text" name="username" id="username" class="form-control" placeholder="username" required autofocus>
                                        </div>


                                    </div>
                                    <br>
                                    <div class="form-label-group">
                                        <label for="inputPassword">รหัสผ่าน</label>

                                        <div class="col-12" style="padding: 0px;">
                                            <input class="form-control" type="password" name="password1" id="password1" placeholder="Password" required>
                                            <i class="fa fa-eye-slash eye-setting" id="hide1"></i>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="custom-control custom-checkbox mb-1 align-self-center">
                                        <input type="checkbox" class="custom-control-input align-self-center" id="remember" name="remember">
                                        <label class="custom-control-label align-self-center" for="remember">บันทึกบัญชีผู้ใช้</label>
                                        <label style="margin-left: 20px;cursor:pointer;color: blue" id="pass_edit"> ลืมรหัสผ่าน?</label>
                                        <button class="btn btn-success btn-md" style="float:right;" type="submit">ล็อกอิน</button>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-1 align-self-center" style="padding: 0px;">
                                        <hr>
                                        <a href="index.php" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.php" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                        <hr>

                                        <div class="text-center">
                                            <a href="register.php">สมัครสมาชิก</a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>

    </div>


</body>

</html>
<!-- Modal -->
<div class="modal fade" id="ChangeModal" name="ChangeModal" tabindex="-1" role="dialog" style="margin-top: 10%;">
    <form method="post" id="formAdd" name="formAdd" action="manage.php">
        <div class="modal-dialog modal-lg" role="document" style="width: 30%">
            <div class="modal-content">
                <div class="changepass">
                    <div class="modal-header header-modal">
                        <h4 class="modal-title" style="color:white">ตั้ง Password ใหม่</h4>
                    </div>
                    <div class="modal-body" id="ChangeModalBody">
                        <div class="container">

                            <div class="row mb-4" style="margin-left: 10px">
                                <label for="inputEmail">ชื่อผู้ใช้</label>
                                <div class="col-12">
                                    <input type="text" name="username2" id="username2" class="form-control" placeholder="username" required autofocus>
                                </div>
                            </div>



                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" name="save" id="save" value="insert" class="btn btn-success save">ยืนยัน</button>
                        <button type="button" class="btn btn-danger cancel" id="a_cancel" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- <script type="text/javascript">
    var h1 = document.getElementById('hide1');
    h1.addEventListener('click', show_hide);

    function show_hide() {
        console.log("5555");

        h1.classList.toggle('active');
        if ($('#password1').attr("type") == "password") {
            $('#password1').attr('type', 'text');
            $('#hide1').removeClass("fa-eye-slash");
            $('#hide1').addClass("fa-eye");
        } else if ($('#password1').attr("type") == "text") {
            $('#password1').attr('type', 'password');
            $('#hide1').addClass("fa-eye-slash");
            $('#hide1').removeClass("fa-eye");
        }
    }
    $(document).ready(function() {
        $('#pass_edit').click(function() {

            $("#ChangeModal").modal();


        });
        $(document).on('click', '.save', function() {
            var user = document.getElementById("username2").value;
            changepassword(user);
        });
        $(document).on('click', '.cancel', function() {

            cancel();
        });

        function changepassword(username2) {

            $.ajax({
                type: "POST",

                data: {
                    username: username2
                },
                url: "view/ChangePassword/manage.php",
                async: false,

                success: function(result) {

                    $(".changepass").empty();
                    $(".changepass").append(result);
                }
            });
        }

        function cancel() {

            $.ajax({
                type: "POST",

                data: {
                    cancel: "ccc"
                },
                url: "view/ChangePassword/manage.php",
                async: false,

                success: function(result) {

                    $(".changepass").empty();
                    $(".changepass").append(result);
                }
            });
        }

    });
</script> -->

</body>

</html>