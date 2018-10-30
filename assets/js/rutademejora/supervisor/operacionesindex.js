$(function() {
    obj_supervisor = new Supervision();
    id_tprioritario_sup = 0;
    cct_escuela_log = 0;
});


function Supervision(){
  _this = this;

}

$("#slt_cct_excuelasxsuper").change(function(){
  // alert("canallita");
  var cct = $("#slt_cct_excuelasxsuper").val();
  var selected = $("#slt_cct_excuelasxsuper").find('option:selected');
  var turno = selected.data('turno');
  // alert(cct);
  $("#dv_btn_imprpdf").empty();
  $("#dv_btn_imprpdf").html("<a class='btn btn-primary'  title='Generar reporte' target='_blank' href= "+base_url+"Reporte/get_reporte_desde_sup/?cct="+cct+"&turno="+turno+">Imprimir ruta de mejora</a>");

});

$("#btn_get_rutamejoraxcct").click(function(){
  var cct = $("#slt_cct_excuelasxsuper").val();
  var selected = $("#slt_cct_excuelasxsuper").find('option:selected');
  var turno = selected.data('turno');
  // alert(turno);
  obj_supervisor.get_rutasxcct(cct, turno);
});

$("#btn_cargar_mensaje_super").click(function(){
  if (id_tprioritario_sup === undefined || id_tprioritario_sup == 0) {
    swal(
        '¡Error!',
        "Selecciona un tema prioritario ",
        "error"
      );
  }
  else {
    obj_supervisor.get_comentario_super();
    $('#exampleModalLong').modal('show');
  }
});



$("#btn_guarda_msg_super").click(function(){
  $.ajax({
    url: base_url+'rutademejora/get_mensaje_super',
    type: 'POST',
    dataType: 'JSON',
    data: {"idruta":id_tprioritario_sup, "mensaje":$("#mensajesupervisor").val()},
    beforeSend: function(xhr) {
          Notification.loading("");
      },
  })
  .done(function(data) {
    swal.close();
    swal(
        '¡Mensaje!',
        data.mensaje,
        "success"
      );
    $("#exampleModalLong").modal('hide');
  })
  .fail(function(e) {
    console.error("Al bajar la informacion"); console.table(e);
  })
  .always(function() {
        // swal.close();
  });
});

$("#btn_ver_ruta_super").click(function(){
  if (id_tprioritario_sup === undefined || id_tprioritario_sup == 0) {
    swal(
        '¡Error!',
        "Selecciona un tema prioritario ",
        "error"
      );
  }
  else {
    obj_supervisor.get_vista_acciones();
  }
});


Supervision.prototype.get_rutasxcct = function(cct, turno){
  $.ajax({
    url: base_url+'rutademejora/get_rutas_xcctsuper',
    type: 'POST',
    dataType: 'JSON',
    data: {"cct":cct, "turno":turno},
    beforeSend: function(xhr) {
          Notification.loading("");
      },
  })
  .done(function(data) {
    swal.close();
    cct_escuela_log = data.cct_escuela;
    var view = data.tabla;
    $("#contenedor_tabla_rutas").empty();
    $("#contenedor_tabla_rutas").append(view);
    obj_supervisor.funcionalidadselect();
  })
  .fail(function(e) {
    console.error("Al bajar la informacion"); console.table(e);
  })
  .always(function() {
        // swal.close();
  })

 };


 Supervision.prototype.funcionalidadselect = function(){
    $("#id_tabla_rutas_super tr").click(function(){
       $(this).addClass('selected').siblings().removeClass('selected');
       var value=$(this).find('td:first').text();
       // var value2=$(this).find('td:second').text();
       id_tprioritario_sup = value;
       // alert(obj_supervisor.id_tprioritario_sup);
    });
  }

Supervision.prototype.get_vista_acciones = function(){
  $.ajax({
    url: base_url+'rutademejora/get_vista_acciones',
    type: 'POST',
    dataType: 'JSON',
    data:{"idruta":id_tprioritario_sup, "nombreescuela":$("#slt_cct_excuelasxsuper option:selected").text()},
    beforeSend: function(xhr) {
          Notification.loading("");
      },
  })
  .done(function(data) {
    swal.close();
    var view = data.vista;
    $("#contenedor_vista_acciones").empty();
    $("#contenedor_vista_acciones").append(view);
    $("#modal_visor_acciones_id").modal("show");
  })
  .fail(function(e) {
    console.error("Al bajar la informacion"); console.table(e);
  })
  .always(function() {
        // swal.close();
  })
}

Supervision.prototype.get_comentario_super = function(){
  $.ajax({
    url: base_url+'rutademejora/get_comentario_super',
    type: 'POST',
    dataType: 'JSON',
    data:{"idtemarp":id_tprioritario_sup},
    beforeSend: function(xhr) {
          Notification.loading("");
      },
  })
  .done(function(data) {
    swal.close();
    var comentario = data.mensaje;
    $("#mensajesupervisor").val(comentario);
  })
  .fail(function(e) {
    console.error("Al bajar la informacion"); console.table(e);
  })
  .always(function() {
        // swal.close();
  })
}
