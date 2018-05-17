<?=form_open('mapa/buscaxmapa', array('class' => 'form-group', 'id' => 'myform'));?>
    <div class="row">
        <div class="col col-md-3">
          <?=form_label('Municipio', 'minicipio', array('class' => 'mr-sm-2'));?>
          <?=form_dropdown('minicipio', $options, 'large', array('class' => 'form-control'));?>
        </div>
        <div class="col col-md-3">
          <?=form_label('Nivel', 'nivel');?>
            <?=form_dropdown('nivel', $options, 'large', array('class' => 'form-control'));?>
        </div>
        <div class="col col-md-3">
            <?=form_label('Sostenimiento', 'sostenimiento');?>
            <?=form_dropdown('sostenimiento', $options, 'large', array('class' => 'form-control'));?>
        </div>
        <div class="col col-md-3">
            <?=form_label('Programas federales', 'pfdeapoyo');?>
            <?=form_dropdown('pfdeapoyo', $options, 'large', array('class' => 'form-control'));?>
        </div>
    </div>
	<div class="row">
        <div class="col col-md-3">
            <?=form_label('Programas federales de apoyo', 'pfdeapoyo');?>
            <?=form_dropdown('pfdeapoyo', $options, 'large', array('class' => 'form-control'));?>
        </div>
        <div class="col col-md-3">
            <?=form_label('Nombre de la escuela(Opcional)', 'n_escuela');?>
            <?=form_input('n_escuela', 'johndoe', array('class' => 'form-control'));?>
        </div>
        <div class="col col-md-3">
            <?=form_label('Clave centro de trabajo(Opcional)', 'cct');?>
            <?=form_input('cct', '', array('class' => 'form-control'));?>
        </div>
    </div>
    
    <div class="row">
        <div class="col col-md-8">
        </div>
        <div class="col col-md-4">
            <button class="btn btn-primary ml-5"> Ayuda</button>
            <button class="btn btn-primary pull-md-right"> Aceptar</button>
        </div>
    	
    </div>
<?= form_close(); ?>