$(".flipbook").turn({
	width: 885,
	height: 245,
    elevation: 5,
    gradients: true,
	autoCenter: true,
	});
$(".card-book").click(function(e) {
   e.preventDefault();
  id_album=$(this).attr("id");
  if(id_album=="album-1"){
  	$("#title-modal").html("EDUCACIÓN CON EQUIDAD");
    $("#flip-1").show();
  }else if(id_album=="album-2"){
  	$("#title-modal").html("FORMACIÓN DE DOCENTES Y DIRECTIVOS");
  	$("#flip-1").hide();
  }else if(id_album=="album-3"){
  	$("#title-modal").html("PROYECTOS E INVESTIGACIONES NACIONALES E INTERNACIONALES");
  	$("#flip-1").hide();
  }else if(id_album=="album-4"){
  	$("#title-modal").html("HERRAMIENTAS PARA LA GESTIÓN EDUCATIVA");
  	$("#flip-1").hide();
  }else if(id_album=="album-5"){
  	$("#title-modal").html("EDUCACIÓN EN EMERGENCIA")
  	$("#flip-1").hide();
  }
$("#modal_prueba").modal();
});
$(".btn-convocatoria").click(function() {
 $("#modal_convocatoria").modal();
});
/*Efecto contador en los números*/
$('.counter').counterUp({
    delay: 3
});
