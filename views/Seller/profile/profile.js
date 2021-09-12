$(document).ready(function () {
  // $("#add_bank").submit(function (e) {
  $(document).on("click", ".add_bank", function (event) {
    event.preventDefault();
    var banktype = $("#banktype").val();
    var bankname = $("#bankname").val();
    var bankcode = $("#bankcode").val();

    console.log(banktype);
    console.log(bankname);
    console.log(bankcode);

    if (bankcode.length < 10) {
      Swal.fire({
        icon: "warning",
        title: "กรุณากรอกเลขบัญชีธนาคารให้ครบ",
      });
    } else if (bankcode.length > 10) {
      Swal.fire({
        icon: "warning",
        title: "เลขบัญชีของท่านเกิน",
        Text: "กรุณากรอกใหม่",
      });
    } else {
      $.ajax({
        url: "manage.php",
        method: "POST",
        data: {
          banktype: banktype,
          bankname: bankname,
          bankcode: bankcode,
          request: "insert_bank",
        },
        datatype: "json",
        async: false,

        success: function (data) {
          // console.log(data);
          // alert(data);
          location.reload();
        },
      });
    }
  });

  $(document).on("click", ".change-passowrd", function (event) {
    event.preventDefault();

    var password_indb = $("#password_indb").val();
    var current_password = $("#current_password").val();
    var new_password = $("#new_password").val();
    var confirm_new_password = $("#confirm_new_password").val();

    console.log(current_password);
    console.log(new_password);
    console.log(confirm_new_password);
    console.log(password_indb);

    if (current_password == "") {
      Swal.fire({
        icon: "warning",
        title: "กรุณากรอกรหัสผ่านปัจจุบัน",
      });
    } else {
      if (new_password == "") {
        Swal.fire({
          icon: "warning",
          title: "กรุณากรอกรหัสผ่านใหม่",
        });
      } else {
        if (confirm_new_password == "") {
          Swal.fire({
            icon: "warning",
            title: "กรุณากรอกรหัสผ่านยืนยัน",
          });
        } else {
          if (current_password == new_password) {
            Swal.fire({
              icon: "error",
              title: "รหัสผ่านใหม่ตรงกับรหัสผ่านปัจจุบัน",
            });
          } else {
            if (new_password == confirm_new_password) {
              $.ajax({
                url: "manage.php",
                method: "POST",
                data: {
                  current_password: current_password,
                  new_password: new_password,
                  confirm_new_password: confirm_new_password,
                  request: "change_password",
                },
                datatype: "json",
                async: false,

                success: function (data) {
                  // console.log(data);
                  // alert(data);
                  location.reload();
                },
              });
            } else {
              Swal.fire({
                icon: "warning",
                title: "รหัสผ่านไม่ตรงกัน กรุณากรอกใหม่",
              });
            }
          }
        }
      }
    }
  });

  $("#uploadpic").on("change", function (e) {
    e.preventDefault();
    $.ajax({
      url: "manage.php",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      // datatype: "json",
      async: false,
      success: function (data) {
        alert(data);
        location.reload(true);
        // location.href = "./manage.php"
      },
      error: function (e) {
        $("#err").html(e).fadeIn();
      },
    });
  });
});
