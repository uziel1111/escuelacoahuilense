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

$("#btn_index_guiaspadres").click(function(e){
  e.preventDefault();
  Index.getguiaparapadres();
});

$("#btn_index_modeloeducativo").click(function(e){
  e.preventDefault();
  Index.getmodeloeducativo();
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
      Utiles.showPDF("modal_materialesUtiles", "index/materialesUtiles/ListadetilesescolaresCicloescolar2018-2019-VERSINFINAL.pdf");
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
      Utiles.showPDF("modal_calendarioEscolar", "index/calendarioEscolar/Calendario_2018-2019_web.pdf");
    })
    .fail(function(e) {
      console.error("Error in getCalendarioEscolar()"); console.table(e);
    })
    .always(function() {
			swal.close();
		});
	},

  getmsjsarape : function() {
    var ruta = base_url+"Index/sarapemsj";
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
      Utiles.showPDF("modal_msjsarape", "index/SARAPE.pdf");
    })
    .fail(function(e) {
      console.error("Error in sarapemsj()"); console.table(e);
    })
    .always(function() {
			swal.close();
		});
	},

  getguiaparapadres : function() {
    var ruta = base_url+"Index/guiaparapadres";
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
      Utiles.showPDF("modal_guiaparapadres", "index/1GUIA-PARA-PADRES-EDUC-INCIAL.pdf");
    })
    .fail(function(e) {
      console.error("Error in guiaparapadres()"); console.table(e);
    })
    .always(function() {
			swal.close();
		});
	},

getmodeloeducativo : function() {
  var ruta = base_url+"Index/modeloeducativo";
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
    Utiles.showPDF("modal_modeloeducativo", "index/1.-_Resumen_Ejecutivo__1_.pdf");
  })
  .fail(function(e) {
    console.error("Error in modeloeducativo()"); console.table(e);
  })
  .always(function() {
    swal.close();
  });
},



};
