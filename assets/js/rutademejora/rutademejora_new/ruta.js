$(document).ready(function(){
	// $('#myModal').modal('show');
	recomendacion();
	get_tabla();
})

function recomendacion(){
	var ruta = base_url + 'Rutademejora/modal_recomendacion'
	$.ajax({
		url:ruta,
		data: { },
		// beforeSend: function(xhr) {
	  //     Notification.loading("");
    // }
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
}

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
	if(obj.id_tprioritario == undefined){
		alert("seleccione un tema prioritario");
	}else{
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
	}
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

// Funcionalidad tabla
function get_tabla(){
	$.ajax({
		url: base_url+"Rutademejora/tabla_rm",

		success: function(data){
			$("#contenedor_tabla").empty();
			$("#contenedor_tabla").append(data.strView);
			inicio();
			selectedRow();
			if(data.tam == 0){
				$("#btn_get_reporte").hide();
			}else{
				$("#btn_get_reporte").show();
			}
		},
	})
}

function update_tabla(){
	$.ajax({
		url: base_url+"Rutademejora/tabla_up",

		success: function(data){
			$("#contenedor_tabla").empty();
			$("#contenedor_tabla").append(data.strView);
			inicio();
			selectedRow();
			if(data.tam == 0){
				$("#btn_get_reporte").hide();
			}else{
				$("#btn_get_reporte").show();
			}
		},
	})
}

//Select element
function Tabla(){
   _this = this;
   id_tprioritario = 0;
}


 function inicio(){
	 drag = null;
	 drag = new Drag();
	 $("#id_tbody_demo").css( 'cursor', 'pointer' );
	 $("#id_tbody_demo").sortable({
		 start: function( event, ui ) {
			 var vector = drag.all_rows('id_tabla_rutas');
			 drag.remove_empty(vector)
		 },
			stop: function( event, ui ) {
				 var vector2 = drag.all_rows('id_tabla_rutas');
				 drag.sort(vector2, 1);
				 // obj.update_order(vector2);
			}
	 });
 }

function selectedRow(){
	$("#id_tabla_rutas tr").click(function(){
		 $(this).addClass('selected').siblings().removeClass('selected');
		 var value = $(this).find('td:first').text();
		 console.log(value);
		 // obj.id_tprioritario = value;
		 // id_tprioritario = 0;
	});
}
