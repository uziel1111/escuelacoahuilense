$(function() {
    obj_panel = new Panel();
});

$("#btn_mostrar_datos_rec").click(function(){
	obj_panel.get_reactivos();
})

$("#md_close_visor_recursos").click(function(){
	$("#modal_visor_recursos").modal('hide');
  obj_panel.get_reactivos();
})

function Panel(){
  _thismap = this;
}

Panel.prototype.get_reactivos =function(){
	$.ajax({
		url: base_url+'panel/get_reactivos_recursos',
		type: 'POST',
		dataType: 'JSON',
		data: {periodo: $("#slt_periodo_reactivos").val(), campo_dis: $("#slt_campod_reactivos").val() },
		beforeSend: function(xhr) {
	        Notification.loading("");
	    },
	})
	.done(function(result) {
		$("#contenedor_tabla").empty();
		console.log(result);
		var table = "";
		$("#contenedor_tabla").append(result);

	})
	.fail(function(e) {
		console.error("Error in get_Niveles()"); console.table(e);
	})
	.always(function() {
    swal.close();
	});

}


Panel.prototype.get_tabla = function(idreactivo){
	$.ajax({
		url: base_url+'panel/get_tabla_recursosJS',
		type: 'POST',
		dataType: 'JSON',
		data: {id_reactivo: idreactivo},
		beforeSend: function(xhr) {
	        Notification.loading("");
	    },
	})
	.done(function(result) {
		console.log(result.totalre);
		$("#div_contenedor_de_tablarec").empty();
		$("#div_contenedor_hidden").empty();
		$("#div_contenedor_de_tablarec").append(result.tabla);
		$("#div_contenedor_hidden").append("<input type='hidden' id='input_id_reactivo' value = "+idreactivo+">");
		$("#div_contenedor_hidden").append("<input type='hidden' id='total_reactivos' value = "+result.totalre+">");
		$("#modal_visor_recursos").modal('show');
	})
	.fail(function(e) {
		console.error("Error in get_Niveles()"); console.table(e);
	})
	.always(function() {
    swal.close();
	});
}

Panel.prototype.show_apoyo = function(path_apoyo){
	var html = "<div style='text-align:left !important;'>";
      html += "<table class='table table-condensed'>";
      html += "<tbody> ";
      html += "    <tr>";
      html += "      <td><center>";
        html += "<img style='width: 100%;' src='http://www.sarape.gob.mx/assets/docs/planea_reactivos/"+path_apoyo+"' class='img-responsive center-block' />";
        html += "      </center></td>";
        html += "    </tr>";
    html += "</tbody>";
      html += "</table>";

      html += "</div>";

    $('#modal_visor_apoyo_react .modal-body #div_cont_apoyo').empty();
    $('#modal_visor_apoyo_react .modal-body #div_cont_apoyo').html(html);


    $("#modal_visor_apoyo_react").modal("show");
}

Panel.prototype.modal_reactivo = function(path_react){

    var html = "<div style='text-align:left !important;'>";
      html += "<table class='table table-condensed'>";
      html += "<tbody> ";
      html += "    <tr>";
      html += "      <td><center>";
        html += "<img style='width: 100%;' src='http://www.sarape.gob.mx/assets/docs/planea_reactivos/"+path_react+"' class='img-responsive center-block' />";
        html += "      </center></td>";
        html += "    </tr>";
    html += "</tbody>";
      html += "</table>";

      html += "</div>";

    $('#modal_visor_reactivos_zom .modal-body #div_listalinks').empty();
    $('#modal_visor_reactivos_zom .modal-body #div_listalinks').html(html);


    $("#modal_visor_reactivos_zom").modal("show");
}
