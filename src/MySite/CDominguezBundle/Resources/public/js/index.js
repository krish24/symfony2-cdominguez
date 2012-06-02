(function(a){
    a(document).ready(function(d){
        //Crea los graficos circulares.
        a(".da-circular-stat").daCircularStat();
        
        //Crea el Spinner
        a("#spinner-gasto").spinner({
            prefix  : "¢ ",
            min     : 0,
            max     : 100000,
            places  : 0,
            step    : 1
        });
        
        //Crea el chosen
        a("select").chosen();
        
        a("select").change(function(){
            var e = a(this).find(':selected');
            var idE = "#add-" + a(this).attr('id');
            console.log(idE);
            if(a(e).val() == 1){
                a(idE).fadeIn('slow');
            }else{
                if(a(idE).css('display') != 'none'){
                    a(idE).effect( 'explode', {}, 1000 );
                }
            }
        });
    })
})(jQuery);