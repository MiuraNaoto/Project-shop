function banfunction(_id, _shop, _name, _username, _star) {
  // alert(_uid + " " + _title + _firstname + " " + _lastname);
  console.log(
    "ban: " + _id + " " + _shop + " " + _name + " " + _username + " " + _star
  );
  swal(
    {
      title: "ยืนยันการบล็อกบัญชีนี้ใช่หรือไม่?",
      //   text: `${_shop} หรือไม่ ?`,
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      cancelButtonClass: "btn-secondary",
      confirmButtonText: "ยืนยัน",
      cancelButtonText: "ยกเลิก",
      closeOnConfirm: false,
      closeOnCancel: function () {
        $("[data-toggle=tooltip]").tooltip({
          boundary: "window",
          trigger: "hover",
        });
        return true;
      },
    },
    function (isConfirm) {
      if (isConfirm) {
        console.log(1);
        swal(
          {
            title: "ลบข้อมูลสำเร็จ",
            type: "success",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "ตกลง",
            closeOnConfirm: false,
          }
          //   function (isConfirm) {
          //     if (isConfirm) {
          //       delete_1(_uid, _title, _firstname, _lastname);
          //     }
          //   }
        );
      } else {
      }
    }
  );
}

function delfunction(_id, _shop, _name, _username, _star) {
  // alert(_uid + " " + _title + _firstname + " " + _lastname);
  console.log(
    "delete: " + _id + " " + _shop + " " + _name + " " + _username + " " + _star
  );
  swal(
    {
      title: "ยืนยันการลบบัญชีนี้ใช่หรือไม่?",
      text: `${_shop} หรือไม่ ?`,
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      cancelButtonClass: "btn-secondary",
      confirmButtonText: "ยืนยัน",
      cancelButtonText: "ยกเลิก",
      closeOnConfirm: false,
      closeOnCancel: function () {
        $("[data-toggle=tooltip]").tooltip({
          boundary: "window",
          trigger: "hover",
        });
        return true;
      },
    },
    function (isConfirm) {
      if (isConfirm) {
        console.log(1);
        swal(
          {
            title: "ลบข้อมูลสำเร็จ",
            type: "success",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "ตกลง",
            closeOnConfirm: false,
          }
          //   function (isConfirm) {
          //     if (isConfirm) {
          //       delete_1(_uid, _title, _firstname, _lastname);
          //     }
          //   }
        );
      } else {
      }
    }
  );
}

$(document).ready(function () {
  $(document).on("click", ".btn_province", function () {
    var uid = $(this).attr("id");
    // console.log(uid);
    if (uid != "") {
      $.ajax({
        url: "manage.php",
        method: "POST",
        data: {
          uid: uid,
          request: "show_address",
        },
        success: function (data) {
          // alert(data);
          $("#show_data_address").html(data);

          // location.href = "manage.php";
        },
      });
    }
  });
});
