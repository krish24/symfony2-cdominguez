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
        
        a("#form-add-gasto select").change(function(){
            addInputChosen(this);
        });
        
        a("#_datepicker").datetimepicker({
            showOtherMonths :true,
            showWeek        :true,
            dateFormat      : 'yy-mm-dd',
            showButtonPanel : true,
            showOn          : "button",
            buttonImage     : _app.urls.images.color.calendar,
            buttonImageOnly : true,
            buttonText      : 'Seleccionar día',
            showAnim        : "drop"
        });        
        a("#_datepicker").datetimepicker('setDate', new Date());    
    });
})(jQuery);

var flagValidate = 0;
    
function validateForm(psendForm){
    var enviarForm = psendForm;
    
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
                $(this).addClass('error');
                t.fadeIn('slow');
                enviarForm = false;
            }else{
                l.css('display', 'none');
                t.removeClass('error');
                $(this).removeClass('error');
            }
        }else{
            l.css('display', 'none');
            t.removeClass('error');
            $(this).removeClass('error');
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
        $('#form-add-gasto').submit();
        //saveData();
    }
} 

function addInputChosen(pelement){
    var id = $(pelement).attr('id');
    var e = $('#' + id + ' :selected');
    var idE = "#add" + id;
    if($(e).val() == -1){
        $(idE).fadeIn('slow');
        if(id == '_categoria'){
            $('#_gasto').html('<option value="-1" >Seleccionar una opci&oacute;n</option>');
            $("#_gasto").trigger("liszt:updated");
        }
    }else{
        if($(idE).css('display') != 'none'){
            $(idE).effect( 'explode', {}, 1000 );
            $('#label' + id).css('display', 'none');
        }
        if(id == '_categoria'){
            loadGastosByCategoria($(e).val());
        }
    }
}

function loadGastosByCategoria(pidCategoria){
    $.get(
        _cdominguez.urls.getOptGDetallesByCat, {
            pidCategoria: pidCategoria
        },
        function(htmlOptions) {
            $('#_gasto').html(htmlOptions);
            $("#_gasto").trigger("liszt:updated");
        }
    ).error(
        function() {
            showMessage('error', 'No se pudo cargar los gastos');
        }
    );
}

function saveData(){
    $.ajax({
        url: _cdominguez.urls.add,
        data: $("#form-add-gasto").serialize(),
        success: function(r){
            if(r == 'done'){
                showMessage('success', 'Los datos se guardaron correctamente');
            }else{
                showMessage('info', r);
            }
        },
        beforeSend: function(){},
        error:function (xhr, ajaxOptions, thrownError){
            showMessage('error', 'An error occurred, please try again.' + thrownError);
        },
        type: "POST"
    });
}