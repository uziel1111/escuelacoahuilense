<!-- Modal -->
<div id="modal_superenmundo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header  bgcolor-2">
        <h5 class="modal-title color-6" id="exampleModalLongTitle">La supervisión escolar en el mundo</h5>
        <button type="button" class="close color-6" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card">
              <div class="card-body">
                <label>4. LA SUPERVISIÓN ESCOLAR EN EL MUNDO</label>
                <p style="cursor:pointer;" id="EP_pm1">4.1 ASIA_A comparative analysis</p>
                <p style="cursor:pointer;" id="EP_pm2">4.2 EUROPA_Comparing school inspection systems in Europe</p>
                <p style="cursor:pointer;" id="EP_pm3">4.3 EUROPA_Assuring quality in education</p>
                <p style="cursor:pointer;" id="EP_pm4">4.4 INGLATERRA_School inspection handbook</p>
                <p style="cursor:pointer;" id="EP_pm5">4.5 MÉXICO_Modelo de gestion para supervision</p>
                <p style="cursor:pointer;" id="EP_pm6">4.6  MÉXICO_Taller de supervisión efectiva</p>
                <p style="cursor:pointer;" id="EP_pm7">4.7 MÉXICO_ Transformar la supervisión escolar</p>
              </div>
            </div>

          </div>
        </div>

      </div>

    </div>
  </div>
</div>

<div id="modal_superenmundoPdf" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bgcolor-2">
        <h5 class="modal-title color-6" id="exampleModalLongTitle"></h5>
        <button type="button" class="close color-6" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"></div>
    </div>
  </div>
</div>

<script type="text/javascript">

$("#EP_pm1").click(function(e){
  Utiles.showPDF("modal_superenmundoPdf", "supervision_escolar/4.LA_SUPERVISION_ESCOLAR_EN_EL_MUNDO/4.1 ASIA_A comparative analysis.pdf");
});
$("#EP_pm2").click(function(e){
  Utiles.showPDF("modal_superenmundoPdf", "supervision_escolar/4.LA_SUPERVISION_ESCOLAR_EN_EL_MUNDO/4.2 EUROPA_Comparing school inspection systems in Europe.pdf");
});
$("#EP_pm3").click(function(e){
  Utiles.showPDF("modal_superenmundoPdf", "supervision_escolar/4.LA_SUPERVISION_ESCOLAR_EN_EL_MUNDO/4.3 EUROPA_Assuring quality in education.pdf");
});
$("#EP_pm4").click(function(e){
  Utiles.showPDF("modal_superenmundoPdf", "supervision_escolar/4.LA_SUPERVISION_ESCOLAR_EN_EL_MUNDO/4.4 INGLATERRA_School inspection handbook.pdf");
});
$("#EP_pm5").click(function(e){
  Utiles.showPDF("modal_superenmundoPdf", "supervision_escolar/4.LA_SUPERVISION_ESCOLAR_EN_EL_MUNDO/4.5 MEXICO_Modelo de gestion para supervision.pdf");
});
$("#EP_pm6").click(function(e){
  Utiles.showPDF("modal_superenmundoPdf", "supervision_escolar/4.LA_SUPERVISION_ESCOLAR_EN_EL_MUNDO/4.6 MEXICO_Taller de supervision efectiva.pdf");
});
$("#EP_pm7").click(function(e){
  Utiles.showPDF("modal_superenmundoPdf", "supervision_escolar/4.LA_SUPERVISION_ESCOLAR_EN_EL_MUNDO/4.7MEXICO_Transformarlasupervisionescolar.pdf");
});
</script>
