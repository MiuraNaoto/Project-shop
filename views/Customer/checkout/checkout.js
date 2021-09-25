var daid;

function payment(obj, shopId) {
  // quantity = $("#quantity").val();
  var total = $("#total_price span").text().trim();
  // console.log("Add complet...");
  // console.log("total: "+total);
  // console.log("productId: "+obj[1]['product_id']);
  // console.log("shopId: "+shopId);
  // console.log("quantity: "+obj[1]['quantity']);
  // console.log("daid: "+daid);
  $.ajax({
    type: "POST",
    url: "manage.php",
    //data: s.concat(id),
    
    data: {
      obj: obj,
      daid: daid,
      total: total,
      shopId: shopId,
      request: "order_detal",
    },

    success: function (data) {
      // location.reload();
      console.log(data);
      location.href = "../payment/payment.php";
    },
  });
}

function selected_add(in_daid) {
  // console.log(daid)
  daid = in_daid
}
