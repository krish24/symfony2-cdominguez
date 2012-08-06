function filterGrid(pgrouping){  
    var G = Grids[0];
        
    //Actulizamos las URL para los datos.
    G.Source.Data.Url   = _cdominguez.urls.dataURL + '?pcolGrouping=' + pgrouping;
    G.Source.Layout.Url = _cdominguez.urls.layoutURL + '?pcolGrouping=' + pgrouping;
    G.Reload();
    
}