<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Prioridad</th>
      <th scope="col">Acción</th>

      <th scope="col">CTE 1</th>
      <th scope="col">CTE 2</th>
      <th scope="col">CTE 3</th>
      <th scope="col">CTE 4</th>
      <th scope="col">CTE 5</th>
      <th scope="col">CTE 6</th>
      <th scope="col">CTE 7</th>
      <th scope="col">CTE 8</th>
      <th scope="col">CTE 9</th>
      <th scope="col">CTE 10</th>
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
        <?php for ($x = 1; $x <= 10; $x++) {?>
          <td>
            <select onchange=obj_rm_avances_acciones.set_avance("<?=$x?>,<?=$value['id_cct']?>,<?=$value['id_tprioritario']?>,<?=$value['id_accion']?>") id="<?=$x?>,<?=$value['id_cct']?>,<?=$value['id_tprioritario']?>,<?=$value['id_accion']?>">
              <option selected>0%</option>
              <option>10%</option>
              <option>20%</option>
              <option>30%</option>
              <option>40%</option>
              <option>50%</option>
              <option>60%</option>
              <option>70%</option>
              <option>80%</option>
              <option>90%</option>
              <option>100%</option>
            </select>
          </td>
        <?php } ?>
        <?php } ?>
        </tr>
        <?=$var_aux_id_tprioritario = $value['id_tprioritario']?>
      <?php endforeach; ?>
  </tbody>
</table>
