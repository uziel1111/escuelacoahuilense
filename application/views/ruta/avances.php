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
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Prioridad</th>
      <th scope="col">Actividades</th>

      <th scope="col">CTE 1</th>
      <th scope="col">CTE 2</th>
      <th scope="col">CTE 3</th>
      <th scope="col">CTE 4</th>
      <th scope="col">CTE 5</th>
      <th scope="col">CTE 6</th>
      <th scope="col">CTE 7</th>
      <th scope="col">CTE 8</th>
      <th scope="col">Estatus</th>
    </tr>
  </thead>
  <tbody>
<?=$var_aux_id_tprioritario = ''?>

      <?php foreach ($arr_avances as $key => $value):?>
        <tr>
          <?php if ($value['id_tprioritario'] == $var_aux_id_tprioritario){?>
            <td></td>
          <?php } else{ ?><td><?=$value['prioridad']?></td><?php } ?>
          <?php if ($value['id_accion'] == ''){?>
            <td><b>N/A</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          <?php } else{ ?>
        <td><?=$value['accion']?></td>

        <?php for ($x = 1; $x <= 8; $x++) {?>
          <td>
            <select <?=($arr_avances_fechas[0]["cte{$x}_var"]=="TRUE")? '':'disabled' ?> onchange=obj_rm_avances_acciones.set_avance("<?=$x?>_<?=$value['id_cct']?>_<?=$value['id_tprioritario']?>_<?=$value['id_accion']?>") id="<?=$x?>_<?=$value['id_cct']?>_<?=$value['id_tprioritario']?>_<?=$value['id_accion']?>">
              <option value="0" <?=($value["cte{$x}"] == '0')? 'selected':'' ?> >0%</option>
              <option value="10" <?=($value["cte{$x}"] == '10')? 'selected':'' ?> >10%</option>
              <option value="20" <?=($value["cte{$x}"] == '20')? 'selected':'' ?> >20%</option>
              <option value="30" <?=($value["cte{$x}"] == '30')? 'selected':'' ?> >30%</option>
              <option value="40" <?=($value["cte{$x}"] == '40')? 'selected':'' ?> >40%</option>
              <option value="50" <?=($value["cte{$x}"] == '50')? 'selected':'' ?> >50%</option>
              <option value="60" <?=($value["cte{$x}"] == '60')? 'selected':'' ?> >60%</option>
              <option value="70" <?=($value["cte{$x}"] == '70')? 'selected':'' ?> >70%</option>
              <option value="80" <?=($value["cte{$x}"] == '80')? 'selected':'' ?> >80%</option>
              <option value="90" <?=($value["cte{$x}"] == '90')? 'selected':'' ?> >90%</option>
              <option value="100" <?=($value["cte{$x}"] == '100')? 'selected':'' ?> >100%</option>
            </select>
          </td>

        <?php } ?><td> <img id='<?=$value['id_accion']?>icoima' src="<?= base_url("assets/img/rm_estatus/{$value['icono']}") ?>" class="img-fluid" alt="Responsive image" width="35px"> </td>
		<?php     $var_aux_id_tprioritario = $value['id_tprioritario']?>
        <?php } ?>
        </tr>
      <?php endforeach; ?>
  </tbody>
</table>
