$("#btn_limpiar_filtro_ae").click(function(){
	$('#slc_nivel_ae').val(0);
	$("#slc_nivel_ae").trigger("change");
});

$("#btn_buscar_filtro_ae").click(function(e){
	e.preventDefault();
	var idnivel = $("#slc_nivel_ae").val();
	var idcomponente = $("#slc_componente_ae").val();
	var idcampo = $("#slc_campo_ae").val();
	var idgrado = $("#slc_grado_ae").val();
	var idasignatura = $("#slc_asignatura_ae").val();
	var ideje = $("#slc_eje_ae").val();
	var idtema = $("#slc_tema_ae").val();
	if(idnivel != 0){
		if(idcomponente != 0){
			if(idcampo != 0){
				if(idgrado != 0){
					if(idasignatura != 0){
						Aprendizajes_e.get_aprendizajes_esperados(idnivel, idcomponente, idcampo, idgrado, idasignatura, ideje, idtema);
					}else{
						Mensaje.alerta('warning','!Alerta¡','Seleccione asignatura');
					}
				}else{
					Mensaje.alerta('warning','!Alerta¡','Seleccione grado');
				}
			}else{
				Mensaje.alerta('warning','!Alerta¡','Seleccione campo');
			}
		}else{
			Mensaje.alerta('warning','!Alerta¡','Seleccione componente');
		}
	}else{
		Mensaje.alerta('warning','!Alerta¡','Seleccione nivel');
	}
});

$("#slc_nivel_ae").change(function(){
	var idnivel = $(this).val();
	if(idnivel != 0){
		Aprendizajes_e.get_componentes(idnivel);
		$('#slc_componente_ae').prop('disabled', false);
	}else{
		$('#slc_componente_ae').val(0);
		$("#slc_componente_ae").trigger("change");
		$('#slc_componente_ae').prop('disabled', true);
	}

});

$("#slc_componente_ae").change(function(){
	var idnivel = $("#slc_nivel_ae").val();
	var idcomponente = $(this).val();
	if(idcomponente != 0){
		Aprendizajes_e.get_campos(idnivel,idcomponente);
		$('#slc_campo_ae').prop('disabled', false);
	}else{
		$('#slc_campo_ae').val(0);
		$("#slc_campo_ae").trigger("change");
		$('#slc_campo_ae').prop('disabled', true);
	}
});

$("#slc_campo_ae").change(function(){
	var idnivel = $("#slc_nivel_ae").val();
	var idcomponente = $("#slc_componente_ae").val();
	var idcampo = $(this).val();
	if(idcampo != 0){
		Aprendizajes_e.get_grados(idnivel,idcomponente,idcampo);
		$('#slc_grado_ae').prop('disabled', false);
	}else{
		$('#slc_grado_ae').val(0);
		$("#slc_grado_ae").trigger("change");
		$('#slc_grado_ae').prop('disabled', true);
	}

});

$("#slc_grado_ae").change(function(){
	var idnivel = $("#slc_nivel_ae").val();
	var idcomponente = $("#slc_componente_ae").val();
	var idcampo = $("#slc_campo_ae").val();
	var idgrado = $(this).val();
	if(idgrado != 0){
		Aprendizajes_e.get_asignaturas(idnivel,idcomponente,idcampo,idgrado);
		$('#slc_asignatura_ae').prop('disabled', false);
	}else{
		$('#slc_asignatura_ae').val(0);
		$("#slc_asignatura_ae").trigger("change");
		$('#slc_asignatura_ae').prop('disabled', true);
	}
});

$("#slc_asignatura_ae").change(function(){
	var idnivel = $("#slc_nivel_ae").val();
	var idcomponente = $("#slc_componente_ae").val();
	var idcampo = $("#slc_campo_ae").val();
	var idgrado = $("#slc_grado_ae").val();
	var idasignatura = $(this).val();
	if(idasignatura != 0){
		Aprendizajes_e.get_ejes(idnivel,idcomponente,idcampo,idgrado,idasignatura);
		$('#slc_eje_ae').prop('disabled', false);
	}else{
		$('#slc_eje_ae').val(0);
		$("#slc_eje_ae").trigger("change");
		$('#slc_eje_ae').prop('disabled', true);
	}

});

$("#slc_eje_ae").change(function(){
	var idnivel = $("#slc_nivel_ae").val();
	var idcomponente = $("#slc_componente_ae").val();
	var idcampo = $("#slc_campo_ae").val();
	var idgrado = $("#slc_grado_ae").val();
	var idasignatura = $("#slc_asignatura_ae").val();
	var ideje = $(this).val();
	if(ideje != 0){
		Aprendizajes_e.get_temas(idnivel,idcomponente,idcampo,idgrado,idasignatura,ideje);
		$('#slc_tema_ae').prop('disabled', false);
	}else{
		$('#slc_tema_ae').val(0);
		$("#slc_tema_ae").trigger("change");
		$('#slc_tema_ae').prop('disabled', true);
	}
});

let Aprendizajes_e = {

get_componentes: (idnivel) => {
	$.ajax({
		url: base_url+"Aprendizajes_esperados/get_componentes",
		type: 'POST',
		dataType: 'json',
		data: {'idnivel': idnivel},
		beforeSend: function(){
			Mensaje.cargando('Cargando componentes...');
		},
		success: function(data){
			console.log(data);
			Mensaje.cerrar();
			// var componentes = data.componentes;
			var str_componentes = '<option value="0">Seleccione</option>';
			for (i=0; i<data.length; i++) {
				str_componentes += '<option value='+data[i].idcomponente+'>'+data[i].componente+'</option>';
			}
			$("#slc_componente_ae").empty();
			$("#slc_componente_ae").append(str_componentes);
		},
		error: function (jqXHR, textStatus, errorThrown) {
			Mensaje.cerrar();
			Mensaje.error_ajax(jqXHR,textStatus, errorThrown);
		}
	});
},//get_componentes

get_campos: (idnivel, idcomponente) => {
	$.ajax({
		url: base_url+"Aprendizajes_esperados/get_campos",
		type: 'POST',
		dataType: 'json',
		data: {'idnivel': idnivel, 'idcomponente': idcomponente},
		beforeSend: function(){
			Mensaje.cargando('Cargando campos...');
		},
		success: function(data){
			Mensaje.cerrar();
			var str_campos = '<option value="0">Seleccione</option>';
			for (i=0; i<data.length; i++) {
				str_campos += '<option value='+data[i].idcampo+'>'+data[i].campo+'</option>';
			}
			$("#slc_campo_ae").empty();
			$("#slc_campo_ae").append(str_campos);
		},
		error: function (jqXHR, textStatus, errorThrown) {
			Mensaje.cerrar();
			Mensaje.error_ajax(jqXHR,textStatus, errorThrown);
		}
	});
},//get_campos

get_grados: (idnivel, idcomponente, idcampo) => {
	$.ajax({
		url: base_url+"Aprendizajes_esperados/get_grados",
		type: 'POST',
		dataType: 'json',
		data: {'idnivel': idnivel, 'idcomponente': idcomponente, 'idcampo': idcampo},
		beforeSend: function(){
			Mensaje.cargando('Cargando grados...');
		},
		success: function(data){
			Mensaje.cerrar();
			var str_grados = '<option value="0">Seleccione</option>';
			for (i=0; i<data.length; i++) {
				str_grados += '<option value='+data[i].idgrado+'>'+data[i].grado+'</option>';
			}
			$("#slc_grado_ae").empty();
			$("#slc_grado_ae").append(str_grados);
		},
		error: function (jqXHR, textStatus, errorThrown) {
			Mensaje.cerrar();
			Mensaje.error_ajax(jqXHR,textStatus, errorThrown);
		}
	});
},//get_grados

get_asignaturas: (idnivel, idcomponente, idcampo, idgrado) => {
	$.ajax({
		url: base_url+"Aprendizajes_esperados/get_asignaturas",
		type: 'POST',
		dataType: 'json',
		data: {'idnivel': idnivel, 'idcomponente': idcomponente, 'idcampo': idcampo, 'idgrado': idgrado},
		beforeSend: function(){
			Mensaje.cargando('Cargando asignaturas...');
		},
		success: function(data){
			Mensaje.cerrar();
			var str_asignaturas = '<option value="0">Seleccione</option>';
			for (i=0; i<data.length; i++) {
				str_asignaturas += '<option value='+data[i].idasignatura+'>'+data[i].asignatura+'</option>';
			}
			$("#slc_asignatura_ae").empty();
			$("#slc_asignatura_ae").append(str_asignaturas);
		},
		error: function (jqXHR, textStatus, errorThrown) {
			Mensaje.cerrar();
			Mensaje.error_ajax(jqXHR,textStatus, errorThrown);
		}
	});
},//get_asignaturas

get_ejes: (idnivel, idcomponente, idcampo, idgrado, idasignatura) => {
	$.ajax({
		url: base_url+"Aprendizajes_esperados/get_ejes",
		type: 'POST',
		dataType: 'json',
		data: {'idnivel': idnivel, 'idcomponente': idcomponente, 'idcampo': idcampo, 'idgrado': idgrado, 'idasignatura': idasignatura},
		beforeSend: function(){
			Mensaje.cargando('Cargando ejes...');
		},
		success: function(data){
			Mensaje.cerrar();
			var str_ejes = '<option value="0">Seleccione</option>';
			for (i=0; i<data.length; i++) {
				str_ejes += '<option value='+data[i].ideje+'>'+data[i].eje+'</option>';
			}
			$("#slc_eje_ae").empty();
			$("#slc_eje_ae").append(str_ejes);
		},
		error: function (jqXHR, textStatus, errorThrown) {
			Mensaje.cerrar();
			Mensaje.error_ajax(jqXHR,textStatus, errorThrown);
		}
	});
},//get_ejes

get_temas: (idnivel, idcomponente, idcampo, idgrado, idasignatura, ideje) => {
	$.ajax({
		url: base_url+"Aprendizajes_esperados/get_temas",
		type: 'POST',
		dataType: 'json',
		data: {'idnivel': idnivel, 'idcomponente': idcomponente, 'idcampo': idcampo, 'idgrado': idgrado, 'idasignatura': idasignatura, 'ideje': ideje},
		beforeSend: function(){
			Mensaje.cargando('Cargando ejes...');
		},
		success: function(data){
			Mensaje.cerrar();
			var str_temas = '<option value="0">Seleccione</option>';
			for (i=0; i<data.length; i++) {
				str_temas += '<option value='+data[i].idtema+'>'+data[i].tema+'</option>';
			}
			$("#slc_tema_ae").empty();
			$("#slc_tema_ae").append(str_temas);
		},
		error: function (jqXHR, textStatus, errorThrown) {
			Mensaje.cerrar();
			Mensaje.error_ajax(jqXHR,textStatus, errorThrown);
		}
	});
},//get_temas

get_aprendizajes_esperados: (idnivel, idcomponente, idcampo, idgrado, idasignatura, ideje, idtema) => {
	$.ajax({
		url: base_url+"Aprendizajes_esperados/get_aprendizajes_esperados",
		type: 'GET',
		dataType: 'json',
		data: {'idnivel': idnivel, 'idcomponente': idcomponente, 'idcampo': idcampo, 'idgrado': idgrado, 'idasignatura': idasignatura, 'ideje': ideje, 'idtema':idtema},
		beforeSend: function(){
			Mensaje.cargando('Cargando ejes...');
		},
		success: function(data){
			Mensaje.cerrar();
			// console.log(data);
			$("#div_tabla_aprendizajes").empty();
			$("#div_tabla_aprendizajes").append(data);
		},
		error: function (jqXHR, textStatus, errorThrown) {
			Mensaje.cerrar();
			Mensaje.error_ajax(jqXHR,textStatus, errorThrown);
		}
	});

	// var ruta = base_url + 'Aprendizajes_esperados/get_aprendizajes'
	// 	Mensaje.cargando('Buscando datos...');
	// 	window.location =ruta+'/'+idnivel+'/'+idcomponente+'/'+idcampo+'/'+idgrado+'/'+idasignatura+'/'+ideje+'/'+idtema;
},

// funcionalidad_change: (elemento) => {
// 	// alert($(elemento).attr('id'));
// 	switch($(elemento).attr('id')) {
// 	  case 'slc_nivel_ae':
// 	    if($("#slc_nivel_ae").val() != 0){

// 	    }else{

// 	    }
// 	    break;
// 	  case 'slc_componente_ae':
// 	    // code block
// 	    break;
// 	  case 'slc_campo_ae':
// 	    // code block
// 	    break;
// 	  case 'slc_grado_ae':
// 	    // code block
// 	    break;
// 	  case 'slc_asignatura_ae':
// 	    // code block
// 	    break;
// 	  case 'slc_eje_ae':
// 	    // code block
// 	    break;
// 	  case 'slc_tema_ae':
// 	    // code block
// 	    break;
// 	}
// }

}
