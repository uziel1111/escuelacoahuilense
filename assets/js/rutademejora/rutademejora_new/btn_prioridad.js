$(document).ready(function(){
	obj_prioridad = new Prioridad();
	// $('#normalidad').attr('hidden', true);
	// boxes()
	$('#tooltip-demo').tooltip()
	$('#writeText').tooltip()
	$('#grabar_objetivo').tooltip()
	$('#limpiar').tooltip()
})

//Eventos
$('#opt_prioridad_especial').change(function(){
	if ( $('#opt_prioridad_especial').val() != 0 ) {
		obj_prioridad.llenaIndicador();
		obj_prioridad.getObjetivos($("#opt_prioridad").val(),$("#opt_prioridad_especial").val());
		$('#opt_prioridad_especial').attr('disabled', true)
	}
})

// $('#opt_prioridad').change(function(){
// 	alert('Bloqueando')
// 	if ($('#opt_prioridad').val() != 0) {
// 		$('#opt_prioridad').attr('disabled', true)
// 	}
// })

$('#slt_indicador').change(function(){
	if ($('#slt_indicador').val() != 0 ) {
		obj_prioridad.llenaMetrica()
	}
})

$('#limpiar').click(function(){
	// console.log('Funciona!');
	$('#slt_verbo').val('0');
	$('#slt_indicador').val('0');
	$('#slt_metrica').val('0');
	$('#slt_meta').val('0');
	$('#slt_fecha').val('0');
	$('#CAPoutput').val('');
})

$('#userFile').change(function(){
	if(this.files[0].size > 5242880){
		swal(
			'¡Error!',
			"El archivo no debe de superar los 5MB",
			'error'
		);
	} else {
		var name = this.files[0].name;
		var ext = (this.files[0].name).split('.').pop();

		switch (ext) {
			case 'jpg':
			case 'jpeg':
			case 'png':
			case 'pdf':
			case 'JPG':
			case 'JPEG':
			case 'PNG':
			case 'PDF':
			break;

			default:
				swal(
					'¡Error!',
					"El archivo no tiene la extensión adecuada",
					'error'
				);
				this.value = ''; // reset del valor
				this.files[0].name = '';
		}
		$('#file_name').empty();
		$('#file_name').html(name);
	}
})

$('#salir').click(function(){
	$('#myModal').modal('hide');
	obj.get_view();
})

$('#close').click(function(){
	obj.get_view();
})

$('#delete_file').click(function(){
	$('#elimina_recurso').val('true')

})

function Prioridad(){
  _thismap = this;
}

//Funciones
Prioridad.prototype.llenaIndicador = function(){
	$.ajax({
		url: base_url+'Rutademejora/llenaIndicador',
		type: 'POST',
		dataType: 'JSON',
		data: { nivel:$("#nivel").val(),
						id_prioridad: $("#opt_prioridad").val(),
						id_subprioridad: $("#opt_prioridad_especial").val()},
		beforeSend: function(xhr) {
        Notification.loading("");
    },
	})
	.done(function(result) {
		$("#slt_indicador").empty();
		$("#slt_indicador").append(result.stroption);
	})
	.fail(function(e) {
		console.error("Error in llenaIndicador()");
	})
	.always(function() {
    swal.close();
	});
}

Prioridad.prototype.llenaMetrica = function(){
	$.ajax({
		url: base_url+'Rutademejora/getMetrica',
		type: 'POST',
		dataType: 'JSON',
		data: {id_indicador: $("#slt_indicador").val()},
		beforeSend: function(xhr) {
				 // $("#slt_metrica").empty();
	        Notification.loading("");
    },
	})
	.done(function(result) {
		$("#slt_metrica").empty();
		$("#slt_metrica").append(result.stroption);
	})
	.fail(function(e) {
		console.error("Error in llenaMetrica()");
	})
	.always(function() {
    swal.close();
	});
}


Prioridad.prototype.getsubEspecial = function(){
	$.ajax({
		url: base_url+'Rutademejora/getsubEspecial',
		type: 'POST',
		dataType: 'JSON',
		data: {idprioridad: $("#opt_prioridad").val()},
		beforeSend: function(xhr) {
	        Notification.loading("");
    },
	})
	.done(function(result) {
		$("#opt_prioridad_especial").empty();
		$("#opt_prioridad_especial").append(result.stroption);
		$('#normalidad').attr('hidden', false);
	})
	.fail(function(e) {
		console.error("Error in getsubEspecial()");
	})
	.always(function() {
    swal.close();
	});
};


Prioridad.prototype.getObjetivos = function(){
	var idtemaprioritario = $("#id_tema_prioritario").val();
	if(idtemaprioritario != 0){
		$.ajax({
			url: base_url+'Rutademejora/getObjetivos',
			type: 'POST',
			dataType: 'JSON',
			data: {idtpriotario: $("#id_tema_prioritario").val(),
						 idprioridad:$("#opt_prioridad").val(),
						 idsubprioridad:$("#opt_prioridad_especial").val()
					 },
			beforeSend: function(xhr) {
		        Notification.loading("");
	    },
		})
		.done(function(result) {
			$("#objetivo_meta").empty();
			$("#objetivo_meta").append(result.table);

			$('#tema_prioritario').val(result.id_tprioritario);
			$('#id_objetivo').val(result.id_objetivo);
			// obj_prioridad.btnEditar();
			// btnEditar();
		})
		.fail(function(e) {
			console.error("Error in getObjetivos()");
		})
		.always(function() {
	    swal.close();
		});
	}
}

//Aqui disparamos todas las funciones del modal
function show(select_id){
	// alert(select_id)
	let opt = $('#opt_prioridad').val();
	// console.log(opt);
	if (opt == 1) {
		obj_prioridad.getsubEspecial();
		obj_prioridad.llenaIndicador();
		$('#opt_prioridad').attr('disabled', true)
	} else {
		$('#opt_prioridad').attr('disabled', true)
		$('#normalidad').attr('hidden', true);
		obj_prioridad.llenaIndicador();
		obj_prioridad.getObjetivos(opt,0);
	}

	hiddenDiv1.style.display='block';
}

$('#writeText').click(function(){
	// $('#slt_verbo option:selected').val();
	let verbo = $('#slt_verbo').val();
	let indicador = $('#slt_indicador').val();
	// let indicador = $('#slt_indicador').val();
	let metrica = $('#slt_metrica').val();
	// let metrica = $('#slt_metrica').val();
	let meta = $('#slt_meta option:selected').val();
	let fecha = $('#slt_fecha option:selected').val();

	if (verbo == '0' && indicador == '0' && metrica == '0' && meta == '0' && fecha  == '0') {
		swal(
			'¡Error!',
			"Por favor seleccione al menos una opción",
			'error'
		);
	} else {
			let contenido = $('#slt_verbo option:selected').text() + ' ' + $('#slt_indicador option:selected').text() + ' ' + $('#slt_metrica option:selected').text() + ' ' + $('#slt_meta option:selected').text() + ' ' + $('#slt_fecha option:selected').text()

			$('#CAPoutput').val(contenido);
	}
})


//Grabar prioridad
$('#grabar_prioridad').click(function(){
	// alert('Funciona')
	let formData = new FormData($('#t_prioritario')[0])
	$.ajax({
		url: base_url+'Rutademejora/grabarTema',
		type: 'POST',
		dataType: 'JSON',
		cache: false,
    contentType: false,
    processData: false,
		data: formData,
		beforeSend: function(xhr) {
	        Notification.loading("");
    },
	})
	.done(function(result) {
		setTimeout(function () {
			swal(
					'¡Correcto!',
					"El tema prioritario se insertó correctamente",
					'success'
				);
		}, 1000);
		obj_prioridad.getObjetivos();
		obj.get_view();
	})
	.fail(function(e) {
		console.error("Error in grabarTema()");
	})
	.always(function() {
    swal.close();
	});

})
//Grabar prioridad

//Grabar objetivo
$('#grabar_objetivo').click(function(){

	let idtemap = $('#id_tema_prioritario').val()
	let flag = $('#update_flag').val()
	let contenido = $('#CAPoutput').val()

	// if (contenido.length > 10) {
	// 	alert('Texto muy largo')
	// }

	if (contenido == '') {
		swal(
			'¡Error!',
			"Por favor ingrese un objetivo",
			'error'
		);
	}else if (contenido.length > 400) {
		swal(
			'¡Error!',
			"No puede ingresar mas de 400 caracteres",
			'error'
		);
		return false
	}
	else {

		if (flag == 0) {
			$.ajax({
				url: base_url+'Rutademejora/agregarObjetivo',
				type: 'POST',
				dataType: 'JSON',
				data: {
								id_temaprioritario : idtemap,
								id_subprioridad : $("#opt_prioridad_especial").val(),
								id_prioridad: $("#opt_prioridad").val(),
								objetivo: $('#CAPoutput').val()
							},
				beforeSend: function(xhr) {
			        Notification.loading("");
		    },
			})
			.done(function(result) {

				setTimeout(function () {
					swal(
							'¡Correcto!',
							"El objetivo se insertó correctamente",
							'success'
						);
						obj_prioridad.getObjetivos($("#opt_prioridad").val(),$("#opt_prioridad_especial").val());
				}, 1000);

				$("#id_tema_prioritario").val(result.idtemaprioritario);
				$("#opt_prioridad").attr('disabled', true);
				$("#opt_prioridad_especial").attr('disabled', true);
			})
			.fail(function(e) {
				console.error("Error in agregar_objetivo()");
			})
			.always(function() {
		    swal.close();
			});
		} else {
			$.ajax({
				url: base_url+'Rutademejora/actualizarObjetivo',
				type: 'POST',
				dataType: 'JSON',
				data: { id_objetivo: flag,
								objetivo: $('#CAPoutput').val()
							},
				beforeSend: function(xhr) {
			        Notification.loading("");
		    },
			})
			.done(function(result) {
				obj_prioridad.getObjetivos();
				$('#update_flag').val('')
				setTimeout(function () {
					swal(
							'¡Correcto!',
							"El objetivo se actualizó correctamente",
							'success'
						);
				}, 1000);

				$("#id_tema_prioritario").val(result.idtemaprioritario);
				$("#opt_prioridad").attr('disabled', true);
				$("#opt_prioridad_especial").attr('disabled', true);
			})
			.fail(function(e) {
				console.error("Error in agregar_objetivo()");
			})
			.always(function() {
		    swal.close();
			});

		}
			$("#CAPoutput").val("");
	}

	//


})
//Grabar objetivo


// Grid
function btnEditar(idobjetivo, idtprioritario){
	console.log(idobjetivo);
	console.log(idtprioritario);
	$.ajax({
		url: base_url+'Rutademejora/btnEditar',
		type: 'POST',
		dataType: 'JSON',
		data: { id_objetivo: idobjetivo,
						id_tprioritario: idtprioritario
					},
		beforeSend: function(xhr) {
	        Notification.loading("");
    },
	})
	.done(function(result) {
		$("#CAPoutput").empty();
		$("#CAPoutput").val(result.datos['objetivo']);
		$('#update_flag').val(idobjetivo);
		// $("#CAPoutput").append(result.datos);
		// $('#normalidad').attr('hidden', false);
	})
	.fail(function(e) {
		console.error("Error in btnEditar()");
	})
	.always(function() {
    swal.close();
	});

}

function btnEliminar(idobjetivo){
	swal({
		title: '¿Esta seguro de eliminar el tema prioritario?',
		text: "Una vez eliminado no se podra recuperar",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Eliminar',
		cancelButtonText: 'Cancelar'
	})
	.then((result) => {
		if (result.value) {
			console.log(result.value);
			$.ajax({
				url: base_url+'Rutademejora/btnEliminar',
				type: 'POST',
				dataType: 'JSON',
				data: { id_objetivo: idobjetivo },
				beforeSend: function(xhr) {
			        Notification.loading("");
		    },
			}) //Ajax
			.done(function(result) {
				swal(
	        '¡Correcto!',
	        "Se eliminó el tema prioritario correctamente",
	        'success'
	      );
				//Recargamos el grid
				setTimeout(function(){
					obj_prioridad.getObjetivos();
				}, 1000)
			})
			.fail(function(e) {
				console.error("Error in btnEditar()");
			})
			.always(function() {
		    swal.close();
			});
		}

	})


}
