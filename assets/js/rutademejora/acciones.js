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





function Rm_acciones_tp(){
  _thisrm_delete_tp = this;
}


Rm_acciones_tp.prototype.get_view_acciones = function(id_tprioritario){
   $.ajax({
           url:base_url+"rutademejora/get_view_acciones",
           method:"POST",
           data:{"id_tprioritario":id_tprioritario},
           success:function(data){
             var vista = data.str_view;
             $("#contenedor_modal").empty();
             $("#contenedor_modal").append(vista);
             $("#exampleModalacciones").modal('show');
             obj.inicio();
           },
           error: function(error){
             console.log(error);
           }
       });
 };