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