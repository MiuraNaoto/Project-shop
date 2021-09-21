function payment(productId, shopId) {
  quantity = $("#quantity").val();
  var total = $("#total_price span").text().trim();
  console.log("Add complet...");
  console.log(total);
  console.log(productId);
  console.log(quantity);
  $.ajax({
    type: "POST",
    url: "manage.php",
    //data: s.concat(id),
    data: {
      product_id: productId,
      shop_id: shopId,
      quantity: quantity,
      request: "order_detal",
    },

    success: function (data) {
      //   location.reload();
      console.log(data);
      location.href = "../payment/payment.php";
    },
  });
}
