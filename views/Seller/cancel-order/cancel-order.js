function acceptfunction(_id, _name, _type, _price, _count, _reason) {
  // alert(_uid + " " + _title + _firstname + " " + _lastname);
  swal(
    {
      title: "คุณต้องการยืนยันคำขอยกเลิก",
      text: `หมายเลขคำสั่งซื้อ ${_id} หรือไม่ ?`,
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-success",
      cancelButtonClass: "btn-danger",
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
            title: "ยืนยันคำขอยกเลิกสำเร็จ",
            type: "success",
            confirmButtonClass: "btn-success",
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

function cancelfunction(_id, _name, _type, _price, _count, _reason) {
  // alert(_uid + " " + _title + _firstname + " " + _lastname);
  swal(
    {
      title: "คุณต้องการลบ",
      text: `${_name} หรือไม่ ?`,
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