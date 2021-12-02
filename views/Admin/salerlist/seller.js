function banfunction(_id, _username) {
  // alert(_uid + " " + _title + _firstname + " " + _lastname);
  console.log("ban: " + _id + " " + _username);

  Swal.fire({
    title: `คุณต้องการบล็อคร้านค้า ${_username} หรือไม่ ?`,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#e74a3b",
    cancelButtonColor: "#858796",
    confirmButtonText: "ยืนยัน",
    cancelButtonText: "ยกเลิก",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "บล็อคข้อมูลสำเร็จ",
        icon: "success",
        confirmButtonColor: "#e74a3b",
        confirmButtonText: "ยืนยัน",
      }).then((result) => {
        this.ban(_id, _username);
      });
    } else {
    }
  });
}

function ban(_id, _username) {
  // alert(_baid + " " + _accountcode + " " + _accountname);
  $.ajax({
    type: "POST",
    url: "manage.php",
    //data: s.concat(id),
    data: {
      shopid: _id,
      shop_name: _username,
      request: "bansaler",
    },

    success: function (data) {
      location.reload();
      // console.log(data);
      // alert(data);
      //location.href = "./manage.php"
    },
  });
}

function unbanfunction(_id, _username) {
  // alert(_uid + " " + _title + _firstname + " " + _lastname);
  console.log("unban: " + _id + " " + _username);

  Swal.fire({
    title: `คุณต้องการปลดบล็อคร้านค้า ${_username} หรือไม่ ?`,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#e74a3b",
    cancelButtonColor: "#858796",
    confirmButtonText: "ยืนยัน",
    cancelButtonText: "ยกเลิก",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "ปลดบล็อคข้อมูลสำเร็จ",
        icon: "success",
        confirmButtonColor: "#e74a3b",
        confirmButtonText: "ยืนยัน",
      }).then((result) => {
        this.unban(_id, _username);
      });
    } else {
    }
  });
}

function unban(_id, _username) {
  // alert(_baid + " " + _accountcode + " " + _accountname);
  $.ajax({
    type: "POST",
    url: "manage.php",
    //data: s.concat(id),
    data: {
      shopid: _id,
      shop_name: _username,
      request: "unbansaler",
    },

    success: function (data) {
      location.reload();
      // console.log(data);
      // alert(data);
      //location.href = "./manage.php"
    },
  });
}


function delfunction(_id, _shop, _name, _username, _star) {
  // alert(_uid + " " + _title + _firstname + " " + _lastname);
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
