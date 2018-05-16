<?=form_open('mapa/buscaxmapa', array('class' => 'form-inline', 'id' => 'myform'));?>
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
    	<?=form_label('Programas federales de apoyo', 'pfdeapoyo');?>
	<?=form_dropdown('pfdeapoyo', $options, 'large', array('class' => 'form-control'));?>
    </div>
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
    <div>
    	<button class="btn btn-primary"> Ayuda</button>
    	<button class="btn btn-primary"> Aceptar</button>
    </div>
<?= form_close(); ?>