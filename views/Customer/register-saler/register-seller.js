$(document).ready(function () {
  // $(document).on("click", "#register-saler", function (e) {
  $("register-saler-form").submit(function (e) {
    e.preventDefault();

    $.ajax({
      url: "register-seller-verify.php",
      method: "POST",
      data: { formdata: formdata },
      datatype: "json",
      async: false,
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        alert(data);
        // location.reload();
        location.href = "register-seller-verify.php";
      },
    });
  });
});

$("#shop-profile-img").on("change", function () {
  //get the file name
  var fileName = $(this).val();
  //replace the "Choose a file" label
  $(this).next(".custom-file-label").html(fileName);
});

var loadImage = function (event) {
  var image = document.getElementById("img-shop-profile");
  image.src = URL.createObjectURL(event.target.files[0]);
};

$(".js-example-tokenizer").select2({
  tags: true,
  tokenSeparators: [",", " "],
  placeholder: "กรุณาเลือกต้องการขายสินค้าที่ต้องการขาย",
  allowClear: true,
});
