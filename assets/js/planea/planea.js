$(function(){
	graficar = new Graficasm();
});

$("#btn_busqueda_xestadomun").click(function(){
	$("#div_graficas_masivo").empty();
	if($("#slt_nivel_planeaxm").val() == 0){
		Notification.notification("", "Seleccione nivel", "info");
	}else{
		if($("#slt_campod_planeaxm").val() == '0'){
			Notification.notification("", "Seleccione campo disciplinario", "info");
		}else{
			Planea.get_xmunicipio();
		}
	}

})

$("#btn_busqueda_xregion").click(function(){
	$("#div_graficas_masivo").empty();
	if($("#slt_nivel_planeaxz").val() == 0){
		Notification.notification("", "Seleccione nivel", "info");
	}else{
		if($("#slt_subsostenimiento_planeaxz").val() == '0'){
			Notification.notification("", "Seleccione subsostenimiento", "info");
		}else{
			if($("#slt_zona_planea").val() == '0'){
				Notification.notification("", "Seleccione zona", "info");
			}else{
				if($("#slt_campod_planeaxz").val() == '0'){
					Notification.notification("", "Seleccione campo disciplinario", "info");
				}else{
					Planea.get_xregion();
				}
			}
			
		}
	}
});

$("#slt_nivel_planeaxz").change(function(){
	if($("#slt_nivel_planeaxz").val() == 0 || $("#slt_nivel_planeaxz") == '0'){
		Notification.notification("", "Seleccione nivel", "info");
	}else{
		Planea.get_subsostenimientoxnivel();
	}
});

$("#slt_subsostenimiento_planeaxz").change(function(){
	if($("#slt_subsostenimiento_planeaxz").val() == 0 || $("#slt_subsostenimiento_planeaxz") == '0'){
		Notification.notification("", "Seleccione subsostenimiento", "info");
	}else{
		Planea.get_zonaxnivelsostenimiento();
	}
	
});


const Planea = {

	get_xmunicipio(){
		$.ajax({
			url: base_url+'planea/get_xmunicipio',
			type: 'POST',
			dataType: 'JSON',
			data: {idmunicipio: $("#slt_municipio_mapa").val(), nivel: $("#slt_nivel_planeaxm").val(), periodo: $("#slt_periodo_planeaxm").val(), campodisip: $("#slt_campod_planeaxm").val()},
			beforeSend: function(xhr) {
						Notification.loading("");
				},
		})
		.done(function(result) {
			if($("#slt_campod_planeaxm").val() == 1){
				graficar.graficoplanea_ud_prim_lyc(result.datos, result.id_municipio, "municipio");
			}else{
				graficar.graficoplanea_ud_prim_mate(result.datos, result.id_municipio, "municipio");
			}
			
		})
		.fail(function(e) {
			console.error("Error in Planea.get_xmunicipio()"); console.table(e);
		})
		.always(function() {
			swal.close();
		});
	},

	get_xregion(){
		$.ajax({
			url: base_url+'planea/get_xregion',
			type: 'POST',
			dataType: 'JSON',
			data: {id_supervision: $("#slt_zona_planea").val(), nivel: $("#slt_nivel_planeaxz").val(), periodo: $("#slt_periodo_planeaxz").val(), campodisip: $("#slt_campod_planeaxz").val()},
			beforeSend: function(xhr) {
						Notification.loading("");
		    },
		})
		.done(function(result) {
			if($("#slt_campod_planeaxz").val() == 1){
				graficar.graficoplanea_ud_prim_lyc(result.datos, result.id_region, "zona");
			}else{
				graficar.graficoplanea_ud_prim_mate(result.datos, result.id_region, "zona");
			}
		})
		.fail(function(e) {
			console.error("Error in Planea.get_xregion()"); console.table(e);
		})
		.always(function() {
			swal.close();
		});
	},

	get_zonaxnivelsostenimiento(){
		$("#slt_zona_planea").empty();
		$.ajax({
			url: base_url+'planea/get_zonaxnivel',
			type: 'POST',
			dataType: 'JSON',
			data: {nivel: $("#slt_nivel_planeaxz").val(), idsubsostenimiento: $("#slt_subsostenimiento_planeaxz").val()},
			beforeSend: function(xhr) {
						Notification.loading("");
		    },
		})
		.done(function(result) {
			var zonas = result.zonas;
			for (var i = 0; i < zonas.length; i++) {
				$("#slt_zona_planea").append("<option value = "+zonas[i]['data']+">"+zonas[i]['label']+"</option>");
			}
		})
		.fail(function(e) {
			console.error("Error in Planea.get_xregion()"); console.table(e);
		})
		.always(function() {
			swal.close();
		});
	},

	get_subsostenimientoxnivel(){
		$("#slt_subsostenimiento_planeaxz").empty();
		$.ajax({
			url: base_url+'planea/get_subsostenimientoxnivel',
			type: 'POST',
			dataType: 'JSON',
			data: {nivel: $("#slt_nivel_planeaxz").val()},
			beforeSend: function(xhr) {
						Notification.loading("");
		    },
		})
		.done(function(result) {
			var subsostenimientos = result.subsostenimientos;
			for (var i = 0; i < subsostenimientos.length; i++) {
				$("#slt_subsostenimiento_planeaxz").append("<option value = "+subsostenimientos[i]['data']+">"+subsostenimientos[i]['label']+"</option>");
			}
			
		})
		.fail(function(e) {
			console.error("Error in Planea.get_xregion()"); console.table(e);
		})
		.always(function() {
			swal.close();
		});
	}

};
