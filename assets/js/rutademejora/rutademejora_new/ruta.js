$("#btn_mision").click(function(e){
	e.preventDefault()
	var ruta = base_url + 'Rutademejora/modal_mision'
	$.ajax({
		url:ruta,
		data: { },
		beforeSend: function(xhr) {
	      Notification.loading("");
    }
	})
	.done(function(data){
		$("#div_generico").empty();
    $("#div_generico").append(data.strView);

		$('h5').empty();
		$('h5').append(data.titulo);
    $("#myModal").modal("show");
	})
	.fail(function(e) {
    console.error("Error in ()"); console.table(e);
  })
	.always(function() {
    swal.close();
  });
})

//Prioridad (incompleto)
$("#btn_prioridad").click(function(e){
	e.preventDefault()
		var ruta = base_url + 'Rutademejora/modal_prioridad'
		$.ajax({
			url:ruta,
			type:'post',
			data: {'idtemaprioritario': obj.id_tprioritario},
			beforeSend: function(xhr) {
		      Notification.loading("");
	    }
		})
		.done(function(data){
			$("#div_generico").empty();
	    $("#div_generico").append(data.strView);
			$('h5').empty();
			$('h5').append(data.titulo);
	    $("#myModal").modal("show");
		})
		.fail(function(e) {
	    console.error("Error in ()");
	  })
		.always(function() {
	    swal.close();
	  });
});

//Actividades
$("#btn_actividades").click(function(e){
	e.preventDefault()
	var ruta = base_url + 'Rutademejora/modal_actividades'
	$.ajax({
		url:ruta,
		data: { },
		beforeSend: function(xhr) {
	      Notification.loading("");
    }
	})
	.done(function(data){
		$("#div_generico").empty();
    $("#div_generico").append(data.strView);
		$('h5').empty();
		$('h5').append(data.titulo);
    $("#myModal").modal("show");
	})
	.fail(function(e) {
    console.error("Error in ()"); console.table(e);
  })
	.always(function() {
    swal.close();
  });
});


