$(document).on("click", ".cancelModal", function () {
    var order = $(this).data('orderid');
    
    console.log(order[1])
    $(".modal-body #order_id").val( order[0] );
    $(".modal-body #order_number").html( order[1] );
    // As pointed out in comments, 
    // it is unnecessary to have to manually call the modal.
    // $('#addBookDialog').modal('show');
});

$(document).on("click", ".reviewProductModal", function () {
    var product = $(this).data('productid');
     
    console.log(product[1]['product_id'])
    console.log(product[1]['product_name'])
    console.log(product[1]['od_id'])
    //$(".modal-body #order_id").val( order[0] );
    //$(".modal-body #order_number").html( order[1] );
    // As pointed out in comments, 
    // it is unnecessary to have to manually call the modal.
    // $('#addBookDialog').modal('show');
});

$(document).on("click", ".reviewShopModal", function () {
    var shop = $(this).data('shopid');
    
    console.log("shopid = "+ shop)
    $(".modal-body #shopName").val( shop[2] );
    $(".modal-body #order_number").html( shop[1] );
    // As pointed out in comments, 
    // it is unnecessary to have to manually call the modal.
    // $('#addBookDialog').modal('show');
});


function cancelOrder(order_id){
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
         // location.reload();
        },
      });
      
}

function buyAgain(){
    
}