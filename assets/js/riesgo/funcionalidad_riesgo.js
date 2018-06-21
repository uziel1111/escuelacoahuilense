$(function() {
    obj_riesgo = new Riesgo();
});

function Riesgo(){
  _this = this;
}

$("#btn_buscar_ries_muni").click(function() {
  var id_minicipio = $("#slt_municipio_ries").val();
  var id_nivel = $("#slt_nivel_ries").val();
  var id_bimestre = $("#slt_bimestre_ries").val();
  var id_ciclo = $("#slt_ciclo_ries").val();

   var obj_grafica = new Grafica();
   obj_grafica.TablaPieGraficaPie();
   obj_grafica.TablaPieGraficaBarPrimaria();
  // alert(id_minicipio);
  // obj_riesgo.get_Niveles();
});



Riesgo.prototype.get_Niveles =function(){
	$.ajax({
		url: base_url+'mapa/get_niveles',
		type: 'POST',
		dataType: 'JSON',
		data: {idmunicipio: $("#slt_municipio_mapa").val()},
		beforeSend: function(xhr) {
	        obj_loader.show();
	    },
	})
	.done(function(result) {
		obj_loader.hide();
		$("#slt_nivel_mapa").empty();
		$("#slt_nivel_mapa").append(result.options);
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});

}
