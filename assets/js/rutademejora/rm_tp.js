$(function() {
    obj_rm_tp = new Rm_tp();
});

$("#btn_grabar_tp").click(function(){

  // obj_rm_tp = new Rm_tp();

  obj_rm_tp.insert_update_mision_cct();


  var validacion = obj_rm_tp.valida_campos_tp();

  if (validacion == true) {
    //obtenemos un array con los datos del archivo
    // var file = $("#imagen")[0].files[0];
    // //obtenemos el nombre del archivo
    // var fileName = file.name;
    // //obtenemos la extensión del archivo
    // fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
    // //obtenemos el tamaño del archivo
    // fileSize = file.size;
    // //obtenemos el tipo de archivo image/png ejemplo
    // var fileType = file.type;
    // //mensaje con la información del archivo
    // var formData = new FormData($(".formulario1")[0]);

    // alert(fileName);
    // console.log(fileName);
    var id_prioridad = $("#slc_rm_prioridad").val();
    var objetivo1 = $("#txt_rm_ob1").val();
    var meta1 = $("#txt_rm_met1").val();
    var objetivo2 = $("#txt_rm_ob2").val();
    var meta2 = $("#txt_rm_met2").val();
    var problematica = $("#txt_rm_problem").val();
    var evidencia = $("#txt_rm_eviden").val();
    var ids_progapoy="";
     $("#slc_pa option:selected").each(function() {
       ids_progapoy += $(this).val() + ",";
     });
     ids_progapoy = ids_progapoy.slice(0,-1);
    var otro_pa = $("#txt_rm_otropa").val();
    var como_prog_ayuda = $("#txt_rm_programayuda").val();
    var obs_direct = $("#txt_rm_obs_direc").val();
    var ids_apoyreq="";
     $("#slc_apoyoreq option:selected").each(function() {
       ids_apoyreq += $(this).val() + ",";
     });
     ids_apoyreq = ids_apoyreq.slice(0,-1);
    var otroapoyreq = $("#txt_rm_otroapoyreq").val();
    var especifiqueapyreq = $("#txt_rm_especifiqueapyreq").val();
    $("#id_id_prioridad").val(id_prioridad);
    $("#id_objetivo1").val(objetivo1);
    $("#id_meta1").val(meta1);
    $("#id_objetivo2").val(objetivo2);
    $("#id_meta2").val(meta2);
    $("#id_problematica").val(problematica);
    $("#id_evidencia").val(evidencia);
    $("#id_ids_progapoy").val(ids_progapoy);
    $("#id_otro_pa").val(otro_pa);
    $("#id_como_prog_ayuda").val(como_prog_ayuda);
    $("#id_obs_direct").val(obs_direct);
    $("#id_ids_apoyreq").val(ids_apoyreq);
    $("#id_otroapoyreq").val(otroapoyreq);
    $("#id_especifiqueapyreq").val(especifiqueapyreq);

    var formData = new FormData($(".formulario1")[0]);

    $.ajax({
    url: base_url+'rutademejora/insert_tema_prioritario',
    type: 'POST',
    dataType: 'JSON',
    data: formData,
    // data: {id_prioridad:id_prioridad,objetivo1:objetivo1,meta1:meta1,objetivo2:objetivo2,meta2:meta2,problematica:problematica,
    // evidencia:evidencia,ids_progapoy:ids_progapoy,otro_pa:otro_pa,como_prog_ayuda:como_prog_ayuda,obs_direct:obs_direct,
    // ids_apoyreq:ids_apoyreq,otroapoyreq:otroapoyreq,especifiqueapyreq:especifiqueapyreq,formData: formData},
    //necesario para subir archivos via ajax
    cache: false,
    contentType: false,
    processData: false,
    beforeSend: function(xhr) {
          Notification.loading("");
      },
  })
  .done(function(result) {
    swal.close();
    console.log(result.estatus);
    if (result.estatus) {
      // obj_rm_tp.subir_archivo();
      obj_rm_tp.limpia_campos_tp();

      swal(
		      'Correcto!',
		      "Se insertar tema prioritario correctamente",
		      'success'
		    );
        obj.get_view();
    }
    else {
      swal(
          'Error!',
          "Al insertar tema prioritario ",
          'danger'
        );
    }

  })
  .fail(function(e) {
    console.error("Error in insertar tema prioritario()"); console.table(e);
  })
  .always(function() {
        // swal.close();
  })

  }

});



function Rm_tp(){
  _thisrm_tp = this;
}

Rm_tp.prototype.valida_campos_tp = function(){

if ($("#slc_rm_prioridad").val()!='') {
  if ($("#txt_rm_ob1").val()!='' && $("#txt_rm_ob2").val()!='' && $("#txt_rm_met1").val()!='' && $("#txt_rm_met2").val()!='') {
    if ($("#txt_rm_problem").val() !='') {
      if ($("#txt_rm_eviden").val() !='') {
        if ($("#slc_pa").val() !='') {
          if ($("#txt_rm_programayuda").val() !='') {
            if ($("#txt_rm_obs_direc").val() !='') {
              if ($("#slc_apoyoreq").val() !='') {
                if ($("#txt_rm_especifiqueapyreq").val() !='') {
                  return true;
                }
                else {
                  swal(
                      'Error!',
                      "Favor de escribir especificación de los apoyos requeridos ",
                      "error"
                    );
                    return false;
                }
              }
              else {
                swal(
                    'Error!',
                    "Favor de seleccionar ¿Qué apoyo requerimos por parte de la SE para lograr estos objetivos? ",
                    "error"
                  );
                  return false;
              }
            }
            else {
              swal(
                  'Error!',
                  "Favor de escribir observaciones del director ",
                  "error"
                );
                return false;
            }
          }
          else {
            swal(
                'Error!',
                "Favor de escribir ¿Cómo ayudan los programas de apoyo? ",
                "error"
              );
              return false;
          }
        }
        else {
          swal(
              'Error!',
              "Favor de seleccionar programas educativos de apoyo",
              "error"
            );
            return false;
        }
      }
      else {
        swal(
            'Error!',
            "Favor de escribir evidencia",
            "error"
          );
          return false;
      }
    }
    else {
      swal(
          'Error!',
          "Favor de escribir problemática ",
          "error"
        );
        return false;
    }
  }
  else {
    swal(
        'Error!',
        "Favor de escribir metas y objetivos",
        "error"
      );
      return false;
  }
}
else {
  swal(
      'Error!',
      "Favor de seleccionar una prioridad del sistema básico de mejora",
      "error"
    );
    return false;
}

// alert(ids_apoyreq);

};

Rm_tp.prototype.insert_update_mision_cct = function(){
  var misioncct = $("#txt_rm_identidad").val();
  $.ajax({
  url: base_url+'rutademejora/insert_update_misioncct',
  type: 'POST',
  dataType: 'JSON',
  data: {misioncct:misioncct},
  beforeSend: function(xhr) {
        // Notification.loading("");
    },
})
.done(function(result) {
  // swal.close();
  console.log(result.estatus);

})
.fail(function(e) {
  console.error("Error in insertar mision cct()"); console.table(e);
})
.always(function() {
      // swal.close();
})
};

Rm_tp.prototype.limpia_campos_tp = function(){
  $("#slc_rm_prioridad").val("");;
  $("#slc_rm_prioridad").selectpicker("refresh");
  $("#txt_rm_ob1").val("");
  $("#txt_rm_met1").val("");
  $("#txt_rm_ob2").val("");
  $("#txt_rm_met2").val("");
  $("#txt_rm_problem").val("");
  $("#txt_rm_eviden").val("");
  $("#slc_pa").selectpicker('deselectAll');
  $("#txt_rm_otropa").val("");
  $("#txt_rm_programayuda").val("");
  $("#txt_rm_obs_direc").val("");
  $("#slc_apoyoreq").selectpicker('deselectAll');
  $("#txt_rm_otroapoyreq").val("");
  $("#txt_rm_especifiqueapyreq").val("");
  $("#imagen").val(null);
};

Rm_tp.prototype.subir_archivo = function(){
    //información del formulario
    var formData = new FormData($(".formulario1")[0]);
    var message = "";
    //hacemos la petición ajax
    $.ajax({
        url: base_url+'rutademejora/set_file',
        type: 'POST',
        // Form data
        //datos del formulario
        data: formData,
        //necesario para subir archivos via ajax
        cache: false,
        contentType: false,
        processData: false,
        //mientras enviamos el archivo
        beforeSend: function(){

        },
        //una vez finalizado correctamente
        success: function(data){
        	swal(
		      'Listo!',
		      'Su archivo se subio correctamente',
		      'success'
		    );
        	// $("#modal_operacion_recursos").modal('hide');
        	// obj_recursos.get_tabla();
        	// $("#idseleccionadofile").val("false");//regresa false la varible que valida si ya se a seleccionado un archivo
        	// $("#validaexixtente").val("false");//regresa en false la valicacion del archivo exixtente
        },
        //si ha ocurrido un error
        error: function(){
            // message = $("<span class='error'>Ha ocurrido un error.</span>");
            // showMessage(message);
        }
    });
}
