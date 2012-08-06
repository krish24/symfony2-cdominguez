function verByCuenta(pgrouping){  
    var G = Grids[0];
    
    if(!$.isEmptyObject(G.GetSelRows())){
        var row = G.GetSelRows()[0];
        var idCuenta = row.id;
        var newUrl   = window.location.origin + _cdominguez.urls.cuentas;
        
        //Actulizamos las URL para los datos.
        newUrl = newUrl + '?ptypeData=One&pidCuenta=' + idCuenta + '&pcolGrouping=' + pgrouping;
        
        window.location.href = newUrl;
    }else{
        showMessage('error', 'Seleccione una cuenta para ver los gastos.');
    }
}

function filterGrid(pgrouping){  
    var G = Grids[0];
        
    //Actulizamos las URL para los datos.
    G.Source.Data.Url   = _cdominguez.urls.dataURL + '&pcolGrouping=' + pgrouping;
    G.Source.Layout.Url = _cdominguez.urls.layoutURL + '&pcolGrouping=' + pgrouping;
    G.Reload();
    
}