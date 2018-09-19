$(function() {
    obj_rm_acciones_tp = new Rm_acciones_tp();
});

$("#btn_rutamejora_acciones").click(function(){
  if (obj.id_tprioritario === undefined) {
    swal(
        'Error!',
        "Favor de seleccionar un tema prioritario a eliminar ",
        "error"
      );
  }
  else {
    obj_rm_acciones_tp.get_view_acciones(obj.id_tprioritario);
    //llamado a la vista de acciones
  }
});

$("#btn_agregar_accion").click(function(){
  obj_rm_acciones_tp.save_accion();
});





function Rm_acciones_tp(){
  _thisrm_delete_tp = this;
}


Rm_acciones_tp.prototype.get_view_acciones = function(id_tprioritario){
   // $.ajax({
   //         url:base_url+"rutademejora/get_view_acciones",
   //         method:"POST",
   //         data:{"id_tprioritario":id_tprioritario},
   //         success:function(data){
   //           var vista = data.str_view;
   //           $("#contenedor_modal").empty();
   //           $("#contenedor_modal").append(vista);
             
   //           // obj.inicio();
   //         },
   //         error: function(error){
   //           console.log(error);
   //         }
   //     });
       $("#exampleModalacciones").modal('show');
 };

 Rm_acciones_tp.prototype.save_accion = function(){
  var id_ambito = $("#slc_rm_ambito").val();
  console.log("id_ambito: "+ id_ambito);
  var accion = $("#txt_rm_meta").val();
  console.log("accion: "+ accion);
  var materiales = $("#txt_rm_obs").val();
  console.log("materiales: "+ materiales);
  var id_responsable = $("#slc_rm_presp").val();
  console.log("id_responsable: "+ id_responsable);
  var finicio = $("#datepicker1").val();
  console.log("finicio: "+ finicio);
  var ffin = $("#datepicker2").val();
  console.log("ffin: "+ ffin);
  var medicion = $("#txt_rm_indimed").val();
  console.log("medicion: "+ medicion);
   $.ajax({
           url:base_url+"rutademejora/save_accion",
           method:"POST",
           data:{"id_ambito":id_ambito, "accion":accion, "materiales":materiales, "id_responsable":id_responsable,
            "finicio":finicio, "ffin":ffin, "medicion":medicion, 'id_tprioritario': obj.id_tprioritario},
           success:function(data){
             // var vista = data.str_view;
             // $("#contenedor_modal").empty();
             // $("#contenedor_modal").append(vista);
             
             // obj.inicio();
           },
           error: function(error){
             console.log(error);
           }
       });
 };