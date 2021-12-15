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

function showCart(cart){
    console.log(cart);
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