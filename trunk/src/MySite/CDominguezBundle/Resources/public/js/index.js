(function(a){
    a(document).ready(function(d){
        //Crea los graficos circulares.
        a(".da-circular-stat").daCircularStat();
        
        //Crea el Spinner
        a("#spinner-gasto").spinner({
            prefix:"$ ",
            places: 0,
            step: 1
        });
    })
})(jQuery);