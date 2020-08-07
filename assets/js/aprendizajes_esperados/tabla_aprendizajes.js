$(document).ready( function () {
    $('#tabla_datos_aprendizajes').DataTable({
    "paging": true, // false to disable pagination (or any other option)
    "language": {
      "url": base_url+'assets/plugins/localisation/Spanish.json'
    },
    responsive: true,
    initComplete: function () {
      this.api().columns().every( function () {
        var column = this;
        var select = $('<br><select  style="width:230px"><option value="">Todos los resultados</option></select>')
        .appendTo( $(column.header()) )
        .on( 'change', function () {
          var val = $.fn.dataTable.util.escapeRegex(
            $(this).val()
            );

          column
          .search( val ? '^'+val+'$' : '', true, false )
          .draw();
        } );

        column.data().unique().sort().each( function ( d, j ) {
          select.append( '<option>'+d+'</option>' )
        } );
      } );
    }
});
  $('.dataTables_length').addClass('bs-select');
} );