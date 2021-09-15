$(document).ready(function () {
  $("#uploadpic").on("change", function (e) {
    e.preventDefault();
    $.ajax({
      url: "manage.php",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      // datatype: "json",
      async: false,
      success: function (data) {
        // alert(data);
        location.reload(true);
        // location.href = "./manage.php"
      },
      error: function (e) {
        $("#err").html(e).fadeIn();
      },
    });
  });

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

  $(".edit-address").click(function () {
    // $("#editAddress").modal();
    $("#edit_address_modal").modal();
    var daid = $(this).attr("daid");
    var title = $(this).attr("title");
    var firstname = $(this).attr("firstname");
    var lastname = $(this).attr("lastname");
    var tel = $(this).attr("tel");
    var address = $(this).attr("address");
    var subdistrict = $(this).attr("subdistrict");
    var province_id = $(this).attr("province_id");
    var district_id = $(this).attr("district_id");

    console.log(daid);
    console.log(title);
    console.log(subdistrict);
    console.log(province_id);
    console.log(district_id);
    if (title == "นาย") {
      title = 1;
    } else if (title == "นาง") {
      title = 2;
    } else if (title == "นางสาว") {
      title = 2;
    }
    console.log(title);

    $("#ea_title").val(title);
    $("#ea_firstname").val(firstname);
    $("#ea_lastname").val(lastname);
    $("#ea_tel").val(tel);
    $("#ea_provice").val(province_id);
    $("#ea_district").val(district_id);
    $("#ea_subdistrict").val(subdistrict);
    $("#ea_address").val(address);
    $("#ea_adid").val(daid);
  });

  $("#edit-address-modal").click(function () {
    $("#ea_title").val();
    $("#ea_firstname").val();
    $("#ea_lastname").val();
    $("#ea_tel").val();
    $("#ea_provice").val();
    $("#ea_district").val();
    $("#ea_subdistrict").val();
    $("#ea_address").val();
    $("#ea_adid").val();
    $("#request").val();
  });
});

function selectProvince() {
  var provinceObject = document.getElementById("provice");
  var districtObject = document.getElementById("district");
  var subdistrictObject = document.getElementById("subdistrict");
  var provinceId = document.getElementById("provice").value;
  // console.log(provinceId)

  districtObject.innerHTML = '<option value="" >กรุณาเลือกอำเภอ/เขต</option>';
  subdistrictObject.innerHTML =
    '<option value="" >กรุณาเลือกตำบล/แขวง</option>';
  $.get("./districts.php?province_id=" + provinceId, function (data) {
    // console.log(data)
    var result = JSON.parse(data);
    // console.log(result);
    $.each(result, function (index, item) {
      // console.log(item)
      if (index != 0) {
        districtObject.innerHTML +=
          "<option value='" +
          item.id +
          "'> " +
          item.districts_name_in_thai +
          "</option>";
      }
    });
  });
}

function selectDistrict() {
  var districtObject = document.getElementById("district");
  var subdistrictObject = document.getElementById("subdistrict");
  var districtId = document.getElementById("district").value;
  // console.log(provinceId)

  subdistrictObject.innerHTML =
    '<option value="" >กรุณาเลือกตำบล/แขวง</option>';
  $.get("./sub-districts.php?district_id=" + districtId, function (data) {
    // console.log(data)
    var result = JSON.parse(data);
    // console.log(result);
    $.each(result, function (index, item) {
      // console.log(item)
      if (index != 0) {
        subdistrictObject.innerHTML +=
          "<option value='" +
          item.id +
          "'> " +
          item.subdistricts_name_in_thai +
          "</option>";
      }
    });
  });
}
