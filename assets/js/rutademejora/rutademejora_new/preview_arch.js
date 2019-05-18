function readURL(id_objetivo,input) {
    if (input.files && input.files[0]) {
      // alert('Archivo guardado')
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#preview'+id_objetivo).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function readURL_Fin(id_objetivo,input) {
    if (input.files && input.files[0]) {
      // alert('Archivo guardado')
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#preview_fin'+id_objetivo).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
//
// $("#imgIni").change(function(){
//     readURL(this);
// });

function eliminaEvidencia(id_objetivo, elemento){
  // alert(id_objetivo)
  $.ajax({
    url: base_url+'Rutademejora/eliminaEvObjIn/'+id_objetivo,
   	type: 'POST',
 	  dataType: 'JSON',
 	  data: { id_objetivo: id_objetivo },
 	  beforeSend: function(xhr) {
   				 Notification.loading("");
    },
  })
  .done(function(result) {
 	 //Recargamos el grid
 	 setTimeout(function(){
 		 swal(
 			 '¡Correcto!',
 			 "La evidencia se eliminó correctamente",
 			 'success'
 		 );
 	 }, 1000)
  })
  .fail(function(e) {
 	 console.error("Error in cargarEvidencia()");
  })
  .always(function() {
 	 swal.close();
  });

  $('#preview'+id_objetivo).attr('src', '#');
}

function eliminaEvidenciaFin(id_objetivo, elemento){
  // alert(id_objetivo)
  $.ajax({
    url: base_url+'Rutademejora/eliminaEvObjFin/'+id_objetivo,
   	type: 'POST',
 	  dataType: 'JSON',
 	  data: { id_objetivo: id_objetivo },
 	  beforeSend: function(xhr) {
   				 Notification.loading("");
    },
  })
  .done(function(result) {
 	 //Recargamos el grid
 	 setTimeout(function(){
 		 swal(
 			 '¡Correcto!',
 			 "La evidencia se eliminó correctamente",
 			 'success'
 		 );
 	 }, 1000)
  })
  .fail(function(e) {
 	 console.error("Error in cargarEvidencia()");
  })
  .always(function() {
 	 swal.close();
  });

  $('#preview_fin'+id_objetivo).attr('src', '#');
}

//inicio
function cargarEvidencia(id_objetivo, id_tprioritario, elemento){
 // console.log(elemento);
 readURL(id_objetivo,elemento);
 let formData = new FormData($('#form_evidencia')[0])

 $.ajax({
	 url: base_url+'Rutademejora/cargarEvidencia/'+id_objetivo+'/'+id_tprioritario,
	 type: 'POST',
	 dataType: 'JSON',
	 cache: false,
	 contentType: false,
	 processData: false,
	 data: formData,
	 beforeSend: function(xhr) {
				 Notification.loading("");
	 },
 })
 .done(function(result) {
	 //Recargamos el grid
	 setTimeout(function(){
		 swal(
			 '¡Correcto!',
			 "La evidencia se cargó correctamente",
			 'success'
		 );
	 }, 1000)
 })
 .fail(function(e) {
	 console.error("Error in cargarEvidencia()");
 })
 .always(function() {
	 swal.close();
 });

}

//FIN
function cargarEvidenciaFin(id_objetivo, id_tprioritario, elemento){
 console.log(elemento);
 readURL_Fin(id_objetivo,elemento);
 let formData = new FormData($('#form_evidencia_fin')[0])

 $.ajax({
	 url: base_url+'Rutademejora/cargarEvidenciaFin/'+id_objetivo+'/'+id_tprioritario,
	 type: 'POST',
	 dataType: 'JSON',
	 cache: false,
	 contentType: false,
	 processData: false,
	 data: formData,
	 beforeSend: function(xhr) {
				 Notification.loading("");
	 },
 })
 .done(function(result) {
	 //Recargamos el grid
	 setTimeout(function(){
		 swal(
			 '¡Correcto!',
			 "La evidencia se cargó correctamente",
			 'success'
		 );
	 }, 1000)
 })
 .fail(function(e) {
	 console.error("Error in cargarEvidenciaFin()");
 })
 .always(function() {
	 swal.close();
 });

}
