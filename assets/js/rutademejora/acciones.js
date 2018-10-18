$(function() {
    obj_rm_acciones_tp = new Rm_acciones_tp();
    $("#div_otro_responsable").hide();
    // $('#otro_responsable').hide();
    $('#btn_editando_accion').hide();
    sel_encargado = false;

});

$("#cerrar_modal_acciones").click(function(){
  obj_rm_acciones_tp.limpia_camposform();
  $('#exampleModalacciones').modal('toggle');
  obj.get_view();
});

$("#btn_rutamejora_acciones").click(function(){
  if (obj.id_tprioritario === undefined) {
    swal(
        '¡Error!',
        "Favor de seleccionar un tema prioritario",
        "error"
      );
  }
  else {
    obj_rm_acciones_tp.get_view_acciones(obj.id_tprioritario);
    //llamado a la vista de acciones
  }
});

$("#btn_agregar_accion").click(function(){
  obj_rm_acciones_tp.validaform();
});

$("#id_btn_elimina_accion").click(function(){
  // alert(Rm_acciones_tp.id_accion_select);
  if(Rm_acciones_tp.id_accion_select === undefined){
    swal(
        '¡Error!',
        "Favor de seleccionar una acción para eliminar ",
        "error"
      );
  }else{
    swal({
      title: '¿Estas seguro de eliminar esta acción?',
      text: "Una véz eliminado no se podra recuperar",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Eliminar',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.value) {
        obj_rm_acciones_tp.delete_accion(Rm_acciones_tp.id_accion_select);
      }
    })
  }
});

$("#id_btn_edita_accion").click(function() {
  if(Rm_acciones_tp.id_accion_select === undefined){
    swal(
        '¡Error!',
        "Favor de seleccionar una acción para editar ",
        "error"
      );
  }else{
    obj_rm_acciones_tp.edit_accion(Rm_acciones_tp.id_accion_select);
  }
});

$("#btn_editando_accion").click(function(){
  obj_rm_acciones_tp.editar_accion()
});

$("#slc_responsables").change(function(){
  sel_encargado = true;
  var texto="";
  $("#slc_responsables option:selected").each(function() {
    texto += $(this).val() + ",";
   });
   encargados = texto.split(",");
   var i = encargados.indexOf("");
   encargados.splice( i, 1 );
   // alert(encargados);
   if( texto.indexOf("0,") > -1){
    $("#div_otro_responsable").show();
     // $('#otro_responsable').show();
   }else{
      $("#div_otro_responsable").hide();
      // $('#otro_responsable').hide();
   }
});



function Rm_acciones_tp(){
  _thisrm_delete_tp = this;
  id_accion_select = 0;
}


Rm_acciones_tp.prototype.get_view_acciones = function(id_tprioritario){
   $.ajax({
           url:base_url+"rutademejora/get_table_acciones",
           method:"POST",
           data:{"id_tprioritario":id_tprioritario},
           success:function(data){
             var vista = data.tabla;
             // console.log(data.datos);
             $("#contenedor_acciones_id").empty();
             $("#contenedor_acciones_id").append(vista);
             $("#label_escuela").text(data.datos['escuela']);
             $("#label_prioridad").text(data.datos['prioridad']);
             $("#label_problematica").text(data.datos['problematicas']);
             $("#label_evidencia").text(data.datos['evidencias']);

             obj_rm_acciones_tp.iniciatabla();
           },
           error: function(error){
             console.log(error);
           }
       });
       $("#exampleModalacciones").modal('show');
 };

 Rm_acciones_tp.prototype.save_accion = function(){
  var id_ambito = $("#slc_rm_ambito").val();
  var accion = $("#txt_rm_meta").val();
  var materiales = $("#txt_rm_obs").val();
  var id_responsable = $("#slc_rm_presp").val();
  var finicio = $("#datepicker1").val();
  var ffin = $("#datepicker2").val();
  var medicion = $("#txt_rm_indimed").val();
   $.ajax({
           url:base_url+"rutademejora/save_accion",
           method:"POST",
           data:{"id_ambito":id_ambito, "accion":accion, "materiales":materiales, "ids_responsables":encargados,
            "finicio":finicio, "ffin":ffin, "medicion":medicion, 'id_tprioritario': obj.id_tprioritario, 'otroresp': $("#otro_responsable").val()},
           success:function(data){
             var vista = data.tabla;
             $("#contenedor_acciones_id").empty();
             $("#contenedor_acciones_id").append(vista);
             obj_rm_acciones_tp.iniciatabla();
             obj_rm_acciones_tp.limpia_camposform();
           },
           error: function(error){
             console.log(error);
           }
       });
 };

Rm_acciones_tp.prototype.limpia_camposform = function(){
  $("#txt_rm_meta").val("");
  $("#txt_rm_obs").val("");
  $("#datepicker1").val("");
  $("#datepicker2").val("");
  $("#otro_responsable").val("");
  $("#txt_rm_indimed").val("");
  // $("#otro_responsable").hide();
  $("#div_otro_responsable").hide();
  $("#slc_rm_ambito").val("");
  $("#slc_rm_ambito").selectpicker("refresh");
  $("#slc_responsables").selectpicker('deselectAll');
}

 Rm_acciones_tp.prototype.editar_accion = function(){
  var id_ambito = $("#slc_rm_ambito").val();
  var accion = $("#txt_rm_meta").val();
  var materiales = $("#txt_rm_obs").val();
  var id_responsable = $("#slc_rm_presp").val();
  var finicio = $("#datepicker1").val();
  var ffin = $("#datepicker2").val();
  var medicion = $("#txt_rm_indimed").val();
   $.ajax({
           url:base_url+"rutademejora/save_accion",
           method:"POST",
           data:{"id_accion": Rm_acciones_tp.id_accion_select,"id_ambito":id_ambito, "accion":accion, "materiales":materiales,
           "ids_responsables":encargados, "finicio":finicio, "ffin":ffin, "medicion":medicion,
           'id_tprioritario': obj.id_tprioritario, 'otroresp': $("#otro_responsable").val()},
           success:function(data){
             var vista = data.tabla;
             $("#contenedor_acciones_id").empty();
             $("#contenedor_acciones_id").append(vista);
             obj_rm_acciones_tp.iniciatabla();
             obj_rm_acciones_tp.limpia_camposform();
             $('#btn_editando_accion').hide();
             $('#btn_agregar_accion').show();
           },
           error: function(error){
             console.log(error);
           }
       });
 };

 Rm_acciones_tp.prototype.iniciatabla = function(){
  $("#idtabla_accionestp tr").click(function(){
           $(this).addClass('selected').siblings().removeClass('selected');
           var value=$(this).find('td:first').text();
           // alert(value);
           Rm_acciones_tp.id_accion_select = value;
           // alert(Rm_acciones_tp.id_accion_select);
        });
 }

 Rm_acciones_tp.prototype.delete_accion = function(idaccion){
   $.ajax({
           url:base_url+"rutademejora/delete_accion",
           method:"POST",
           data:{"idaccion":idaccion, 'id_tprioritario': obj.id_tprioritario},
           success:function(data){
            if(data.mensaje == 'ok'){
              swal(
                '¡Correcto!',
                "La acción se elimino correctamente",
                "success"
              );
              var vista = data.tabla;
               $("#contenedor_acciones_id").empty();
               $("#contenedor_acciones_id").append(vista);
               obj_rm_acciones_tp.iniciatabla();
            }else{
              swal(
                '¡Error!',
                "La operación no se pudo completar intente nuevamente",
                "error"
              );
            }
             var vista = data.tabla;
             $("#contenedor_acciones_id").empty();
             $("#contenedor_acciones_id").append(vista);
             obj_rm_acciones_tp.iniciatabla();
           },
           error: function(error){
             console.log(error);
           }
       });
 };

 Rm_acciones_tp.prototype.edit_accion = function(idaccion){
   $.ajax({
           url:base_url+"rutademejora/edit_accion",
           method:"POST",
           data:{"idaccion":idaccion, 'id_tprioritario': obj.id_tprioritario},
           success:function(data){
            var editado = data.editado;
            // alert(editado['id_ambito']);
            $("#slc_rm_ambito").val(editado['id_ambito']);
            $("#slc_rm_ambito").selectpicker("refresh");
            $("#txt_rm_meta").val(editado['accion']);
            $("#txt_rm_obs").val(editado['mat_insumos']);
            $("#slc_rm_presp").val(editado['ids_responsables']);
            $("#slc_responsables").selectpicker('val', editado['ids_responsables'].split(','));
            // console.log('ids_responsables');
            var ids = editado['ids_responsables'].split(',');
            // console.log(ids);
            for(var i = 0; i < ids.length; i++){
                if(ids[i] == 0){
                    $('#otro_responsable').val(editado['otro_responsable']);
                    $("#div_otro_responsable").show();
                    // $('#otro_responsable').show();
                }
            }

            $("#txt_rm_indimed").val(editado['indcrs_medicion']);
             var inicio = editado['accion_f_inicio'].split("-");
             var fin = editado['accion_f_termino'].split("-");
            $("#datepicker1").val(inicio[1]+"/"+inicio[2]+"/"+inicio[0]);
            $("#datepicker2").val(fin[1]+"/"+fin[2]+"/"+fin[0]);
            $('#btn_editando_accion').show();
            $('#btn_agregar_accion').hide();
            // console.log(editado);
           },
           error: function(error){
             console.log(error);
           }
       });
 };

 Rm_acciones_tp.prototype.validaform = function(){
  if($("#slc_rm_ambito").val() != ""){
    if($("#txt_rm_meta").val() != ""){
      if($("#txt_rm_obs").val() != ""){
        // console.log(encargados);
        if(sel_encargado == true){
          if($("#datepicker1").val() != ""){
            if($("#datepicker2").val() != ""){
              if($('#otro_responsable').is(':visible')  && $("#otro_responsable").val() != ""){
                  if($("#txt_rm_indimed").val() != ""){
                    if(obj_rm_acciones_tp.validadate()){
                      obj_rm_acciones_tp.save_accion();
                    }else{
                      swal(
                        '¡Error!',
                        "La fecha de termino no puede ser menor a la fecha de inicio",
                        'danger'
                      );
                    }
                  }else{
                    swal(
                        '¡Error!',
                        "Introudzca indicador de medición",
                        'danger'
                      );
                  }
              }else{
                if($('#otro_responsable').is(':visible')  && $("#otro_responsable").val() == ""){
                    swal(
                        '¡Error!',
                        "Introduzca nombre del otro responsable",
                        'danger'
                      );
                  }else{
                    if($("#txt_rm_indimed").val() != ""){
                      if(obj_rm_acciones_tp.validadate()){
                        obj_rm_acciones_tp.save_accion();
                      }else{
                        swal(
                          '¡Error!',
                          "La fecha de termino no puede ser menor a la fecha de inicio",
                          'danger'
                        );
                      }
                    }else{
                      swal(
                        '¡Error!',
                        "Introudzca indicador de medición",
                        'danger'
                      );
                    }
                  }
              }
            }else{
              swal(
              '¡Error!',
              "Introudzca fecha de termino",
              'danger'
            );
            }
          }else{
            swal(
              '¡Error!',
              "Introudzca fecha de inicio",
              'danger'
            );
          }
        }else{
          swal(
          '¡Error!',
          "Seleccione un encargado",
          'danger'
        );
        }
      }else{
        swal(
          '¡Error!',
          "Introudzca materiales o insumos ",
          'danger'
        );
      }
    }else{
      swal(
          '¡Error!',
          "Introduzca una acción",
          'danger'
        );
    }
  }else{
    swal(
          '¡Error!',
          "Seleccione ámbito ",
          'danger'
        );
  }
 }


 Rm_acciones_tp.prototype.validadate = function(){
  var valida = false;
  var f_inicio = $("#datepicker1").val(); //10/09/2018
  var f_termino = $("#datepicker2").val(); //09/10/2018
  var f_inicio = f_inicio.split("/");
  var mes1 = f_inicio[0];
  var dia1 = f_inicio[1];
  var anio1 = f_inicio[2];
  var f_termino = f_termino.split("/");
  var mes2 = f_termino[0];
  var dia2 = f_termino[1];
  var anio2 = f_termino[2];
  if(anio2 >= anio1){
    anioval = true;
    valida = true;
    if(mes2 >= mes1){
      mesval = true;
      valida = true;
      if(dia2 >= dia1){
        valida = true;
      }else{
        if(mesval == true && dia2 >= dia1){
          valida = true;
        }else{
          return false;
        }
      }
    }else{
      if(anioval == true && mes2 >= mes1){
        valida = true;
      }else{
        return false;
      }
    }
  }
  return valida;
 }
