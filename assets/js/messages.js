
var num = 100; //número de pixeles antes de modificar el estilo

    $(window).bind('scroll', function () {
        if ($(window).scrollTop()>num) {
            $('.filtro_flotantexx').addClass('filtro_flotantexx_fixed'); //Fijamos el contenedor de filtros en la parte superior agregando la clase filtro_flotantexx_fixed
        } else {
            $('.filtro_flotantexx').removeClass('filtro_flotantexx_fixed'); //Volvemos el contenedor de filtros a su posición normal quitando la clase filtro_flotantexx_fixed
        }
    });

function Message(){
  tmp_message = this;

  this.notification = function(title,text,type){
      swal({
        title : title,
        text : text,
        type: type,
        confirmButtonText: 'ok',
        width:'350px'
      });
  }// notification()

  this.loading = function(texto){
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
  }// loading()

}// Message
