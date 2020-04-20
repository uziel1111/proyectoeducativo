$(document).ready(function() {
	Mensaje.cerrar();
	$('#tabla_datos').DataTable({
    "paging": true, // false to disable pagination (or any other option)
    "language": {
    	"url": base_url+'assets/plugins/localisation/Spanish.json'
    },
    responsive: true
});
	$('.dataTables_length').addClass('bs-select');
});

$("#slc_area").change(function() {
	$("#slc_nivel").attr('disabled');
	area = $("#slc_area option:selected").val();

	ruta = base_url + 'index.php/Informacion_apoyo/obtener_nivel';

	$.ajax({
		url: ruta,
		type: 'POST',
		dataType: 'json',
		data: {area: area},
		beforeSend: function(){
			Mensaje.cargando('Cargando...');
		},
		success: function(data){
			Mensaje.cerrar();
			nivel = '<option value=0>TODOS</option>';
			for (i=1; i<data.length; i++) {
				nivel += '<option value='+data[i].idnivel+'>'+data[i].nivel+'</option>';
			}
				$("#slc_nivel").html(nivel);
				$("#slc_nivel").removeAttr('disabled');
		}
	});
	
});

$("#slc_nivel").change(function() {
	$("#slc_grado").attr('disabled');
	nivel = $("#slc_nivel option:selected").val();
	
	ruta = base_url + 'index.php/Informacion_apoyo/obtener_grado';

	$.ajax({
		url: ruta,
		type: 'POST',
		dataType: 'json',
		data: {nivel: nivel},
		beforeSend: function(){
			Mensaje.cargando('Cargando...');
		},
		success: function(data){
			Mensaje.cerrar();
			
			grado = '<option value=0>TODOS</option>';
			for (i=1; i<data.length; i++) {
				grado += '<option value='+data[i].grado+'>'+data[i].grado+'°</option>';
			}
				$("#slc_grado").html(grado);
				$("#slc_grado").removeAttr('disabled');
		}
	});

});


$("#btn_buscar_filtro").click(function(e) {
	
	slc_nivel = $("#slc_nivel option:selected").val();
	slc_area = $("#slc_area option:selected").val();
	slc_grado = $("#slc_grado option:selected").val();

	ruta = base_url + 'index.php/Informacion_apoyo/';
	Mensaje.cargando('Cargando...');
	window.location = ruta+'?nivel='+slc_nivel+'&area='+slc_area+'&grado='+slc_grado;	
});