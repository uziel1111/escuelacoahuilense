<!-- Modal -->
<div id="modal_trayectoformativo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header  bgcolor-2">
        <h5 class="modal-title color-6" id="exampleModalLongTitle">Trayecto formativo para supervisores escolares</h5>
        <button type="button" class="close color-6" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card">
              <div class="card-body">
                <label>3.1 DIPLOMADO UNA SUPERVISIÓN EFECTIVA</label>
                <p style="cursor:pointer;" id="EP_pf1">Una supervisión efectiva para la mejora del aprendizaje de nuestros alumnos
                </p>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <label>3.2 TALLER DE GESTIÓN DE PROYECTOS</label>
                <p style="cursor:pointer;" id="EP_pf2">GESTIÓN DE PROYECTOS
                </p>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <label>3.3 TALLER DE CONVIVENCIA ESCOLAR</label>
                <p style="cursor:pointer;" id="EP_pf3">TALLER DE CONVIVENCIA ESCOLAR
                </p>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <label>3.4 TALLER DE ALFABETIZACIÓN INICIAL Y PROBLEMATIZACIÓN MATEMÁTICA</label>
                <p style="cursor:pointer;" id="EP_pf4">Alfabetización inicial y problematización matemática
                </p>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <label>3.5 OBSERVACIÓN DE CLASE</label>
                <p style="cursor:pointer;" id="EP_pf5">Observación de clase
                </p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>

<div id="modal_trayectoformativoPdf" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
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
$("#EP_pf1").click(function(e){
  Utiles.showPDF("modal_trayectoformativoPdf", "supervision_escolar/3.TRAYECTO_FORMATIVO/3.1DIPLOMADO_UNA_SUPERVISION_EFECTIVA/Una supervisión efectiva para la mejora del aprendizaje de nuestros alumnos.pdf");
});
$("#EP_pf2").click(function(e){
  Utiles.showPDF("modal_trayectoformativoPdf", "supervision_escolar/3.TRAYECTO_FORMATIVO/3.2TALLER_DE_GESTION_DE_PROYECTOS/GESTIÓN DE PROYECTOS.pdf");
});
$("#EP_pf3").click(function(e){
  Utiles.showPDF("modal_trayectoformativoPdf", "supervision_escolar/3.TRAYECTO_FORMATIVO/3.3TALLER_DE_CONVIVENCIA_ESCOLAR/TALLER DE CONVIVENCIA ESCOLAR.pdf");
});
$("#EP_pf4").click(function(e){
  Utiles.showPDF("modal_trayectoformativoPdf", "supervision_escolar/3.TRAYECTO_FORMATIVO/3.4TALLER_DE_ALFABETIZACION_INICIAL_Y_PROBLEMATIZACION_MATEMATICA/Alfabetización inicial y problematización matemática.pdf");
});
$("#EP_pf5").click(function(e){
  Utiles.showPDF("modal_trayectoformativoPdf", "supervision_escolar/3.TRAYECTO_FORMATIVO/3.5OBSERVACION_DE_CLASE/Observación de clase.pdf");
});
</script>
