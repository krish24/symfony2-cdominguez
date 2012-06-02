(function(a){
    a(document).ready(function(d){
        //Crea los graficos circulares.
        a(".da-circular-stat").daCircularStat();
        
        //Crea el Spinner
        a("#_cantidad").spinner({
            prefix  : "¢ ",
            min     : 0,
            max     : 100000,
            places  : 0,
            step    : 1
        });
        
        //Crea el chosen para el index
        a("#form-add-gasto select").chosen();
        
        a("#form-add-gasto select").change(function(){
            addInputChosen(this);
        })
    });
})(jQuery);

var flagValidate = 0;
    
function validateForm(sendForm){
    var enviarForm = sendForm;
    
    var chosens = $("#form-add-gasto select");
    //Validar los Chosen
    $.each(chosens, function(){
        var id = $(this).attr('id');
        var c = $('#' + id + ' :selected');
        var t = $('#add' + id);
        var l = $('#label' + id);

        if(c.val() == -1){
            if(t.val() == ''){
                l.css('display', '');
                t.addClass('error');
                t.fadeIn('slow');
                enviarForm = false;
            }else{
                l.css('display', 'none');
                t.removeClass('error');
            }
        }else{
            l.css('display', 'none');
            t.removeClass('error');
        }
    });
    
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
    
    //Eliminar los elementos cuando cambie algo, agregar el evento solo 1 vez con el flag.
    if(flagValidate == 0){
        $("#form-add-gasto input, select").bind("change",function(){
            validateForm(false);
        });
        flagValidate = 1;
    }
    
    if(enviarForm){
        saveData();
    }
} 

function addInputChosen(element){
    var id = $(element).attr('id');
    var e = $('#' + id + ' :selected');
    var idE = "#add" + id;
    if($(e).val() == -1){
        $(idE).fadeIn('slow');
    }else{
        if($(idE).css('display') != 'none'){
            $(idE).effect( 'explode', {}, 1000 );
            $('#label' + id).css('display', 'none');
        }
    }
}

function saveData(){
    $.ajax({
        url: _cdominguez.urls.add,
        data: $("#form-add-gasto").serialize(),
        success: function(r){
            if(r == 'done'){
                showMessage('success', 'Los datos se guardaron correctamente');
            }
        },
        beforeSend: function(){},
        error:function (xhr, ajaxOptions, thrownError){
            showMessage('error', 'An error occurred, please try again.' + thrownError);
        },
        type: "POST"
    });
}