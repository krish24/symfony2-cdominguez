(function(a){
    a(document).ready(function(d){
        //Crea el Spinner
        a("#_cantidad").spinner({
            prefix  : "¢ ",
            min     : 0,
            max     : 9999999,
            places  : 0,
            step    : 1
        });
          
    });
})(jQuery);

function validateForm(psendForm){
    var enviarForm = psendForm;
    
    //Validamos si ingreso la cantidad.
    var d = $('#_cantidad');
    var t = $('#label_cantidad');
    if(d.val() == '¢ 0' || d.val() == '0' || d.val() == ''){
        t.css('display', '');
        d.addClass('error');
        enviarForm = false;
    }else{
        t.css('display', 'none');
        d.removeClass('error');
    }
    
    if(enviarForm){
        $('#form-mi-dinero').submit();
        //saveData();
    }
} 
