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
        a("#chosen-categoria").chosen();
        a("#chosen-gasto").chosen();
    })
})(jQuery);