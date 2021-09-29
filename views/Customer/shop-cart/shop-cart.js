/*
$(document).ready(function () {
  $("#pro-qty").on("click", function (e) {
    

    //var price = document.getElementById("cart__total").value;
    var price = $("#productPrice").val();
    var scid = $("#scid").val();
    var quantity = $("#quantity"+scid).val();
    // $("#cart__total ").innerHTML =
    //   '<td class="cart__total" id="cart__total" name="cart__total">' +
    //   quantity * price +
    //   "</td>";
    console.log("scid = " + scid)
    if(quantity==0){
      document.getElementById("quantity"+scid).value = 1
      document.getElementById("cart__total"+scid).innerHTML = "฿ " + (price*1).toFixed(2);
    }
    else{
      document.getElementById("cart__total"+scid).innerHTML = "฿ " + (price*quantity).toFixed(2);
    }
    console.log("quantity = " + quantity);
    console.log("total price = " + price*quantity);
  });
});
*/

function changeQuantity(scid, price, scidList, priceList, obj) {
  /*
  console.log("Success...")
  
  console.log("scid = " + scidList[0])
  console.log("priceList = " + priceList)

  console.log("scid = " + scid)
  console.log("price = " + price)
  */
  var quantity = $("#quantity" + scid).val();
  //console.log("quantity = " + quantity)

  if (quantity == 0) {
    document.getElementById("quantity" + scid).value = 1
    document.getElementById("cart__total" + scid).innerHTML = "฿ " + (price * 1).toFixed(2);
  }
  else {
    document.getElementById("cart__total" + scid).innerHTML = "฿ " + (price * quantity).toFixed(2);
  }
  //console.log("quantity = " + quantity);
  //console.log("total price = " + price*quantity);
  var sum_price = 0
  for (i = 0; i < scidList.length; i++) {
    sum_price = sum_price + (priceList[i] * $("#quantity" + scidList[i]).val())
  }
  var ele = document.getElementsByName('shippingType');
  var chk = 0
  var shippingPrice = 0
  for (i = 0; i < ele.length; i++) {
    if (ele[i].checked) {
      var type = ele[i].value
      console.log("choose: " + type)
      chk = 1
      break
    }
  }
  if (chk == 1) {
    var shippingPrice = document.getElementById("shoppingPrice" + type).value
  }

  document.getElementById("sumPriceText").setAttribute('value', sum_price.toFixed(2));
  document.getElementById("sumPrice").innerHTML = (sum_price + parseFloat(shippingPrice)).toFixed(2)
  //console.log(document.getElementById("sumPriceText").value)
  updateCart(obj)
}

function chooseShippingType() {
  var sum_price = 0
  var ele = document.getElementsByName('shippingType');
  for (i = 0; i < ele.length; i++) {
    if (ele[i].checked) {
      var type = ele[i].value
      console.log("choose: " + type)
      break
    }
  }
  var shippingPrice = document.getElementById("shoppingPrice" + type).value
  console.log("shippingPrice = " + shippingPrice + " " + document.getElementById("sumPriceText").value)
  sum_price =  parseFloat(document.getElementById("sumPriceText").value)  + parseFloat(shippingPrice)
  document.getElementById("sumPrice").innerHTML = sum_price.toFixed(2)

}



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


function updateCart(data) {
  let quantity = ["0"]
  console.log("Add complet...");
  for (let i = 1; i < Object.keys(data).length; i++) {
    console.log($("#quantity" + data[i]['scid']).val())
    quantity.push($("#quantity" + data[i]['scid']).val());
    //console.log(data[i] + ":" + quantity[i]);
  }

  //console.log(data);

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
      //location.reload();
      console.log(data);
      //location.href = "./manage.php"
    },
  });

}

function checkCart(objCheckCart) {
  var check = 1
  console.log("call checkCart...");
  console.log(objCheckCart);
  //console.log(objCheckCart[1]['stock'])
  //console.log(Object.keys(objCheckCart).length)

  for ( i = 1; i < Object.keys(objCheckCart).length; i++) {
    console.log("amount = " + (objCheckCart[i]['stock'] - objCheckCart[i]['quantity']))
    console.log(objCheckCart[i]['stock'])
    console.log(objCheckCart[i]['quantity'])
    
    var chooseShippingType = 0
    
    var ele = document.getElementsByName('shippingType');
    for (j = 0; j < ele.length; j++) {
      if (ele[j].checked) {
        chooseShippingType = ele[j].value
        //console.log("choose: " + chooseShippingType)
        break;
      }
    }
    
    console.log("chooseShippingType = " + chooseShippingType)
    if (objCheckCart[i]['stock'] - objCheckCart[i]['quantity'] < 0) {
      check = 0
      Swal.fire({
        icon: "warning",
        title: 'เนื่องจากสินค้าบางชิ้นอาจได้ "หมดคลังไปเเล้ว" หรือ "มีจำนวนสินค้าไม่เพียงพอต่อการสั่งซื้อ"',
        Text: "โปรดตรวจสอบรายระเอียดการซื้ออีกรอบ",
      });
    }
    if (chooseShippingType == 0) {
      check = 0
      Swal.fire({
        icon: "warning",
        title: 'ยังไม่ได้เลือกประเภทการจัดส่ง',
        Text: "โปรดเลือกประเภทการจัดส่ง",
      });
    }
    
  }
  
  console.log("check = " + check)
  //$('#modalCheck').modal()
  if (check == 1) {
    
    $.ajax({
      type: "POST",
      url: "./manage.php",
      data: {
        data: objCheckCart[1],
        shippingTypeid: chooseShippingType,
        request: "checkOut",
      },

      success: function (data) {
        location.href = "../checkout/checkout.php"
        console.log(data);
        //location.href = "./manage.php"
      },
    });
    
   
  }

}

