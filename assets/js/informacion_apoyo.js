$(document).ready(function() {
	Mensaje.cerrar();
	$('#tabla_datos').DataTable({
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
});

$("#slc_area").change(function() {
	$("#div_tabla").empty();
	var area = $("#slc_area option:selected").val();
	var tipo = $("#slc_area option:selected").data('tipo');

	var ruta = base_url + 'Recursos_de_apoyo_para_el_aprendizaje/obtener_nivel';

	$.ajax({
		url: ruta,
		type: 'POST',
		dataType: 'json',
		data: {area: area, tipo:tipo},
		beforeSend: function(){
			Mensaje.cargando('Cargando niveles...');
		},
		success: function(data){
			Mensaje.cerrar();
			nivel = '<option value=0>TODOS</option>';
			for (i=0; i<data.length; i++) {
				nivel += '<option value='+data[i].idnivel+'>'+data[i].nivel+'</option>';
			}
			$("#slc_nivel").html(nivel);
			$("#slc_grado").val(0);
			$("#inp_pclave").val('');
		},
		error: function (jqXHR, textStatus, errorThrown) {
			Mensaje.cerrar();
			Mensaje.error_ajax(jqXHR,textStatus, errorThrown);
		}
	});

});

$("#slc_nivel").change(function() {
	$("#div_tabla").empty();
	var nivel = $("#slc_nivel option:selected").val();

	var ruta = base_url + 'Recursos_de_apoyo_para_el_aprendizaje/obtener_grado';

	$.ajax({
		url: ruta,
		type: 'POST',
		dataType: 'json',
		data: {nivel: nivel},
		beforeSend: function(){
			Mensaje.cargando('Cargando grados...');
		},
		success: function(data){
			Mensaje.cerrar();

			var grado = '<option value=0>TODOS</option>';
			for (i=0; i<data.length; i++) {
				grado += '<option value='+data[i].grado+'>'+data[i].grado+'°</option>';
			}
			$("#slc_grado").html(grado);
			$("#inp_pclave").val('');
		},
		error: function (jqXHR, textStatus, errorThrown) {
			Mensaje.cerrar();
			Mensaje.error_ajax(jqXHR,textStatus, errorThrown);
		}
	});

});

$("#slc_grado").change(function() {
	$("#div_tabla").empty();
	$("#inp_pclave").val('');
});


$("#btn_buscar_filtro").click(function(e) {

	var slc_nivel = $("#slc_nivel option:selected").val();
	var slc_area = $("#slc_area option:selected").val();
	var slc_grado = $("#slc_grado option:selected").val();
	var inp_pclave = $("#inp_pclave").val();
	var tipo = $("#slc_area option:selected").data('tipo');

	if (inp_pclave == '') {
		inp_pclave = 'undefined';
	}

	if (slc_nivel == 0 && slc_area == 0 && slc_grado == 0) {

		Mensaje.alerta('warning','Seleccione al menos una opción','');
	}else{

	var ruta = base_url + 'Recursos_de_apoyo_para_el_aprendizaje/recursos'
	Mensaje.cargando('Buscando datos...');
	window.location = ruta+'/'+slc_area+'/'+tipo+'/'+slc_nivel+'/'+slc_grado+'/'+inp_pclave;
}
});
