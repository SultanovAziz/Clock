/* Cart */
$('body').on('click','.add-to-cart-link',function (e){
    e.preventDefault();
    var id = $(this).data('id'),
        quantity = $('.quantity input').val() ? $('.quantity input').val() : 1,
        mod = $('.available select').val();
    $.ajax({
        url : "cart/add",
        data : {id : id,quantity : quantity,mod : mod},
        type : "GET",
        success : function (result){
            showCart(result);
        },
        error : function (){
            alert("Ошибка! Попробуйте позже");
        }
    });
});

$('#cart .modal-body').on('click','.del-item',function (){
     var id = $(this).data('id');
     $.ajax({
         url : 'cart/delete',
         data: {id : id},
         type: 'GET',
         success : function (result){
            showCart(result);
         },
         error : function (){
             alert('Ошибка!');
         }
     });
});

function showCart(cart){
   if ($.trim(cart)=='<h3>Корзина пуста</h3>'){
       $('#cart .modal-footer a,#cart .modal-footer .btn-danger').css('display','none');
   }
   else{
       $('#cart .modal-footer a,#cart .modal-footer .btn-danger').css('display','inline-block');
   }
   $('#cart .modal-body').html(cart);
   $('#cart').modal();
   if ($('.cart-sum').text()){
       $('.cart_total').html($('#cart .cart-sum').text());
   }
   else{
       $('.cart_total').text('Empty cart');
   }
}


function getCart(){
    $.ajax({
       url : 'cart/show',
        success : function (result) {
            showCart(result);
        },
        error : function (){
            alert("Ошибка! Попробуйте позже");
        }
    });
}

function clearCart(){
    $.ajax({
        url : 'cart/clear',
        success : function (result) {
            showCart(result);
        },
        error : function (){
            alert("Ошибка! Попробуйте позже");
        }
    });

}

/* Cart */



$('#currency').change(function (){
    window.location = 'currency/change?curr='+$(this).val();
})
$('.available select').on('change',function (){
    var modId = $(this).val(),
        color  = $(this).find('option').filter(':selected').data('title'),
        price = $(this).find('option').filter(':selected').data('price'),
        basePrice = $('#data-base').data('base');

    if (price){
          $('#data-base').text(symbolLeft + price + symbolRight)  ;
    }
    else{
         $('#data-base').text( symbolLeft + basePrice + symbolRight);
    }


});
