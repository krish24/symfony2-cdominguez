$(document).ready(function() {
    $('#table-apartar-dinero').dataTable( {
        "bJQueryUI": true,
        "bProcessing": true,
        "sAjaxSource": _cdominguez.urls.dataTable
    } );
} );