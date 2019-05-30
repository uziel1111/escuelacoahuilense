<div class="alert alert-success" role="alert">
  <div class="row font-weight-bold text-muted">
    <div class="col">
     <img src="<?= base_url('assets/img/rm_estatus/0.png') ?>" class="img-fluid" alt="Responsive image" width="35px"> No iniciado
    </div>
    <div class="col">
      <img src="<?= base_url('assets/img/rm_estatus/1.png') ?>" class="img-fluid" alt="Responsive image" width="35px"> Recién iniciado
    </div>
    <div class="col">
      <img src="<?= base_url('assets/img/rm_estatus/2.png') ?>" class="img-fluid" alt="Responsive image" width="35px"> Avance medio
    </div>
    <div class="col">
      <img src="<?= base_url('assets/img/rm_estatus/3.png') ?>" class="img-fluid" alt="Responsive image" width="35px"> Por terminar
    </div>
    <div class="col">
      <img src="<?= base_url('assets/img/rm_estatus/4.png') ?>" class="img-fluid" alt="Responsive image" width="35px"> Terminado
    </div>
  </div>
</div>

<?php $var_aux_id_tprioritario = '';  ?>
<?php $var_aux_id_objetivos = ''; ?>

<?php $aux_1 = '1' ?>
<?php $qb = '0' ?>
<?php $endTable = '</tbody></table>' ?>

<?php foreach ($arr_avances as $avance): ?>
  <!-- Lineas de Accion -->
  <?php if ($avance['id_tprioritario'] != $var_aux_id_tprioritario): ?>
    <?php if ($qb == '1'): ?>
    <?php echo $endTable ?>
    <?php $qb = '0' ; ?>
  <?php endif ?>
    <div class="alert text-center" role="alert" style="background-color: #FFCC80">
      <label><b>Linea de acción:</b> <span><?php echo $avance['prioridad'] ?></span></label><br>
    </div>
    <?php $var_aux_id_tprioritario = $avance['id_tprioritario']; ?>
  <?php endif; ?>

  <!-- Objetivos -->

  <?php if ($avance['id_objetivo'] != $var_aux_id_objetivos): ?>
    <?php if ($aux_1 != '1'): ?>
      <?php echo $endTable ?>
    <?php endif ?>
    <div class="alert text-center" role="alert" style="background-color: #BBDEFB;">
      <label><b>Objetivo:</b> <span><?php echo $avance['objetivo'] ?></span></label><br>
    </div>

    <table class="table table-hover">
      <thead>
        <tr class="text-center">
          <th>Actividades</th>
          <th>CTE 1</th>
          <th>CTE 2</th>
          <th>CTE 3</th>
          <th>CTE 4</th>
          <th>CTE 5</th>
          <th>CTE 6</th>
          <th>CTE 7</th>
          <th>CTE 8</th>
          <th>Estatus</th>
        </tr>
      </thead>
      <tbody>
        <?php $var_aux_id_objetivos = $avance['id_objetivo']; ?>
        <?php $aux_1 = '0';  ?>
        <?php $qb = '1' ; ?>
  <?php endif; ?>

  <!-- Acciones -->
    <?php if ( $avance['id_accion'] == '' ) {  ?>
      <tr></tr>
      <?php echo $endTable ?>
      <?php $qb = '0' ; ?>
    <?php } else { ?>
      <tr>
        <td style="vertical-align: middle;"><?php echo $avance['accion'] ?></td>
      <?php for ($x = 1; $x <= 8; $x++) { ?>
        <td style="vertical-align: middle;">
          <select <?=($arr_avances_fechas[0]["cte{$x}_var"]=="TRUE")? '':'disabled' ?> onchange=obj_rm_avances_acciones.set_avance("<?=$x?>_<?=$avance['id_cct']?>_<?=$avance['id_tprioritario']?>_<?=$avance['id_accion']?>") id="<?=$x?>_<?=$avance['id_cct']?>_<?=$avance['id_tprioritario']?>_<?=$avance['id_accion']?>">
            <option value="0" <?=($avance["cte{$x}"] == '0')? 'selected':'' ?> >0%</option>
            <option value="10" <?=($avance["cte{$x}"] == '10')? 'selected':'' ?> >10%</option>
            <option value="20" <?=($avance["cte{$x}"] == '20')? 'selected':'' ?> >20%</option>
            <option value="30" <?=($avance["cte{$x}"] == '30')? 'selected':'' ?> >30%</option>
            <option value="40" <?=($avance["cte{$x}"] == '40')? 'selected':'' ?> >40%</option>
            <option value="50" <?=($avance["cte{$x}"] == '50')? 'selected':'' ?> >50%</option>
            <option value="60" <?=($avance["cte{$x}"] == '60')? 'selected':'' ?> >60%</option>
            <option value="70" <?=($avance["cte{$x}"] == '70')? 'selected':'' ?> >70%</option>
            <option value="80" <?=($avance["cte{$x}"] == '80')? 'selected':'' ?> >80%</option>
            <option value="90" <?=($avance["cte{$x}"] == '90')? 'selected':'' ?> >90%</option>
            <option value="100" <?=($avance["cte{$x}"] == '100')? 'selected':'' ?> >100%</option>
          </select>
        </td>
      <?php } ?>

      <td style="vertical-align: middle;">
        <img id='<?=$avance['id_accion']?>icoima' src="<?= base_url("assets/img/rm_estatus/{$avance['icono']}") ?>" class="img-fluid" alt="Responsive image" width="35px">
      </td>
    </tr>
  <?php } ?>
<?php endforeach; ?>
