function banfunction(_id, _username) {
  // alert(_uid + " " + _title + _firstname + " " + _lastname);
  console.log("ban: " + _id + " " + _username);

  Swal.fire({
    title: `คุณต้องการบล็อค ${_username} หรือไม่ ?`,
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
      uid: _id,
      username: _username,
      request: "banuser",
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
    title: `คุณต้องการปลดบล็อค ${_username} หรือไม่ ?`,
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
      uid: _id,
      username: _username,
      request: "unbanuser",
    },

    success: function (data) {
      location.reload();
      // console.log(data);
      // alert(data);
      //location.href = "./manage.php"
    },
  });
}

function delfunction(_id, _username) {
  // alert(_uid + " " + _title + _firstname + " " + _lastname);
  console.log("delete: " + _id + " " + _username);

  Swal.fire({
    title: `คุณต้องการลบผู้ใช้ ${_username} หรือไม่ ?`,
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
        this.delete1(_id, _username);
      });
    } else {
    }
  });
}

function delete1(_id, _username) {
  // alert(_baid + " " + _accountcode + " " + _accountname);
  $.ajax({
    type: "POST",
    url: "manage.php",
    //data: s.concat(id),
    data: {
      uid: _id,
      username: _username,
      request: "deleteuser",
    },

    success: function (data) {
      location.reload();
      // console.log(data);
      alert(data);
      //location.href = "./manage.php"
    },
  });
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
