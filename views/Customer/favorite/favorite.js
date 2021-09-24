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
