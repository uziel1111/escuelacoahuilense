$(function() {
    obj_rm_avances_acciones = new Rm_avances_acciones();
});


function Rm_avances_acciones(){
  _thisrm_avances_acciones = this;
}


Rm_avances_acciones.prototype.set_avance = function(cad_str_ids){
  alert(cad_str_ids);
   // $.ajax({
   //         url:base_url+"rutademejora/get_view_acciones",
   //         method:"POST",
   //         data:{"id_tprioritario":id_tprioritario},
   //         success:function(data){
   //           var vista = data.str_view;
   //           $("#contenedor_modal").empty();
   //           $("#contenedor_modal").append(vista);
   //           $("#exampleModalacciones").modal('show');
   //           obj.inicio();
   //         },
   //         error: function(error){
   //           console.log(error);
   //         }
   //     });
 };
