$(document).ready(function () {
   obj = new Tabla();
   obj.get_view();
   
});


function Tabla(){
   _this = this;
}


 Tabla.prototype.inicio = function(){
      drag = null;
      drag = new Drag();
     //  tabla = $("#grid_rutamejora table");
     //  tabla[0].setAttribute("id", "id_tabla_demo");
     // objota = $("#grid_rutamejora tbody");
     //  objota[0].setAttribute("id", "id_tbody_demo");
      $("#id_tbody_demo").css( 'cursor', 'pointer' );
      $("#id_tbody_demo").sortable({
        start: function( event, ui ) {
          var vector = drag.all_rows('id_tabla_rutas');
          drag.remove_empty(vector)
        },
         stop: function( event, ui ) {
            var vector2 = drag.all_rows('id_tabla_rutas');
            drag.sort(vector2, 1);
            ruta.update_order(vector2);
         }
      });
  };

  Tabla.prototype.get_view = function(){
    $.ajax({
      url: base_url+"Rutademejora/bajarutademo",
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
             $("#grid_rutamejora").empty();
             $("#grid_rutamejora").append(tabla);
             ruta.inicio();
           },
           error: function(error){
             console.log(error);
           }
       });
 };
