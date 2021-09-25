$(document).ready(function () {
  $(".detail-order").click(function () {
    $("#detailOderModal").modal();
    var order_number = $(this).attr("order_number");
    var fullname = $(this).attr("fullname");
    var address = $(this).attr("address");
    var tel = $(this).attr("tel");
    var status_order = $(this).attr("status_order");
    var total = $(this).attr("total");

    $("#d_order_number").val(order_number);
    $("#d_fullname").val(fullname);
    $("#d_address").val(address);
    $("#d_tel").val(tel);
    $("#d_status_order").val(status_order);
    $("#d_total").val(total);
  });

  $(".payment").click(function () {
    $("#paymentModal").modal();
    var payment = $(this).attr("payment");
    console.log(payment);
    document.getElementById("payment-m").innerHTML =
      '<img src="../../../img/payment/bill/' + payment + '" width="75%" />';
  });
});

function cancelfunction(_id, _name, _type, _price, _count) {
  // alert(_uid + " " + _title + _firstname + " " + _lastname);
  console.log("cancel");

  swal(
    {
      title: "คุณต้องการยกเลิกคำสั่งซื้อ",
      text: `${_id} หรือไม่ ?`,
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

function approved(order_id, order_number) {
  console.log(order_id);
  console.log(order_number);

  Swal.fire({
    title: `คุณต้องการยืนยันคำสั่งซื้อ`,
    text: `${order_number} หรือไม่ ?`,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#1cc88a",
    cancelButtonColor: "#858796",
    confirmButtonText: "ยืนยัน",
    cancelButtonText: "ยกเลิก",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "ยืนยันคำสั่งซื้อสำเร็จ",
        icon: "success",
        confirmButtonColor: "#1cc88a",
        confirmButtonText: "ยืนยัน",
      }).then((result) => {
        this.confirm_order(order_id, order_number);
      });
    } else {
    }
  });
}

function confirm_order(order_id, order_number) {
  $.ajax({
    type: "POST",
    url: "manage.php",
    //data: s.concat(id),
    data: {
      order_id: order_id,
      order_number: order_number,
      request: "confirm_order",
    },

    success: function (data) {
      location.reload();
      console.log(data);
      //location.href = "./manage.php"
    },
  });
}

function disapproved(order_id, order_number) {
  $("#etc").hide();

  $("#reason").on("change", function () {
    var reason = $(this).val();
    console.log(reason);
    if (reason == "3") {
      $("#etc").show();
    } else {
      $("#etc").hide();
    }
  });

  

  $("#disapproved-modal").click(function () {
    console.log("save");
    console.log(order_id);
    console.log(order_number);
    console.log(reason_desc);

    $.ajax({
      type: "POST",
      url: "manage.php",
      data: {
        order_id: order_id,
        order_number: order_number,
        reason_desc: reason_desc,
        request: "disapproved_order",
      },

      success: function (data) {
        // location.reload();
        console.log(data);
        //location.href = "./manage.php"
      },
    });
  });
}
