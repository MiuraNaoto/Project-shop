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

  $("form-insert-shipping-method").submit(function (e) {
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
        // location.reload();
        // location.href = "./manage.php";
      },
    });
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

  // $(document).on("click", ".change-passowrd", function (event) {
  //   event.preventDefault();

  //   var password_indb = $("#password_indb").val();
  //   var current_password = $("#current_password").val();
  //   var new_password = $("#new_password").val();
  //   var confirm_new_password = $("#confirm_new_password").val();

  //   console.log(current_password);
  //   console.log(new_password);
  //   console.log(confirm_new_password);
  //   console.log(password_indb);

  //   if (current_password == "") {
  //     Swal.fire({
  //       icon: "warning",
  //       title: "กรุณากรอกรหัสผ่านปัจจุบัน",
  //     });
  //   } else {
  //     if (new_password == "") {
  //       Swal.fire({
  //         icon: "warning",
  //         title: "กรุณากรอกรหัสผ่านใหม่",
  //       });
  //     } else {
  //       if (confirm_new_password == "") {
  //         Swal.fire({
  //           icon: "warning",
  //           title: "กรุณากรอกรหัสผ่านยืนยัน",
  //         });
  //       } else {
  //         if (current_password == new_password) {
  //           Swal.fire({
  //             icon: "error",
  //             title: "รหัสผ่านใหม่ตรงกับรหัสผ่านปัจจุบัน",
  //           });
  //         } else {
  //           if (new_password == confirm_new_password) {
  //             $.ajax({
  //               url: "manage.php",
  //               method: "POST",
  //               data: {
  //                 current_password: current_password,
  //                 new_password: new_password,
  //                 confirm_new_password: confirm_new_password,
  //                 request: "change_password",
  //               },
  //               datatype: "json",
  //               async: false,

  //               success: function (data) {
  //                 // console.log(data);
  //                 // alert(data);
  //                 location.reload();
  //               },
  //             });
  //           } else {
  //             Swal.fire({
  //               icon: "warning",
  //               title: "รหัสผ่านไม่ตรงกัน กรุณากรอกใหม่",
  //             });
  //           }
  //         }
  //       }
  //     }
  //   }
  // });

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

  // $(".edit-bank-account").click(function () {
  //   $("#edit-bank-modal").modal();

  //   var baid = $(this).attr("baid");
  //   var account_code = $(this).attr("account_code");
  //   var account_name = $(this).attr("account_name");
  //   var bank_id = $(this).attr("bank_id");

  //   console.log(baid);

  //   $("#e_baid").val(baid);
  //   $("#e_bankcode").val(account_code);
  //   $("#e_bankname").val(account_name);
  //   $("#e_banktype").val(bank_id);
  // });

  // $("#edit-bank").click(function () {
  //   // console.log("save");
  //   $("#e_baid").val();
  //   $("#e_bankcode").val();
  //   $("#e_bankname").val();
  //   $("#e_banktype").val();
  //   $("#request").val();
  // });
});

function selectProvince() {
  var provinceObject = document.getElementById("provice");
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
  var districtObject = document.getElementById("district");
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

function delfunction(_baid, _accountcode, _accountname) {
  // alert(_productid + " " + _code + " " + _name);
  Swal.fire({
    title: `คุณต้องการลบ ${_accountcode}`,
    text: `${_accountname} หรือไม่ ?`,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#e74a3b",
    cancelButtonColor: "#858796",
    confirmButtonText: "ยืนยัน",
    cancelButtonText: "ยกเลิก",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "ลบข้อมูลสำเร็จ",
        icon: "success",
        confirmButtonColor: "#e74a3b",
        confirmButtonText: "ยืนยัน",
      }).then((result) => {
        this.delete_1(_baid, _accountcode, _accountname);
      });
    } else {
    }
  });
}

function delete_1(_baid, _accountcode, _accountname) {
  // alert(_baid + " " + _accountcode + " " + _accountname);
  $.ajax({
    type: "POST",
    url: "manage.php",
    //data: s.concat(id),
    data: {
      baid: _baid,
      bank_code: _accountcode,
      account_name: _accountname,
      request: "delete_bank",
    },

    success: function (data) {
      location.reload();
      console.log(data);
      //location.href = "./manage.php"
    },
  });
}

function delDfunction(
  _sm_id,
  _delivery_name,
  _weight_product,
  _price_per_unit
) {
  // alert(_productid + " " + _code + " " + _name);
  Swal.fire({
    title: `คุณต้องการลบ ${_delivery_name}`,
    text: `น้ำหนัก ${_weight_product} ราคา ${_price_per_unit} หรือไม่ ?`,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#e74a3b",
    cancelButtonColor: "#858796",
    confirmButtonText: "ยืนยัน",
    cancelButtonText: "ยกเลิก",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "ลบข้อมูลสำเร็จ",
        icon: "success",
        confirmButtonColor: "#e74a3b",
        confirmButtonText: "ยืนยัน",
      }).then((result) => {
        this.delete_d_1(_sm_id);
      });
    } else {
    }
  });
}

function delete_d_1(_sm_id) {
  // alert(_baid + " " + _accountcode + " " + _accountname);
  $.ajax({
    type: "POST",
    url: "manage.php",
    //data: s.concat(id),
    data: {
      sm_id: _sm_id,
      request: "delete_d",
    },

    success: function (data) {
      location.reload();
      console.log(data);
      //location.href = "./manage.php"
    },
  });
}

function change_password(userid) {
  var current_password = $("#current_password").val();
  var new_password = $("#new_password").val();
  var confirm_new_password = $("#confirm_new_password").val();
  var uid = $("#uid").val();
  var data = {
    uid: userid,
    current_password: current_password,
    new_password: new_password,
    confirm_new_password: confirm_new_password,
    request: "change_password",
  };

  console.log(uid);
  console.log(passowrd);

  $.ajax({
    type: "POST",
    url: "manage.php",
    dataType: "json",
    contentType: "application/json; charset=utf-8",
    data: JSON.stringify(data),
    // data: {
    //  ,
    // },

    success: function (data) {
      // location.reload();
      console.log(data);
      //location.href = "./manage.php"
    },
  });
}
