

<div class="container">
  <br><br><br><br><br>
  <div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
      <p><center>
        <button type="button" name="button"><?= anchor('Estadistica/estad_indi_generales', 'Regrese a la búsqueda', 'class="link-class"') ?></button>
      </center></p>
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
      <p><center>
        <?php if ($tipo_busqueda=="municipal"): ?>
          <div id="filtros_est_gen">Municipio: <?= $municipio?>, Nivel: <?= $nivel?>, Sostenimiento: <?= $sostenimiento?>, Modalidad:<?= $modalidad?>, Ciclo escolar:<?= $ciclo?>.
            <div class="col-12 col-sm-12 col-md-1 col-lg-1 mt-2">
              <?= form_open('Report/est_generales_xmuni') ?>
              <?= form_hidden('id_municipio', $id_municipio) ?>
              <?= form_hidden('id_nivel', $id_nivel) ?>
              <?= form_hidden('id_sostenimiento', $id_sostenimiento) ?>
              <?= form_hidden('id_modalidad', $id_modalidad) ?>
              <?= form_hidden('id_ciclo', $id_ciclo) ?>
              <?php
              $data = array(
                  'id' => 'btn_genera_excel_est_g_xmuni',
                  'value' => 'true',
                  'type' => 'submit',
                  'class'=>'btn btn-primary btn-block',
                  'content' => '<i class="fa fa-file-excel-o"></i>',
                  'data-toggle' => "tooltip",
                  'data-placement' => "top",
                  'title' => 'Exportar los resultados'
              );
              echo form_button($data);
              ?>
              <?= form_close() ?>
            </div><!-- col-md-1 -->
        <?php endif; ?>
        <?php if ($tipo_busqueda=="zona"): ?>
          <div id="filtros_est_gen">Nivel: <?= $nivel_z?>, Sostenimiento: <?= $sostenimiento_z?>, Zona escolar:<?= $zona_z?>, Ciclo escolar:<?= $ciclo_z?>.
            <div class="col-12 col-sm-12 col-md-1 col-lg-1 mt-2">
              <?= form_open('Report/est_generales_xzona') ?>
              <?= form_hidden('id_nivel_z', $id_nivel_z) ?>
              <?= form_hidden('id_sostenimiento_z', $id_sostenimiento_z) ?>
              <?= form_hidden('id_zona_z', $id_zona_z) ?>
              <?= form_hidden('id_ciclo_z', $id_ciclo_z) ?>
              <?php
              $data = array(
                  'id' => 'btn_genera_excel_est_g_xzona',
                  'value' => 'true',
                  'type' => 'submit',
                  'class'=>'btn btn-primary btn-block',
                  'content' => '<i class="fa fa-file-excel-o"></i>',
                  'data-toggle' => "tooltip",
                  'data-placement' => "top",
                  'title' => 'Exportar los resultados'
              );
              echo form_button($data);
              ?>
              <?= form_close() ?>
            </div><!-- col-md-1 -->

        <?php endif; ?>

  </div>
      </center></p>
    </div>
  </div>
  <div class="card">
    <div class="card-header">ALUMNOS</div>
    <div class="card-body">
      <div><?= $srt_tab_alumnos?>  </div>
    </div><!-- card-body -->
  </div><!-- card -->

  <div class="card">
    <div class="card-header">PERSONAL DOCENTE</div>
    <div class="card-body">
      <div><?= $srt_tab_pdocentes?>  </div>
    </div><!-- card-body -->
  </div><!-- card -->

  <div class="card">
    <div class="card-header">INFRAESTRUCTURA</div>
    <div class="card-body">
      <div><?= $srt_tab_infraestructura?>  </div>
    </div><!-- card-body -->
  </div><!-- card -->

  <div class="card">
    <div class="card-header">INDICADORES DE APRENDIZAJE</div>
    <div class="card-body">
      <div><?= $srt_tab_planea?>  </div>
    </div><!-- card-body -->
  </div><!-- card -->

  <div class="card">
    <div class="card-header">REZAGO EDUCATIVO</div>
    <div class="card-body">
      <div><?= $srt_tab_rezag_inegi?>  </div>
    </div><!-- card-body -->
  </div><!-- card -->

  <div class="card">
    <div class="card-header">ANALFABETISMO</div>
    <div class="card-body">
      <div><?= $srt_tab_analf_inegi?>  </div>
    </div><!-- card-body -->
  </div><!-- card -->

</div><!-- container -->




<script>
$(function () {
  $(".hide-ini").css("display","none");

  $('tr.parent').css("cursor","pointer").attr("title","Click para expander/contraer").click(function()
    {
      if($(this).siblings('.child-'+this.id).is(":visible"))
      {
        $(this).find('img').css("transform", "rotate(360deg)");
          $(this).siblings('.child-'+this.id).fadeOut('500');
          $(this).siblings('.child-'+this.id).siblings('.class-hide-'+this.id).fadeOut('500');
      }
      else
      {
        $(this).find('img').css("transform", "rotate(270deg)");
            $(this).siblings('.child-'+this.id).fadeIn('500');
      }
    });

    $('tr.child-parent').css("cursor","pointer").attr("title","Click para expander/contraer").click(function()
    {

          if($(this).siblings('.nieto-'+this.id).is(":visible"))
              {
                $(this).find('img').css("transform", "rotate(360deg)");
                    $(this).siblings('.nieto-'+this.id).fadeOut('500');
                    $(this).siblings('.nieto-'+this.id).siblings('.class-hide-'+this.id).fadeOut('500');
              }
              else
              {
                $(this).find('img').css("transform", "rotate(270deg)");
                    $(this).siblings('.nieto-'+this.id).fadeIn('500');
              }
    });

    $('tr.child-nieto').css("cursor","pointer").attr("title","Click para expander/contraer").click(function()
    {
        if($(this).siblings('.bisnieto-'+this.id).is(":visible"))
        {
          $(this).find('img').css("transform", "rotate(360deg)");
              $(this).siblings('.bisnieto-'+this.id).fadeOut('500');
        }
        else
        {
          $(this).find('img').css("transform", "rotate(270deg)");
              $(this).siblings('.bisnieto-'+this.id).fadeIn('500');
        }
    });
});

</script>
