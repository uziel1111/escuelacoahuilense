$(function() {
    obj_riesgo = new Riesgo();
});

function Riesgo(){
  _this = this;
}

$("#btn_buscar_ries_muni").click(function() {
  let id_minicipio = $("#slt_municipio_ries").val();
  let id_nivel = $("#slt_nivel_ries").val();
  let id_bimestre = $("#slt_bimestre_ries").val();
  let id_ciclo = $("#slt_ciclo_ries").val();
  var obj_grafica = new Grafica();

	$.ajax({
    url:  base_url+"riesgo/riesgoxmuni_graf",
    method: 'POST',
    data: {'id_minicipio':id_minicipio,'id_nivel':id_nivel,'id_bimestre':id_bimestre,'ciclo':"2017-2018"},
    beforeSend: function(xhr) {
      // obj_loader.show();
  },
  })
  .done(function( data ) {
	// obj_loader.hide();
	var q1 = parseInt(data.graph_pie_riesgo[0]['muy_alto']);
		var q2 = parseInt(data.graph_pie_riesgo[0]['alto']);
		var q3 = parseInt(data.graph_pie_riesgo[0]['medio']);
		var q4 = parseInt(data.graph_pie_riesgo[0]['bajo']);
	var t1 = parseInt(data.graph_bar_riesgo[0]['muyalto_1']);
		var t2 = parseInt(data.graph_bar_riesgo[0]['muyalto_2']);
		var t3 = parseInt(data.graph_bar_riesgo[0]['muyalto_3']);
		var t4 = parseInt(data.graph_bar_riesgo[0]['muyalto_4']);
		var t5 = parseInt(data.graph_bar_riesgo[0]['muyalto_5']);
		var t6 = parseInt(data.graph_bar_riesgo[0]['muyalto_6']);
		switch(id_nivel) {
		case '4':
							$("#dv_graf_riesgo_mun_zona").empty();
							$("#dv_tab_riesgo_mun_zona").empty();
              obj_grafica.TablaPieGraficaPie(q1,q2,q3,q4);
              obj_grafica.TablaPieGraficaBarPrimaria(t1,t2,t3,t4,t5,t6);

		break;
		case '5':
							$("#dv_graf_riesgo_mun_zona").empty();
							$("#dv_tab_riesgo_mun_zona").empty();
              obj_grafica.TablaPieGraficaPie(q1,q2,q3,q4);
              obj_grafica.TablaPieGraficaBarSecundaria(t1,t2,t3);
		break;


		default:

		break;

		}
  })
  .fail(function(e) {
    console.error("Error in "); console.table(e);
  });

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
