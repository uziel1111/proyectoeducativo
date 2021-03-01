$("#flipbook").turn({
		width: 400,
		height: 300,
		autoCenter: true
	});

$("#btn-modal_prueba").click(function(e) {
   e.preventDefault();
   alert("hola");
   $("#modal_prueba").modal();
});
