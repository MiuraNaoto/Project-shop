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

  // $(document).on("click", ".edit-profile", function (event) {
  $("form-edit-profile").submit(function (e) {
    event.preventDefault();
    var formdata = new FormData();
    // var e_shop_name = $("#e_shop_name").val();
    // var e_title = $("#e_title").val();
    // var e_firstname = $("#e_firstname").val();
    // var e_lastname = $("#e_lastname").val();
    // var e_tel = $("#e_tel").val();
    // var e_email = $("#e_email").val();
    // var e_username = $("#e_username").val();
    // var e_address = $("#e_address").val();
    // var e_provice = $("#e_provice").val();
    // var e_district = $("#e_district").val();
    // var e_subdistrict = $("#e_subdistrict").val();
    // var e_time_opened = $("#e_time_opened").val();
    // var e_time_closed = $("#e_time_closed").val();
    // var e_amount_staff = $("#e_amount_staff").val();
    // var e_fulltime = $("#e_fulltime").val();
    // var e_parttime = $("#e_parttime").val();
    // var e_none = $("#e_none").val();

    $.ajax({
      url: "manage.php",
      method: "POST",
      data: { formdata: formdata },
      datatype: "json",
      async: false,
      success: function (data) {
        console.log(data);
        alert(data);
        location.reload();
        // location.href = "./manage.php";
      },
    });
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
        // alert(data);
        location.reload(true);
        // location.href = "./manage.php"
      },
      error: function (e) {
        $("#err").html(e).fadeIn();
      },
    });
  });
});

function selectProvince() {
  var districtObject = document.getElementById("district");
  var subdistrictObject = document.getElementById("subdistrict");
  var provinceId = document.getElementById("provice").value;
  // console.log(provinceId)

  districtObject.innerHTML = '<option value="" >กรุณาเลือกอำเภอ/เขต</option>';
  subdistrictObject.innerHTML =
    '<option value="" >กรุณาเลือกตำบล/แขวง</option>';
  $.get("./districts.php?province_id=" + provinceId, function (data) {
    // console.log(data)
    var result = JSON.parse(data);
    // console.log(result);
    $.each(result, function (index, item) {
      // console.log(item)
      if (index != 0) {
        districtObject.innerHTML +=
          "<option value='" +
          item.id +
          "'> " +
          item.districts_name_in_thai +
          "</option>";
      }
    });
  });
}

function selectDistrict() {
  var subdistrictObject = document.getElementById("subdistrict");
  var districtId = document.getElementById("district").value;
  // console.log(provinceId)

  subdistrictObject.innerHTML =
    '<option value="" >กรุณาเลือกตำบล/แขวง</option>';
  $.get("./sub-districts.php?district_id=" + districtId, function (data) {
    // console.log(data)
    var result = JSON.parse(data);
    // console.log(result);
    $.each(result, function (index, item) {
      // console.log(item)
      if (index != 0) {
        subdistrictObject.innerHTML +=
          "<option value='" +
          item.id +
          "'> " +
          item.subdistricts_name_in_thai +
          "</option>";
      }
    });
  });
}
