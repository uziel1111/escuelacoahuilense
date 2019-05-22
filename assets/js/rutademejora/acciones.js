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

$('#saliract').click(function(){
  obj_rm_acciones_tp.limpia_camposform();
  $('#exampleModalacciones').modal('toggle');
  obj.get_view();
})

$("#btn_rutamejora_acciones").click(function(){
  if (obj.id_tprioritario === undefined) {
    swal(
        '¡Error!',
        "Favor de seleccionar una línea de acción",
        "error"
      );
  }
  else {
    obj_rm_acciones_tp.get_view_acciones(obj.id_tprioritario);
    //llamado a la vista de acciones
  }
});

// $("#btn_agregar_accion").click(function(){
//   obj_rm_acciones_tp.validaform();
// });

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
           data:{ "id_tprioritario":id_tprioritario },
           success:function(data){
             var vista = data.tabla;
             // console.log(data.datos);
             // $("#div_generico").empty();
             // $("#div_generico").append(data.strView);
             // $("#contenedor_acciones_id").empty();
             // $("#contenedor_acciones_id").append(vista);
             $("#label_escuela").text(data.datos['escuela']);
             $("#label_prioridad").text(data.datos['prioridad']);
             $("#label_problematica").text(data.datos['problematicas']);
             $("#label_evidencia").text(data.datos['evidencias']);
             $("#id_objetivos").empty();
             $("#id_objetivos").append(data.stroption);
             getAccxObj()

             obj_rm_acciones_tp.iniciatabla();
           },
           error: function(error){
             console.log(error);
           }
       });

       // $("#myModal").modal("show");
       $("#exampleModalacciones").modal('show');
 };

Rm_acciones_tp.prototype.get_table_acciones= function(id_tprioritario){
  $.ajax({
          url:base_url+"rutademejora/get_table_acciones",
          method:"POST",
          data:{ "id_tprioritario":id_tprioritario,
                 "id_objetivo": $("#id_objetivos").val()
               },
          success:function(data){
            var vista = data.tabla;
            // alert($("#id_objetivos").val())
            // console.log(data.datos);
            // $("#div_generico").empty();
            // $("#div_generico").append(data.strView);
            $("#contenedor_acciones_id").empty();
            $("#contenedor_acciones_id").append(vista);
            $("#label_escuela").text(data.datos['escuela']);
            $("#label_prioridad").text(data.datos['prioridad']);
            $("#label_problematica").text(data.datos['problematicas']);
            $("#label_evidencia").text(data.datos['evidencias']);
            $("#id_objetivos").empty();
            $("#id_objetivos").append(data.stroption);

            obj_rm_acciones_tp.iniciatabla();
          },
          error: function(error){
            console.log(error);
          }
      });
}

 Rm_acciones_tp.prototype.save_accion = function(){
  var accion = $("#txt_rm_meta").val();
  var materiales = $("#txt_rm_obs").val();
  var id_responsable = $("#slc_rm_presp").val();
  var finicio = $("#datepicker1").val();
  var ffin = $("#datepicker2").val();
  var medicion = $("#txt_rm_indimed").val();
  var objetivo =$("#id_objetivos").val();
   $.ajax({
           url:base_url+"rutademejora/save_accion",
           method:"POST",
           data:{"accion":accion, "materiales":materiales, "ids_responsables":encargados,
            "finicio":finicio, "ffin":ffin, "medicion":medicion, 'id_tprioritario': obj.id_tprioritario, 'otroresp': $("#otro_responsable").val(), 'id_objetivo':objetivo
          },
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
  var id_objetivo = $("#id_objetivos").val();

  // alert(id_objetivo);

   $.ajax({
           url:base_url+"rutademejora/save_accion",
           method:"POST",
           data:{
             "id_accion": Rm_acciones_tp.id_accion_select,"id_ambito":id_ambito, "accion":accion, "materiales":materiales,
             "ids_responsables":encargados, "finicio":finicio, "ffin":ffin, "medicion":medicion,
             'id_tprioritario': obj.id_tprioritario,
             'otroresp': $("#otro_responsable").val(),
             'id_objetivo': id_objetivo
           },
           success:function(data){
             var vista = data.tabla;
             $("#contenedor_acciones_id").empty();
             $("#contenedor_acciones_id").append(vista);
             // getTablaAccxObj(id_objetivo)
             obj_rm_acciones_tp.iniciatabla();
             obj_rm_acciones_tp.limpia_camposform();
             $('#btn_editando_accion').hide();
             $('#btn_agregar_accion').show();
             $('#id_objetivos').val('0');
             $('#id_objetivos').attr('disabled', false);

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
               $("#id_objetivos").val('0');
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
   let id_objetivo = $('#id_objetivos').val()
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
            $("#id_objetivos").val(id_objetivo);
            $("#id_objetivos").attr('disabled', true);
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
  if($("#txt_rm_meta").val() != ""){
    if($("#txt_rm_obs").val() != ""){
      if($("#slc_rm_ambito").val() != ""){
        // console.log(encargados);
        if(sel_encargado == true){
          if($("#datepicker1").val() != ""){
            if($("#datepicker2").val() != ""){
              if($('#otro_responsable').is(':visible')  && $("#otro_responsable").val() != ""){
                    if(date_diff_indays() >= 0){
                      obj_rm_acciones_tp.save_accion();
                    }else{
                      swal(
                        '¡Error!',
                        "La fecha de termino no puede ser menor a la fecha de inicio",
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
                    // if($("#txt_rm_indimed").val() != ""){
                      if(date_diff_indays() >= 0){
                        obj_rm_acciones_tp.save_accion();
                      }else{
                        swal(
                          '¡Error!',
                          "La fecha de termino no puede ser menor a la fecha de inicio",
                          'danger'
                        );
                      }
                    // }else{
                    //   swal(
                    //     '¡Error!',
                    //     "Introudzca indicador de medición",
                    //     'danger'
                    //   );
                    // }
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
          "Seleccione ambito",
          'danger'
        );
      }
    }else{
      swal(
          '¡Error!',
          "Introduzca recursos",
          'danger'
        );
    }
  }else{
    swal(
          '¡Error!',
          "Introudzca actividad ",
          'danger'
        );
  }
 }


var date_diff_indays = function() {
  var date1 = $("#datepicker1").val(); //10/25/2018
  var date2 = $("#datepicker2").val(); //01/01/2019
  dt1 = new Date(date1);
  dt2 = new Date(date2);
return Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate()) ) /(1000 * 60 * 60 * 24));
}


//Guardar acciones por Objetivos
$('#btn_agregar_accion').click(function(){
  let id_tprioritario = obj.id_tprioritario
  let id_objetivo = $('#id_objetivos').val()
  // console.log('tema prioritario: '+id_tprioritario);
  // console.log('objetivo: '+id_objetivo);
  let accion = $("#txt_rm_meta").val();
  let materiales = $("#txt_rm_obs").val();
  let id_responsable = $("#slc_rm_presp").val();
  let finicio = $("#datepicker1").val();
  let ffin = $("#datepicker2").val();
  let medicion = $("#txt_rm_indimed").val();

  $.ajax({
    url:base_url+"rutademejora/save_accion",
    method:"POST",
    data:{  "accion":accion,
            "materiales":materiales,
            "ids_responsables":encargados,
            "finicio":finicio,
            "ffin":ffin,
            "medicion":medicion,
            'id_tprioritario': obj.id_tprioritario,
            'id_objetivo':id_objetivo,
            'otroresp': $("#otro_responsable").val()
   },
    success:function(data){
      var vista = data.tabla;
      // $("#contenedor_acciones_id").empty();
      // $("#contenedor_acciones_id").append(vista);
      //Aqui se van a cargar las acciones en base a los objetivos
      obj_rm_acciones_tp.iniciatabla();
      obj_rm_acciones_tp.limpia_camposform();
      setTimeout(function(){
        getTablaAccxObj(id_objetivo)
      }, 500)
      $('#id_objetivos').val('0');
    },
    error: function(error){
      console.log(error);
    }
  })
})


//Nuevas funciones grid objetivo

function getAccxObj(){
  $('#id_objetivos').change(function(){

    let id_objetivo = $('#id_objetivos').val()

    if ( id_objetivo != undefined ) {
      $.ajax({
        url: base_url+"rutademejora/getAccxObj",
        type: 'POST',
    		dataType: 'JSON',
    		data: { id_objetivo: id_objetivo },
        success:function(data){
          var vista = data.tabla;
          // console.log(data.datos);
          // $("#div_generico").empty();
          // $("#div_generico").append(data.strView);
          $("#contenedor_acciones_id").empty();
          $("#contenedor_acciones_id").append(vista);
          // $("#label_escuela").text(data.datos['escuela']);
          // $("#label_prioridad").text(data.datos['prioridad']);
          // $("#label_problematica").text(data.datos['problematicas']);
          // $("#label_evidencia").text(data.datos['evidencias']);
          // $("#id_objetivos").empty();
          // $("#id_objetivos").append(data.stroption);
          // getAccxObj()

          obj_rm_acciones_tp.iniciatabla();
        },
      })
    }
  })
  $("#exampleModalacciones").modal('show');
}

function getTablaAccxObj(id_objetivo){
  $.ajax({
    url: base_url+"rutademejora/getTablaAccxObj/"+id_objetivo,
    type: 'POST',
    dataType: 'JSON',
    data: { },
    success:function(data){
      var vista = data.tabla;

      $("#contenedor_acciones_id").empty();
      $("#contenedor_acciones_id").append(vista);
      obj_rm_acciones_tp.iniciatabla();
    }
  })
}
