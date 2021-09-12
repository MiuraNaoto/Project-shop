$(document).ready(function () {
  // $("#add_bank").submit(function (e) {
  $(document).on("click", ".add_bank", function (event) {
    event.preventDefault();
    var banktype = $("#banktype").val();
    var bankname = $("#bankname").val();
    var bankcode = $("#bankcode").val();

    console.log(banktype);
    console.log(bankname);
    console.log(bankcode);

    if (bankcode.length < 10) {
      Swal.fire({
        icon: "warning",
        title: "กรุณากรอกเลขบัญชีธนาคารให้ครบ",
      });
    } else if (bankcode.length > 10) {
      Swal.fire({
        icon: "warning",
        title: "เลขบัญชีของท่านเกิน",
        Text: "กรุณากรอกใหม่",
      });
    } else {
      $.ajax({
        url: "manage.php",
        method: "POST",
        data: {
          banktype: banktype,
          bankname: bankname,
          bankcode: bankcode,
          request: "insert_bank",
        },
        datatype: "json",
        async: false,

        success: function (data) {
          // console.log(data);
          // alert(data);
          location.reload();
        },
      });
    }
  });
});

