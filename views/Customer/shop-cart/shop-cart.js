$(document).ready(function () {
  $("#pro-qty").on("click", function (e) {
    var quantity = $("#quantity").val();

    var price = $("#cart__price tr td").text();
    // $("#cart__total ").innerHTML =
    //   '<td class="cart__total" id="cart__total" name="cart__total">' +
    //   quantity * price +
    //   "</td>";
    console.log(quantity);
    console.log(price);
  });
});

function updateCart(productId, shopId) {
  quantity = $("#quantity").val();
  console.log("Add complet...");
  console.log(productId);
  console.log(shopId);
  console.log(quantity);
  $.ajax({
    type: "POST",
    url: "manage.php",
    //data: s.concat(id),
    data: {
      product_id: productId,
      shop_id: shopId,
      quantity: quantity,
      request: "shopping_cart",
    },

    success: function (data) {
      location.reload();
      console.log(data);
      //location.href = "./manage.php"
    },
  });
}


