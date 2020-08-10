$(document).ready( function () {
    $('#tabla_datos_aprendizajes').DataTable({
    "paging": true, // false to disable pagination (or any other option)
    "language": {
      "url": base_url+'assets/plugins/localisation/Spanish.json'
    },
    rowReorder: true,
        columnDefs: [
            { orderable: true, className: 'Eje', targets: 0 },
            { orderable: true, className: 'Tema', targets: 1 },
            { orderable: true, className: 'Aprendizaje esperado', targets:  2},
            { orderable: false, targets: '' }
        ],
    responsive: false,
    initComplete: function () {
      this.api().columns().every( function () {
        var column = this;
        // console.log($(column.header()).text().trim());
        if ($(column.header()).text().trim()!='') {
          var select = $('<br><select  style="width:170px"><option value="">Todos los resultados</option></select>')
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
        }
      } );
    }
});
  $('.dataTables_length').addClass('bs-select');
} );
