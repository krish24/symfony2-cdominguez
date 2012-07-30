/********************************************************************************************************************************************
* Funcion que se encarga de mostrar los mensajes de error y de información.
********************************************************************************************************************************************/
function showMessage(ptypeMsg, ptext){
    var msg = '';
    switch(ptypeMsg){
        case 'error':
            msg = '<div class="da-message error">' + ptext + '</div>';
            $('#msg').html(msg);
            break;
        case 'success':
            msg = '<div class="da-message success">' + ptext + '</div>';
            $('#msg').html(msg);
            break;
        case 'info':
            msg = '<div class="da-message info">' + ptext + '</div>';
            $('#msg').html(msg);
            break;
        case 'warning':
            msg = '<div class="da-message warning">' + ptext + '</div>';
            $('#msg').html(msg);
            break;
    }
    //Mostramos el mensaje.
    $('#msg').stop(true,true).hide();
    $('#msg').fadeIn(2000).delay(20000);
    $('#msg').animate({
        opacity:0
    },function(){
        $(this).slideUp("normal",function(){
            $(this).css("opacity","")
        })
    });
}