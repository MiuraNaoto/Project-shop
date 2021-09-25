var daid;

function payment(obj, total_unit) {
  // quantity = $("#quantity").val();
  var total = $("#total_price span").text().trim();
  console.log("Add complet...");
  console.log("total: "+total);
  console.log("productId: "+obj[1]['product_id']);
  console.log("total_unit: "+total_unit);
  console.log("quantity: "+obj[1]['quantity']);
  console.log("daid: "+daid);
  if (daid == null) {
    Swal.fire({
      icon: "warning",
      title: "กรุณาเลือกที่อยู่จัดส่ง",
    });
  } else {
    $.ajax({
      type: "POST",
      url: "manage.php",
      //data: s.concat(id),

      data: {
        obj: obj,
        daid: daid,
        total: total,
        total_unit: total_unit,
        request: "order_detal",
      },

      success: function (data) {
        // location.reload();
        console.log(data);
        // location.href = "../payment/payment.php";
      },
    });
  }
}

function selected_add(in_daid) {
  // console.log(daid)
  daid = in_daid;
  console.log(daid);
}
