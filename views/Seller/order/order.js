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

  $("#order_id").val(order_id);
  $("#order_number").val(order_number);

  $("#reason").on("change", function () {
    var reason = $(this).val();
    console.log(reason);
    if (reason == "3") {
      $("#etc").show();
    } else {
      $("#etc").hide();
    }
  });

  var reason_id = $("#reason").val();

  var formData = new FormData();
  $("#form-disapproved").submit(function () {
    console.log("save");
    console.log(order_id);
    console.log(order_number);
    console.log(reason_desc);
    $.ajax({
      type: "POST",
      url: "manage.php",
      data: $("form#form-disapproved").serialize(),

      success: function (data) {
        location.reload();
        console.log(data);
        // alert(data);
        //location.href = "./manage.php"
      },
    });
  });
}

function cancelfunction(order_id, order_number) {
  // alert(_uid + " " + _title + _firstname + " " + _lastname);
  console.log("cancel");

  Swal.fire({
    title: `คุณต้องการยกเลิกคำสั่งซื้อ`,
    text: `${order_number} หรือไม่ ?`,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#e74a3b",
    cancelButtonColor: "#858796",
    confirmButtonText: "ยืนยัน",
    cancelButtonText: "ยกเลิก",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "ยกเลิกคำสั่งซื้อสำเร็จ",
        icon: "success",
        confirmButtonColor: "#858796",
        confirmButtonText: "ยืนยัน",
      }).then((result) => {
        this.cancel_order(order_id, order_number);
      });
    } else {
    }
  });
}

function cancel_order(order_id, order_number) {
  $.ajax({
    type: "POST",
    url: "manage.php",
    data: {
      order_id: order_id,
      order_number: order_number,
      request: "cancel_order",
    },

    success: function (data) {
      location.reload();
      console.log(data);
      //location.href = "./manage.php"
    },
  });
}

function refund(order_id, order_number) {
  console.log(order_id);
  console.log(order_number);

  Swal.fire({
    title: `คุณต้องการยืนยันการคืนเงิน`,
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
        title: "ยืนยันการคืนเงินสำเร็จ",
        icon: "success",
        confirmButtonColor: "#1cc88a",
        confirmButtonText: "ยืนยัน",
      }).then((result) => {
        this.confirm_refund(order_id, order_number);
      });
    } else {
    }
  });
}

function confirm_refund(order_id, order_number) {
  $.ajax({
    type: "POST",
    url: "manage.php",
    //data: s.concat(id),
    data: {
      order_id: order_id,
      order_number: order_number,
      request: "confirm_refund",
    },

    success: function (data) {
      location.reload();
      console.log(data);
      //location.href = "./manage.php"
    },
  });
}
