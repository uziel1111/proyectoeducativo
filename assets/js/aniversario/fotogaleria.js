$(".flipbook").turn({
		width: 500,
		height: 150,
    elevation: 5,
    gradients: true,
		autoCenter: true
	});

$("#album-1").click(function(e) {
   e.preventDefault();
   $("#modal_prueba").modal();
});
