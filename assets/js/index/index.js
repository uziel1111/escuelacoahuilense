$("#btn_index_reconocimientosEstatales").click(function(e){
  e.preventDefault();
  Index.getReconocimientosEstatales();
});

$("#btn_index_materialesUtiles").click(function(e){
  e.preventDefault();
  Index.getMaterialesUtiles();
});

$("#btn_index_calendarioEscolar").click(function(e){
  e.preventDefault();
  Index.getCalendarioEscolar();
});



var Index = {

  getReconocimientosEstatales : function() {
    var ruta = base_url+"Index/getReconocimientosEstatales";
    $.ajax({
      url: ruta,
      method: 'POST',
      data: { 'folder':1, 'file':1 },
      beforeSend: function(xhr) {
        Notification.loading("");
      }
    })
    .done(function( data ) {
      $("#div_generico").empty();
      $("#div_generico").append(data.strView);
      $("#modal_reconocimientosEstatales").modal("show");
    })
    .fail(function(e) {
      console.error("Error in getReconocimientosEstatales()"); console.table(e);
    })
    .always(function() {
			swal.close();
		});
	},

  getMaterialesUtiles : function() {
    var ruta = base_url+"Index/getMaterialesUtiles";
    $.ajax({
      url: ruta,
      method: 'POST',
      data: { 'folder':1, 'file':1 },
      beforeSend: function(xhr) {
        Notification.loading("");
      }
    })
    .done(function( data ) {
      $("#div_generico").empty();
      $("#div_generico").append(data.strView);
      Utiles.showPDF("modal_materialesUtiles", "index/materialesUtiles/lista_utiles_2017-2018.pdf");
    })
    .fail(function(e) {
      console.error("Error in getMaterialesUtiles()"); console.table(e);
    })
    .always(function() {
			swal.close();
		});
	},

  getCalendarioEscolar : function() {
    var ruta = base_url+"Index/getCalendarioEscolar";
    $.ajax({
      url: ruta,
      method: 'POST',
      data: { 'folder':1, 'file':1 },
      beforeSend: function(xhr) {
        Notification.loading("");
      }
    })
    .done(function( data ) {
      $("#div_generico").empty();
      $("#div_generico").append(data.strView);
      Utiles.showPDF("modal_calendarioEscolar", "index/calendarioEscolar/calendario_2017.pdf");
    })
    .fail(function(e) {
      console.error("Error in getCalendarioEscolar()"); console.table(e);
    })
    .always(function() {
			swal.close();
		});
	},



};
