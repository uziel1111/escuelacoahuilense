$(function () {
  objIndex = new Index();  
});

$("#btn_index_reconocimientosEstatales").click(function(e){
  e.preventDefault();
  objIndex.getReconocimientosEstatales();
});

function Index(){
}

Index.prototype.getReconocimientosEstatales = function(){
      let ruta = base_url+"Index/getReconocimientosEstatales";
      $.ajax({
        url: ruta,
        method: 'POST',
        data: { 'folder':1, 'file':1 }
      })
      .done(function( data ) {

        $("#div_generico").empty();
        $("#div_generico").append(data.strView);
        $("#modal_reconocimientosEstatales").modal("show");
        // objIndex.showPDF("");

      })
      .fail(function(e) {
        console.error("Error in getReconocimientosEstatales()"); console.table(e);
      });
};
