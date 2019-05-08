$(document).ready(function () {
   obj = new Tabla();
   obj.get_view();
});


function Tabla(){
   _this = this;
   id_tprioritario = 0;
}


 Tabla.prototype.inicio = function(){
      drag = null;
      drag = new Drag();
      $("#id_tbody_demo").css( 'cursor', 'pointer' );
      $("#id_tbody_demo").sortable({
        start: function( event, ui ) {
          var vector = drag.all_rows('id_tabla_rutas');
          drag.remove_empty(vector)
        },
         stop: function( event, ui ) {
            var vector2 = drag.all_rows('id_tabla_rutas');
            drag.sort(vector2, 1);
            obj.update_order(vector2);
         }
      });
  };

  Tabla.prototype.get_view = function(){
    $.ajax({
      url: base_url+"Rutademejora/bajarutamejora",
      data : "",
      type : 'POST',
      beforeSend: function(xhr) {
        $("#wait").modal("show");
      },
      success: function(data){
        $("#wait").modal("hide");
        var view = data.tabla;
        $("#contenedor_tabla").empty();
        $("#contenedor_tabla").append(view);
        obj.inicio();
        obj.funcionalidadselect();
        if(data.tamanio == 0){
          $("#btn_get_reporte").hide();
        }else{
          $("#btn_get_reporte").show();
        }
      },
      error: function(error){console.log("Falló:: "+JSON.stringify(error)); }
    });
  }

  Tabla.prototype.update_order = function(datos){
   $.ajax({
           url:base_url+"rutademejora/update_order",
           method:"POST",
           data:{"orden":datos},
           success:function(data){
             var tabla = data.tabla;
             $("#contenedor_tabla").empty();
             $("#contenedor_tabla").append(tabla);
             obj.inicio();
             obj.funcionalidadselect();
           },
           error: function(error){
             console.log(error);
           }
       });
  };

  Tabla.prototype.funcionalidadselect = function(){
    $("#id_tabla_rutas tr").click(function(){
       $(this).addClass('selected').siblings().removeClass('selected');
       var value=$(this).find('td:first').text(); 
       obj.id_tprioritario = value;
       // alert(obj.id_tprioritario);
       id_tprioritario = 0;
    });
  }



// $('.ok').on('click', function(e){
//     alert($("#table tr.selected td:first").html());
// });
