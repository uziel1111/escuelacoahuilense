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

$("#id_btn_elimina_accion").click(function(){
  // alert(Rm_acciones_tp.id_accion_select);
  if(Rm_acciones_tp.id_accion_select === undefined){
    swal(
        'Error!',
        "Favor de seleccionar una acción para eliminar ",
        "error"
      );
  }else{
    obj_rm_acciones_tp.delete_accion(Rm_acciones_tp.id_accion_select);
  }
});

$("#slc_rm_presp").change(function(){
  alert('funciona change');
  if($("#slc_rm_presp").val() == 0){
    $('#otro_responsable').show();
  }else{
    $('#otro_responsable').hide();
  }
})



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
             $("#contenedor_acciones_id").empty();
             $("#contenedor_acciones_id").append(vista);
             
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
           data:{"id_ambito":id_ambito, "accion":accion, "materiales":materiales, "id_responsable":id_responsable,
            "finicio":finicio, "ffin":ffin, "medicion":medicion, 'id_tprioritario': obj.id_tprioritario},
           success:function(data){
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
                'Correto!',
                "La accion se elimino correctamente",
                "success"
              );
              var vista = data.tabla;
               $("#contenedor_acciones_id").empty();
               $("#contenedor_acciones_id").append(vista);
               obj_rm_acciones_tp.iniciatabla();
            }else{
              swal(
                'Error!',
                "La operacion no se pudo completar intente nuevamente",
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
