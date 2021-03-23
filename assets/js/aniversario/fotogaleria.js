$(".flipbook").turn({
	width: 792,
	height: 513,
  elevation: 5,
  gradients: true,
	autoCenter: true,
	});
$(".flipbook2").turn({
  width: 792,
  height: 513,
  elevation: 5,
  gradients: true,
  autoCenter: true,
  });
$(".flipbook3").turn({
  width: 792,
  height: 513,
  elevation: 5,
  gradients: true,
  autoCenter: true,
  });
$(".flipbook4").turn({
  width: 792,
  height: 513,
  elevation: 5,
  gradients: true,
  autoCenter: true,
  });
$(".flipbook5").turn({
  width: 792,
  height: 513,
  elevation: 5,
  gradients: true,
  autoCenter: true,
  });
$(".flipbook6").turn({
  width: 792,
  height: 513,
  elevation: 5,
  gradients: true,
  autoCenter: true,
  });


$(".card-book").click(function(e) {
   e.preventDefault();
  id_album=$(this).attr("id");
  if(id_album=="album-1"){
  	$("#title-modal").html("CALIDAD CON EQUIDAD");
    $("#flip-2").hide();
    $("#flip-3").hide();
    $("#flip-4").hide();
    $("#flip-5").hide();
    $("#flip-6").hide();
    $("#flip-1").show();
  }else if(id_album=="album-2"){
  	$("#title-modal").html("FORMACIÓN DE DOCENTES Y DIRECTIVOS");
  	$("#flip-1").hide();
    $("#flip-3").hide();
    $("#flip-4").hide();
    $("#flip-5").hide();
    $("#flip-6").hide();
    $("#flip-2").show();
  }else if(id_album=="album-3"){
  	$("#title-modal").html("PROYECTOS E INVESTIGACIONES NACIONALES E INTERNACIONALES");
  	$("#flip-1").hide();
    $("#flip-2").hide();
    $("#flip-4").hide();
    $("#flip-5").hide();
    $("#flip-6").hide();
    $("#flip-3").show();
  }else if(id_album=="album-4"){
  	$("#title-modal").html("HERRAMIENTAS PARA LA GESTIÓN EDUCATIVA");
  	$("#flip-1").hide();
    $("#flip-2").hide();
    $("#flip-3").hide();
    $("#flip-5").hide();
    $("#flip-6").hide();
    $("#flip-4").show();
  }else if(id_album=="album-5"){
  	$("#title-modal").html("EDUCACIÓN EN CONTINGENCIA")
  	$("#flip-1").hide();
    $("#flip-2").hide();
    $("#flip-3").hide();
    $("#flip-4").hide();
    $("#flip-6").hide();
    $("#flip-5").show();
  }else if(id_album=="album-6"){
    $("#title-modal").html("SIEMPRE CERCANOS A LA ESCUELA");
    $("#flip-1").hide();
    $("#flip-2").hide();
    $("#flip-3").hide();
    $("#flip-4").hide();
    $("#flip-5").hide();
    $("#flip-6").show();
  }
$("#modal_books").modal();
});
/*$(".btn-convocatoria").click(function() {
 $("#modal_convocatoria").modal();
});*/
/*Efecto contador en los números*/
$('.counter').counterUp({
    delay: 3
});
