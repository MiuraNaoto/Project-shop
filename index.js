$(document).ready(function () {
  $('.search-box input[type="text"]').on("keyup input", function () {
    /* Get input value on change */
    var inputVal = $(this).val();
    var resultDropdown = $(this).siblings(".result");
    if (inputVal.length) {
      $.get("search.php", { term: inputVal }).done(function (data) {
        // Display the returned data in browser
        resultDropdown.html(data);
      });
    } else {
      resultDropdown.empty();
    }
  });

  // Set search input value on click of result item
  $(document).on("click", ".result p", function () {
    $(this)
      .parents(".search-box")
      .find('input[type="text"]')
      .val($(this).text());
    $(this).parent(".result").empty();
  });
});

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
