let Notification = {

  notification : (title,text,type) => {
      swal({
        title : title,
        text : text,
        type: type,
        confirmButtonText: 'Aceptar',
        width:'350px'
      });
	},
  loading : (texto) => {
    swal({
        title: "<div class='loader'></div><br>",
        text: texto,
        width: 300,
        padding: 60,
        showCancelButton: false,
        showConfirmButton: false,
        allowEscapeKey:false,
        allowOutsideClick:false
      });
	}

};
