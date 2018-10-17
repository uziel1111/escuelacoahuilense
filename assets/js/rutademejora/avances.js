$(function() {
    obj_rm_avances_acciones = new Rm_avances_acciones();
});


function Rm_avances_acciones(){
  _thisrm_avances_acciones = this;
}


Rm_avances_acciones.prototype.set_avance = function(cad_str_ids){

  var val_slc = $("#".concat(cad_str_ids)).val();
  var arr_res = cad_str_ids.split("_");
  var var_id_cte = arr_res[0];
  var var_id_cct = arr_res[1];
  var var_id_idtp = arr_res[2];
  var var_id_idacc = arr_res[3];

  $.ajax({
  url: base_url+'rutademejora/set_avance',
  type: 'POST',
  dataType: 'JSON',
  data: {var_id_cct:var_id_cct,var_id_idtp:var_id_idtp,var_id_idacc:var_id_idacc,var_id_cte:var_id_cte,val_slc:val_slc},
  beforeSend: function(xhr) {
        Notification.loading("");
    },
})
.done(function(result) {
  swal.close();
  console.log(result.estatus);
  if (result.estatus) {
    swal(
        'Correcto!',
        "Se actualizo tema prioritario correctamente",
        'success'
      );

  }
  else {
    swal(
        'Error!',
        "Al actualizar tema prioritario ",
        'error'
      );
  }

})
.fail(function(e) {
  console.error("Error in actualizar tema prioritario()"); console.table(e);
})
.always(function() {
      // swal.close();
})

 };
