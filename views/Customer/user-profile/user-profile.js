$(document).ready(function () {
  //   $(document).on("click", "#add_address", function (e) {
  $("form-insert-address").submit(function (e) {
    e.preventDefault();
    var title = $("#title").val();
    var firstname = $("#firstname").val();
    var lastname = $("#lastname").val();
    var tel = $("#tel").val();
    var provice = $("#provice").val();
    var district = $("#district").val();
    var subdistrict = $("#subdistrict").val();
    var address = $("#address").val();
    var request = $("#request").val();

    // console.log(title);
    // console.log(firstname);
    // console.log(lastname);
    // console.log(tel);
    // console.log(provice);
    // console.log(district);
    // console.log(subdistrict);
    // console.log(address);
    // console.log(request);

    $.ajax({
      url: "manage.php",
      method: "POST",
      data: $("form#form-insert-address").serialize(),
      datatype: "json",
      async: false,
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        // alert(data);
        location.reload();
        // location.href = "manage.php";
      },
    });
  });

  $("form-edit").submit(function (e) {
    e.preventDefault();
    var username = $("#e_username").val();
    var tel = $("e_tel").val();
    var request = $("#request").val();

    console.log(username);
    console.log(tel);
    console.log(request);

    $.ajax({
      url: "manage.php",
      method: "POST",
      data: $("form#form-edit").serialize(),
      datatype: "json",
      async: false,
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        // alert(data);
        location.reload();
        // location.href = "manage.php";
      },
    });
  });
});
