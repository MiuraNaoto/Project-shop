$(document).on("click", ".cancelModal", function () {
    var order = $(this).data('orderid');

    console.log(order[1])
    $(".modal-body #order_id").val(order[0]);
    $(".modal-body #order_number").html(order[1]);
    // As pointed out in comments, 
    // it is unnecessary to have to manually call the modal.
    // $('#addBookDialog').modal('show');
});

$(document).on("click", ".reviewProductModal", function () {
    var product = $(this).data('productid');
    console.log(product)
    document.getElementById("content").innerHTML = ""

    document.getElementById("content").innerHTML += product[1]['product_name']
    document.getElementById("content").innerHTML += product[1]['profile_product']
    /*
    var obj = [<div class="cart__product__item__title">
    <img src="../../../img/product/profile/ $purchaseInfo[$i]['profile_product']" alt="" width="90px" height="90px">
                            <h6 style="font-size: 20px;"><a href="../product_detail/product-details.php?product_id= $purchaseInfo[$i]['product_id']" style="color: inherit;">  $purchaseInfo[$i]['product_name'] </a></h6>
                            <p class="h6 mt-2 text-muted" style="font-size: 14px;"> $purchaseInfo[$i]['product_specification'] </p> 
                            
                        </div>
                    <hr></hr>'
                    */
    document.getElementById("content").innerHTML += ''

});

$(document).on("click", ".reviewShopModal", function () {
    var shop = $(this).data('orderid');

    console.log(shop['order_id'])
    $(".modal-body #orderid").val(shop['order_id']);
    $(".modal-body #shopName").html(shop['shop_name']);

});


function cancelOrder(order_id) {
    console.log("call cancelOrder...")
    console.log("order_id = " + order_id)

    $.ajax({
        type: "POST",
        url: "manage.php",
        data: {
            order_id: order_id,
            request: "cancelOrder",
        },

        success: function (data) {
            //location.href = "./manage.php"
            console.log(data);
            location.reload();
        },
    });
}

function ratingShop(orderid, desc) {
    var star = 0
    var rate = document.getElementsByName('rate')
    for (i = 0; i < rate.length; i++) {
        if (rate[i].checked) {
            star = 5 - i
        }
    }
    console.log("orderid = " + orderid)
    console.log("rating = " + star)
    console.log("desc = " + desc)

    $.ajax({
        type: "POST",
        url: "manage.php",
        data: {
            order_id: orderid,
            rate: star,
            desc: desc,
            request: "reviewShop",
        },

        success: function (data) {
            //location.href = "./manage.php"
            console.log(data);
            // location.reload();
        },
    });
}

function ratingProduct() {

}

function buyAgain(orderid, userid) {
    console.log("orderid = " + orderid)
    console.log("userid = " + userid)

    $.ajax({
        type: "POST",
        url: "manage.php",
        data: {
            order_id: orderid,
            userid: userid,
            request: "buyAgain",
        },

        success: function (data) {
            location.href = "../shop-cart/shop-cart.php"
            console.log(data);
            // location.reload();
        },
    });
}