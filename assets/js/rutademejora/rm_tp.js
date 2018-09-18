$(function() {
    obj_rm_tp = new Rm_tp();
});
$("#btn_grabar_tp").click(function(){
  obj_rm_tp = new Rm_tp();
  var misioncct = $("#txt_rm_identidad").val();
  $.ajax({
  url: base_url+'rutademejora/insert_misioncct',
  type: 'POST',
  dataType: 'JSON',
  data: {misioncct:misioncct},
  beforeSend: function(xhr) {
        Notification.loading("");
    },
})
.done(function(result) {
  swal.close();
  console.log(result.estatus);

})
.fail(function(e) {
  console.error("Error in insertar mision cct()"); console.table(e);
})
.always(function() {
      // swal.close();
})
  var id_prioridad = $("#slc_rm_prioridad").val();
  var objetivo1 = $("#txt_rm_ob1").val();
  var meta1 = $("#txt_rm_met1").val();
  var objetivo2 = $("#txt_rm_ob2").val();
  var meta2 = $("#txt_rm_met2").val();
  var problematica = $("#txt_rm_problem").val();
  var evidencia = $("#txt_rm_eviden").val();
  var ids_progapoy = $("#slc_pa").val();
  var otro_pa = $("#txt_rm_otropa").val();
  var como_prog_ayuda = $("#txt_rm_programayuda").val();
  var obs_direct = $("#txt_rm_obs_direc").val();
  var ids_apoyreq = $("#slc_apoyoreq").val();
  var otroapoyreq = $("#txt_rm_otroapoyreq").val();
  var especifiqueapyreq = $("#txt_rm_especifiqueapyreq").val();
  if (obj_rm_tp.valida_campos_tp()) {

    $.ajax({
    url: base_url+'rutademejora/insert_tema_prioritario',
    type: 'POST',
    dataType: 'JSON',
    data: {id_prioridad:id_prioridad,objetivo1:objetivo1,meta1:meta1,objetivo2:objetivo2,meta2:meta2,problematica:problematica,
    evidencia:evidencia,ids_progapoy:ids_progapoy,otro_pa:otro_pa,como_prog_ayuda:como_prog_ayuda,obs_direct:obs_direct,
    ids_apoyreq:ids_apoyreq,otroapoyreq:otroapoyreq,especifiqueapyreq:especifiqueapyreq},
    beforeSend: function(xhr) {
          Notification.loading("");
      },
  })
  .done(function(result) {
    swal.close();
    console.log(result.estatus);

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
                      'danger'
                    );
                    return false;
                }
              }
              else {
                swal(
                    'Error!',
                    "Favor de seleccionar ¿Qué apoyo requerimos por parte de la SE para lograr estos objetivos? ",
                    'danger'
                  );
                  return false;
              }
            }
            else {
              swal(
                  'Error!',
                  "Favor de escribir observaciones del director ",
                  'danger'
                );
                return false;
            }
          }
          else {
            swal(
                'Error!',
                "Favor de escribir ¿Cómo ayudan los programas de apoyo? ",
                'danger'
              );
              return false;
          }
        }
        else {
          swal(
              'Error!',
              "Favor de seleccionar programas educativos de apoyo",
              'danger'
            );
            return false;
        }
      }
      else {
        swal(
            'Error!',
            "Favor de escribir evidencia",
            'danger'
          );
          return false;
      }
    }
    else {
      swal(
          'Error!',
          "Favor de escribir problemática ",
          'danger'
        );
        return false;
    }
  }
  else {
    swal(
        'Error!',
        "Favor de escribir metas y objetivos",
        'danger'
      );
      return false;
  }
}
else {
  swal(
      'Error!',
      "Favor de seleccionar una prioridad del sistema básico de mejora",
      'danger'
    );
    return false;
}


// alert(ids_apoyreq);

};
