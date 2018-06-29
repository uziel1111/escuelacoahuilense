$("#btn_index_reconocimientosEstatales").click(function(e){
  e.preventDefault();
  Index.getReconocimientosEstatales();
});

const Index = {

  getReconocimientosEstatales() {
    let ruta = base_url+"Index/getReconocimientosEstatales";
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
	}

};
