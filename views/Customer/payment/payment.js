$(document).ready(function () {
  // $("#insert-payment").submit(function (e) {
  $("#form-payment").submit(function (e) {
    // $(document).on("click", ".insert-payment", function (event) {
    e.preventDefault();
    var ordernumber = $("#ordernumber").val();
    var payment_method = $("#payment_method").val();
    var select_bank = $("#select_bank").val();
    var price = $("#price").val();
    var date = $("#date").val();
    var time = $("#time").val();
    var picture_payment = $("#picture-payment").val();

    console.log(ordernumber);
    console.log(payment_method);
    console.log(select_bank);
    console.log(price);
    console.log(date);
    console.log(time);
    console.log(picture_payment);

    $.ajax({
      type: "POST",
      url: "manage.php",
      //data: s.concat(id),

      data: $("form#form-payment").serialize(),

      success: function (data) {
        // location.reload();
        console.log(data);
        // location.href = "manage.php";
      },
    });
  });

  //   $(document).on("click", ".view-qrcode", function () {
  //     var product_id = $(this).attr("id");
  //     // console.log(product_id);
  //     if (product_id != "") {
  //       $.ajax({
  //         url: "manage.php",
  //         method: "POST",
  //         data: {
  //           product_id: product_id,
  //           request: "view_qrcode",
  //         },
  //         success: function (data) {
  //           // alert(data);
  //           $("#show_data_qrcode").html(data);

  //           // location.href = "manage.php";
  //         },
  //       });
  //     }
  //   });

  //   $(".edit-product").click(function () {
  //     $("#editModal").modal();
  //     var product_id = $(this).attr("product_id");
  //     var product_number = $(this).attr("product_number");
  //     var product_name = $(this).attr("product_name");
  //     var product_description = $(this).attr("product_description");
  //     var product_specification = $(this).attr("product_specification");
  //     var product_type = $(this).attr("product_type");
  //     var price = $(this).attr("price");
  //     var delivery_type = $(this).attr("delivery_type");
  //     var shipping_cost = $(this).attr("shipping_cost");
  //     var stock = $(this).attr("stock");

  //     // console.log(product_id);

  //     $("#e_product_id").val(product_id);
  //     $("#e_product_code").val(product_number);
  //     $("#e_product_name").val(product_name);
  //     $("#e_product_description").val(product_description);
  //     $("#e_product_specification").val(product_specification);
  //     $("#e_type_product").val(product_type);
  //     $("#e_price").val(price);
  //     $("#e_delivery_type").val(delivery_type);
  //     $("#e_price_transport").val(shipping_cost);
  //     $("#e_stock").val(stock);
  //   });

  //   $("#edit-product-modal").click(function () {
  //     // console.log("save");
  //     $("#e_product_id").val();
  //     $("#e_product_code").val();
  //     $("#e_product_name").val();
  //     $("#e_product_description").val();
  //     $("#e_product_specification").val();
  //     $("#e_type_product").val();
  //     $("#e_price").val();
  //     $("#e_delivery_type").val();
  //     $("#e_price_transport").val();
  //     $("#e_stock").val();
  //     $("#request").val();
  //   });
});

$("#picture-payment").on("change", function () {
  //get the file name
  var fileName = $(this).val();
  //replace the "Choose a file" label
  $(this).next(".custom-file-label").html(fileName);
});

var loadImage = function (event) {
  if (document.getElementById("picture-payment").val != "") {
    document.getElementById("propro").innerHTML =
      '<div class="col d-flex justify-content-center mb-4 mt-4" id="img-pay-pic" name="img-pay-pic" style="display:none"></div>';

    var image = document.getElementById("img-pay-pic");
    image.src = URL.createObjectURL(event.target.files[0]);
    image.innerHTML =
      '<img src="' +
      image.src +
      '" id="img-payment" name="img-payment" width="215px">';
  }
};
