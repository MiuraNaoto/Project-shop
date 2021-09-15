$(document).ready(function () {
  // $("#insert-product").submit(function (e) {
  $("register-saler-form").submit(function (e) {
    // $(document).on("click", ".insert-product", function (event) {
    e.preventDefault();
    var product_code = $("#product_code").val();
    var product_name = $("#product_name").val();
    var product_description = $("#product_description").val();
    var product_specification = $("#product_specification").val();
    var type_product = $("#type_product").val();
    var price = $("#price").val();
    var price_transport = $("#price_transport").val();
    var delivery_type = $("#delivery_type").val();
    var stock = $("#stock").val();
    var profile_product = $("#profile-product").val();
    var picture_product = $("#picture-product").val();

    var formdata = new FormData();

    console.log(product_code);
    console.log(product_name);
    console.log(type_product);
    console.log(price);
    console.log(price_transport);
    console.log(stock);
    console.log(profile_product);
    console.log(picture_product);

    if (product_code == "") {
      Swal.fire({
        icon: "warning",
        title: "กรุณากรอกรหัสสินค้า",
        confirmButtonColor: "#1cc88a",
        confirmButtonText: "ตกลง",
      });
    } else {
      if (product_name == "") {
        Swal.fire({
          icon: "warning",
          title: "กรุณากรอกชื่อสินค้า",
          confirmButtonColor: "#1cc88a",
          confirmButtonText: "ตกลง",
        });
      } else {
        if (product_description == "") {
          Swal.fire({
            icon: "warning",
            title: "กรุณากรอกรายละเอียดสินค้า",
            confirmButtonColor: "#1cc88a",
            confirmButtonText: "ตกลง",
          });
        } else {
          if (product_specification == "") {
            Swal.fire({
              icon: "warning",
              title: "กรุณากรอกขอมูลจำเพาะสินค้า",
              confirmButtonColor: "#1cc88a",
              confirmButtonText: "ตกลง",
            });
          } else {
            if (type_product == "") {
              Swal.fire({
                icon: "warning",
                title: "กรุณาเลือกประเภทสินค้า",
                confirmButtonColor: "#1cc88a",
                confirmButtonText: "ตกลง",
              });
            } else {
              if (price == "") {
                Swal.fire({
                  icon: "warning",
                  title: "กรุณากรอกราคาสินค้าต่อชิ้น",
                  confirmButtonColor: "#1cc88a",
                  confirmButtonText: "ตกลง",
                });
              } else {
                if (stock == "") {
                  Swal.fire({
                    icon: "warning",
                    title: "กรุณากรอกจำนวนสินค้าในคลัง",
                    confirmButtonColor: "#1cc88a",
                    confirmButtonText: "ตกลง",
                  });
                } else {
                  if (delivery_type == "") {
                    Swal.fire({
                      icon: "warning",
                      title: "กรุณาเลือกกรุณาเลือกประเภทการจัดส่ง",
                      confirmButtonColor: "#1cc88a",
                      confirmButtonText: "ตกลง",
                    });
                  } else {
                    if (price_transport == "") {
                      Swal.fire({
                        icon: "warning",
                        title: "กรุณากรอกราคาขนส่ง",
                        confirmButtonColor: "#1cc88a",
                        confirmButtonText: "ตกลง",
                      });
                    } else {
                      if (profile_product == "") {
                        Swal.fire({
                          icon: "warning",
                          title: "กรุณาเพิ่มรูปปกสินค้า",
                          confirmButtonColor: "#1cc88a",
                          confirmButtonText: "ตกลง",
                        });
                      } else {
                        if (picture_product == "") {
                          Swal.fire({
                            icon: "warning",
                            title: "กรุณาเพิ่มรูปสินค้า",
                            confirmButtonColor: "#1cc88a",
                            confirmButtonText: "ตกลง",
                          });
                        } else {
                          $.ajax({
                            url: "manage.php",
                            method: "POST",
                            data: { formdata: formdata },
                            datatype: "json",
                            async: false,
                            success: function (data) {
                              console.log(data);
                              alert(data);
                              location.reload();
                              // location.href = "./manage.php";
                            },
                          });
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  });

  $(document).on("click", ".view-qrcode", function () {
    var product_id = $(this).attr("id");
    // console.log(product_id);
    if (product_id != "") {
      $.ajax({
        url: "manage.php",
        method: "POST",
        data: {
          product_id: product_id,
          request: "view_qrcode",
        },
        success: function (data) {
          // alert(data);
          $("#show_data_qrcode").html(data);

          // location.href = "manage.php";
        },
      });
    }
  });

  $(".edit-product").click(function () {
    $("#editModal").modal();
    var product_id = $(this).attr("product_id");
    var product_number = $(this).attr("product_number");
    var product_name = $(this).attr("product_name");
    var product_description = $(this).attr("product_description");
    var product_specification = $(this).attr("product_specification");
    var product_type = $(this).attr("product_type");
    var price = $(this).attr("price");
    var delivery_type = $(this).attr("delivery_type");
    var shipping_cost = $(this).attr("shipping_cost");
    var stock = $(this).attr("stock");

    // console.log(product_id);

    $("#e_product_id").val(product_id);
    $("#e_product_code").val(product_number);
    $("#e_product_name").val(product_name);
    $("#e_product_description").val(product_description);
    $("#e_product_specification").val(product_specification);
    $("#e_type_product").val(product_type);
    $("#e_price").val(price);
    $("#e_delivery_type").val(delivery_type);
    $("#e_price_transport").val(shipping_cost);
    $("#e_stock").val(stock);
  });

  $("#edit-product-modal").click(function () {
    // console.log("save");
    $("#e_product_id").val();
    $("#e_product_code").val();
    $("#e_product_name").val();
    $("#e_product_description").val();
    $("#e_product_specification").val();
    $("#e_type_product").val();
    $("#e_price").val();
    $("#e_delivery_type").val();
    $("#e_price_transport").val();
    $("#e_stock").val();
    $("#request").val();
  });
});

$("#profile-product").on("change", function () {
  //get the file name
  var fileName = $(this).val();
  //replace the "Choose a file" label
  $(this).next(".custom-file-label").html(fileName);
});

$("#picture-product").on("change", function () {
  //get the file name
  var fileName = $(this).val();
  //replace the "Choose a file" label
  $(this).next(".custom-file-label").html(fileName);
});

var loadImage = function (event) {
  if (document.getElementById("profile-product").val != "") {
    document.getElementById("propro").innerHTML =
      '<div class="col d-flex justify-content-center mb-4 mt-4" id="img-pro-pic" name="img-pro-pic" style="display:none"></div>';

    var image = document.getElementById("img-pro-pic");
    image.src = URL.createObjectURL(event.target.files[0]);
    image.innerHTML =
      '<img src="' +
      image.src +
      '" id="img-product-profile" name="img-product-profile" width="215px">';
  }
};

function delfunction(_productid, _code, _name) {
  // alert(_productid + " " + _code + " " + _name);
  Swal.fire({
    title: `คุณต้องการลบ ${_code}`,
    text: `${_name} หรือไม่ ?`,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#e74a3b",
    cancelButtonColor: "#858796",
    confirmButtonText: "ยืนยัน",
    cancelButtonText: "ยกเลิก",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "ลบข้อมูลสำเร็จ",
        icon: "success",
        confirmButtonColor: "#e74a3b",
        confirmButtonText: "ยืนยัน",
      }).then((result) => {
        this.delete_1(_productid, _code, _name);
      });
    } else {
    }
  });
}

function delete_1(_productid, _code, _name) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      location.reload();
      // alert(this.responseText);
    }
  };
  xhttp.open("POST", "manage.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(
    `product_id=${_productid}&request=delete&productcode=${_code}&productname=${_name}`
  );
}

e_product_description = document.querySelector("#e_product_description");
e_product_specification = document.querySelector("#e_product_specification");
product_description = document.querySelector("#product_description");
product_specification = document.querySelector("#product_specification");
e_product_description.addEventListener("input", autoResize, false);
e_product_specification.addEventListener("input", autoResize, false);
product_description.addEventListener("input", autoResize, false);
product_specification.addEventListener("input", autoResize, false);

function autoResize() {
  this.style.height = "auto";
  this.style.height = this.scrollHeight + "px";
}
