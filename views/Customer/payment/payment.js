$(document).ready(function () {
  $("#form-payment").submit(function (e) {
    $.ajax({
      type: "POST",
      //data: s.concat(id),

      data: $("form#form-payment").serialize(),

      success: function (data) {
        // location.reload();
        console.log(data);
        // location.href = "manage.php";
      },
    });
  });
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
