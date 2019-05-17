// window.onload = function(){}

function readURL(input) {
  alert('Leyendo archivo')
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      // Asignamos el atributo src a la tag de imagen
      // $('#preview').attr('src', e.target.result);
      $('#preview').html("<img src='"+e.target.result+"' />")
    }
    reader.readAsDataURL(input.files[0]);
  }
}

// El listener va asignado al input
$("#file").change(function() {
  readURL(this);
});
