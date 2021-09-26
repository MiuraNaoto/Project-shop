$(document).ready(function () {

  $("#form-checkout").submit(function () {
    $.ajax({
      type: "POST",
      data: $("form#form-checkout").serialize(),
      success: function (data) {
        // location.reload();
        console.log(data);
        // location.href = "../payment/payment.php";
        // location.href = "manage.php";
      },
    });
  });
});

function order(obj, total_unit) {
  var total = $("#total_price span").text().trim();
  // console.log("Add complet...");
  // console.log("total: " + total);
  // console.log("productId: " + obj[1]["product_id"]);
  // console.log("total_unit: " + total_unit);
  // console.log("quantity: " + obj[1]["quantity"]);

  $('[name="order_details"]').val( JSON.stringify( obj ) );
  $('[name="total_units"]').val( JSON.stringify( total_unit ) );
  $('[name="total"]').val( JSON.stringify( total ) );
}
