$(document).ready(function () {
  $(document).on("click", "#add_address", function (e) {
    var title = $("#title").val();
    var firstname = $("#firstname").val();
    var lastname = $("#lastname").val();
    var tel = $("#tel").val();
    var provice = $("#provice").val();
    var district = $("#district").val();
    var subdistrict = $("#subdistrict").val();
    var address = $("#address").val();
    var insert_address = $("#insert_address").val();

    console.log(title);
    console.log(firstname);
    console.log(lastname);
    console.log(tel);
    console.log(provice);
    console.log(district);
    console.log(subdistrict);
    console.log(address);
    console.log(insert_address);

    $.ajax({
      url: "manage.php",
      method: "POST",
      data: {
        title: title,
        firstname: firstname,
        lastname: lastname,
        tel: tel,
        provice: provice,
        district: district,
        subdistrict: subdistrict,
        address: address,
        insert_address: insert_address,
      },
      datatype: "json",
      success: function (data) {
        alert(data);
        // location.reload();
        location.href = "manage.php";
      },
    });
  });
});
