$("#btn_reconocimientosEstatales_candelaria").click(function(e){
  e.preventDefault();
  Utiles.showPDF("modal_reconocimientosEstatalesPdf", "index/reconocimientos_estatales/CANDELARIA.pdf");
});

$("#btn_reconocimientosEstatales_felix").click(function(e){
  e.preventDefault();
  Utiles.showPDF("modal_reconocimientosEstatalesPdf", "index/reconocimientos_estatales/FELIX.pdf");
});

$("#btn_reconocimientosEstatales_ignacio").click(function(e){
  e.preventDefault();
  Utiles.showPDF("modal_reconocimientosEstatalesPdf", "index/reconocimientos_estatales/IGNACIO.pdf");
});

$("#btn_reconocimientosEstatales_leopoldo").click(function(e){
  e.preventDefault();
  Utiles.showPDF("modal_reconocimientosEstatalesPdf", "index/reconocimientos_estatales/LEOPOLDO.pdf");
});

$("#btn_reconocimientosEstatales_rafael").click(function(e){
  e.preventDefault();
  Utiles.showPDF("modal_reconocimientosEstatalesPdf", "index/reconocimientos_estatales/RAFAEL.pdf");
});

$('#modal_reconocimientosEstatales').on('hidden.bs.modal', function (e) {
  // console.info("close");
});

$('#modal_reconocimientosEstatalesPdf').on('hidden.bs.modal', function (e) {
  // console.info("close");
});
