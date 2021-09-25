function delivery(order_id, order_number) {
  $("#order_id").val(order_id);
  $("#order_number").val(order_number);

  $("#form-delivery").submit(function () {
    $.ajax({
      type: "POST",
      url: "manage.php",
      data: $("form#form-delivery").serialize(),

      success: function (data) {
        location.reload();
        console.log(data);
        // alert(data);
        //location.href = "./manage.php"
      },
    });
  });
}
