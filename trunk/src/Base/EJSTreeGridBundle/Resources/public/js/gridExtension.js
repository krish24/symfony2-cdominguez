/********************************************************************************************************************************************
 * Autor: Carlos Domínguez Lara
 * Fecha: 02 de febrere del 2012
 * Funcion que se encarga de eliminar el Mensaje de trial version de grid
 * Params (parametros): 
 *      G: Grid en el que se genero el evento.   
 * Return (retorna): --
 ********************************************************************************************************************************************/
function removeTrialMessage(objGrid, idGrid, callback){
    objGrid.OnRenderFinish = function(pG){ 
        var G = document.getElementById(idGrid);

        //Despues de que renderiso toda la tabla agregamos el evento que detectara en que
        //momento se agrega el mensaje a la tabla y lo removera automaticamente.
        $(G.parentNode).bind('DOMNodeInserted', function(event) {
            //if (event.type == 'DOMNodeInserted') {
            //    alert('Content added! Current content:' + '\n\n' + this.innerHTML);
            //} else {
            //    alert('Content removed! Current content:' + '\n\n' + this.innerHTML);
            //}
            var Grid = document.getElementById(idGrid);

            if(Grid != null){
                //Obtenemos los divs que contiene la tabla
                var objDivs = Grid.parentNode.childNodes;

                //Recorremos todos los div de la tabla para buscar cual tiene el div del trial Version.
                $.each(objDivs, function(index, objD) {
                    //buscamos dentro del html del div si contiene el String 'Trial unregistered'
                    var result = objD.innerHTML.search('Trial unregistered');
                    if(result != -1){
                        //removemos el div que contiene el mensaje.
                        Grid.parentNode.removeChild(objD);

                        //Removemos el evento una vez que elimine el mensajes del trial version, para que
                        //no se siga disparando.
                        $(Grid.parentNode).unbind('DOMNodeInserted');
                        return false; //Exit for loop
                    }
                });
            }
        });
        
        if (typeof callback !== 'undefined') {
            callback();
        }
     }
}