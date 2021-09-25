$(document).ready(function () {
  $("#pro-qty").on("click", function (e) {
    var quantity = $("#quantity").val();

    //var price = document.getElementById("cart__total").value;
    var price = $("#sumProduct").val();
    var scid = $("#scid").val();
    // $("#cart__total ").innerHTML =
    //   '<td class="cart__total" id="cart__total" name="cart__total">' +
    //   quantity * price +
    //   "</td>";
    if(quantity==0){
      document.getElementById("quantity").value = 1
      document.getElementById("cart__total"+scid).innerHTML = "฿ " + (price*1).toFixed(2);
    }
    else{
      document.getElementById("cart__total"+scid).innerHTML = "฿ " + (price*quantity).toFixed(2);
    }
    console.log(quantity);
    console.log(price*quantity);
  });
});



function removeProduct(scid) {
  console.log("called removeProduct..." + scid)
  
  $.ajax({
    type: "POST",
    url: "manage.php",
    //data: s.concat(id),
    data: {
      sc_id: scid,
      request: "remove",
    },

    success: function (data) {
      location.reload();
      console.log(data);
      //location.href = "./manage.php"
    },
  });
  
}

//function updateCart(productId, shopId, scid) {
function updateCart(data) {
  quantity = $("#quantity").val();
  console.log("Add complet...");
  /*
  console.log(productId);
  console.log(shopId);
  console.log(quantity);
  */
  console.log(data);
  
  $.ajax({
    type: "POST",
    url: "manage.php",
    //data: s.concat(id),
    data: {
      data: data,
      quantity: quantity,
      request: "update",
    },

    success: function (data) {
      location.reload();
      console.log(data);
      //location.href = "./manage.php"
    },
  });
  
}

function checkCart(objCheckCart){
  var check=1
  console.log("call checkCart...");
  console.log(objCheckCart);
  //console.log(objCheckCart[1]['stock'])
  //console.log(Object.keys(objCheckCart).length)

  for(let  i=1 ; i<Object.keys(objCheckCart).length ; i++){
    //console.log("amount = " + (objCheckCart[i]['stock'] - objCheckCart[i]['quantity']))
    //console.log(objCheckCart[i]['stock'])
    //console.log(objCheckCart[i]['quantity'])
    if(objCheckCart[i]['stock']-objCheckCart[i]['quantity'] < 0){
      check=0
      Swal.fire({
        icon: "warning",
        title: 'เนื่องจากสินค้าบางชิ้นอาจได้ "หมดคลังไปเเล้ว" หรือ "มีจำนวนสินค้าไม่เพียงพอต่อการสั่งซื้อ"',
        Text: "โปรดตรวจสอบรายระเอียดการซื้ออีกรอบ",
      });
    }
  }
  console.log("check = " + check)
  //$('#modalCheck').modal()
  if(check == 1){
    $.ajax({
      type: "POST",
      url: "../checkout/checkout.php",
      data: {
        data: objCheckCart[1],
      },
  
      success: function (data) {
        location.href = "../checkout/checkout.php"
        console.log(data);
        //location.href = "./manage.php"
      },
    });
  }
  
}


