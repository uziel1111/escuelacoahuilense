  <div class="card">
    <div  class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
          <a href="<?= site_url('Estadistica/estad_indi_generales'); ?>">
            <span>Estadística por estado, municipio y zona</span>
          </a>
        </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <!--
        <a href="#">
          <span>Estadística por escuela</span>
        </a>
        -->
      <?= anchor('estadistica', 'Estadística por escuela', 'class="link-class"') ?>
      </div>

      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <a href="<?= site_url('Mapa/busqueda_x_mapa'); ?>">
          <span>Localiza tu escuela en el mapa</span>
        </a>
      </div>

      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <a href="#">
          <span>Riesgo de abandono</span>
        </a>
      </div>
    </div>
  </div>
