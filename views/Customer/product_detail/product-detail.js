function addToCart(productId, shopId) {
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
      // console.log(data);
      //location.href = "./manage.php"
    },
  });
}

function favouriteP(productId) {
  console.log("favourite");
  $.ajax({
    type: "POST",
    url: "manage.php",
    data: {
      product_id: productId,
      request: "favourite",
    },

    success: function (data) {
      location.reload();
      console.log(data);  
      //location.href = "./manage.php"
    },
  });
}
