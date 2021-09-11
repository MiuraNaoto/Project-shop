$(document).ready(function () {
  $("#regester2").hide();
  $(document).on("click", "#next-register", function (e) {
    var tel = $("#tel").val();
    console.log(tel.length);
    if (tel == "") {
      Swal.fire({
        icon: "warning",
        title: "กรุณากรอกเบอร์โทรศัพท์",
      });
    } else {
      if (tel.length == 10) {
        $("#regester1").hide();
        $("#regester2").show();

        $(document).on("click", "#register", function (e) {
          var username = $("#username").val();
          var password = $("#password").val();
          var password1 = $("#password1").val();
          if (username != "") {
            if (password != "") {
              if (password1 != "") {
                if (password == password1) {
                  if ($("#customCheck1").is(":checked")) {
                    // it is checked
                    console.log("--------- info register ---------");
                    console.log(tel);
                    console.log(username);
                    console.log(password);
                    console.log(password1);
                    e.preventDefault();
                    $.ajax({
                      method: "POST",
                      url: "./register-verify.php",
                      data: {
                        tel: tel,
                        username: username,
                        password: password,
                      },
                      datatype: "json",
                      cache: false,
                      success: function (data) {
                        // alert(data);
                        // location.reload();
                        location.href = "./login.php";
                      },
                    });
                  } else {
                    Swal.fire({
                      icon: "warning",
                      title: "กรุณาอ่านเงื่อนไขและข้อตกลง",
                    });
                  }
                } else {
                  Swal.fire({
                    icon: "error",
                    title: "รหัสผ่านไม่ตรงกัน",
                    // text: "กรุณากรอกรหัสผ่านอีกตรั้ง",
                  });
                }
              } else {
                Swal.fire({
                  icon: "warning",
                  title: "กรุณากรอกรหัสผ่านยืนยัน",
                });
              }
            } else {
              Swal.fire({
                icon: "warning",
                title: "กรุณากรอกรหัสผ่าน",
              });
            }
          } else {
            Swal.fire({
              icon: "warning",
              title: "กรุณากรอกชื่อบัญชีผู้ใช้",
            });
          }
        });
      } else {
        Swal.fire({
          icon: "warning",
          title: "กรุณากรอกเบอร์โทรศัพท์อีกครั้ง",
        });
      }
    }
  });
});

function autoTab2(obj, typeCheck) {
  /* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย
    หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น  รูปแบบเลขที่บัตรประชาชน
    4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
    รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____
    หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__
    ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
    */
  if (typeCheck == 1) {
    var pattern = new String("_-____-_____-_-__"); // กำหนดรูปแบบในนี้
    var pattern_ex = new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
  } else {
    var pattern = new String("___-___-____"); // กำหนดรูปแบบในนี้
    var pattern_ex = new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
  }
  var returnText = new String("");
  var obj_l = obj.value.length;
  var obj_l2 = obj_l - 1;
  for (i = 0; i < pattern.length; i++) {
    if (obj_l2 == i && pattern.charAt(i + 1) == pattern_ex) {
      returnText += obj.value + pattern_ex;
      obj.value = returnText;
    }
  }
  if (obj_l >= pattern.length) {
    obj.value = obj.value.substr(0, pattern.length);
  }
}
