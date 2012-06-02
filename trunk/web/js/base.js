/********************************************************************************************************************************************
* Funcion que se encarga de mostrar los mensajes de error y de información.
********************************************************************************************************************************************/
function showMessage(ptypeMsg, ptext){
    $('#msg').html('');
    var msg = '';
    switch(ptypeMsg){
        case 'error':
            msg = '<div class="da-message error">' + ptext + '</div>';
            $('#msg').append(msg);
            break;
        case 'success':
            msg = '<div class="da-message success">' + ptext + '</div>';
            $('#msg').append(msg);
            break;
        case 'info':
            msg = '<div class="da-message info">' + ptext + '</div>';
            $('#msg').append(msg);
            break;
        case 'warning':
            msg = '<div class="da-message warning">' + ptext + '</div>';
            $('#msg').append(msg);
            break;
    }
    //Mostramos el mensaje.
    $('#msg').hide();
    $('#msg').fadeIn(2000);
}