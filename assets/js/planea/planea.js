$(function(){
	graficar = new Graficasm();
});

$("#btn_busqueda_xestadomun").click(function(){
	if($("#slt_nivel_planeaxm").val() == 0){
		Notification.notification("", "Seleccione nivel", "info");
	}else{
		Planea.get_xmunicipio();
	}

})

$("#btn_busqueda_xregion").click(function(){
	if($("#slt_nivel_planeaxz").val() == 0){
		Notification.notification("", "Seleccione nivel", "info");
	}else{
		Planea.get_xregion();
	}
});


const Planea = {

	get_xmunicipio(){
		$.ajax({
			url: base_url+'planea/get_xmunicipio',
			type: 'POST',
			dataType: 'JSON',
			data: {idmunicipio: $("#slt_municipio_mapa").val(), nivel: $("#slt_nivel_planeaxm").val(), periodo: $("#slt_periodo_planeaxm").val()},
			beforeSend: function(xhr) {
						Notification.loading("");
				},
		})
		.done(function(result) {
			graficar.graficoplanea_ud_prim_lyc(result.datos_lyc, result.id_municipio, "municipio");
			graficar.graficoplanea_ud_prim_mate(result.datos_mate, result.id_municipio, "municipio");
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
			data: {id_supervision: $("#slt_zona_planea").val(), nivel: $("#slt_nivel_planeaxz").val(), periodo: $("#slt_periodo_planeaxz").val()},
			beforeSend: function(xhr) {
						Notification.loading("");
		    },
		})
		.done(function(result) {
			graficar.graficoplanea_ud_prim_lyc(result.datos_lyc, result.id_region, "zona");
			graficar.graficoplanea_ud_prim_mate(result.datos_mate, result.id_region, "zona");
		})
		.fail(function(e) {
			console.error("Error in Planea.get_xregion()"); console.table(e);
		})
		.always(function() {
			swal.close();
		});
	}

};
