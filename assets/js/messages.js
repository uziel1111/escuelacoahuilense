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
    let div = "<div class=animationload'><div class='osahanloading'></div></div>";

    swal({
        // title: "<div class='loader'></div>",
        title:"<i class='fa fa-circle-o-notch fa-spin' style='font-size:100px; color:#7ea629'></i>",
        text: texto,
        width: 250,
        padding: 60,
        showCancelButton: false,
        showConfirmButton: false,
        allowEscapeKey:false,
        allowOutsideClick:false,
        customClass : 'trans'

      });
	}

};
