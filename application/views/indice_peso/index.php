<div class="container-fluid">

	<div class="row">
		<div class="col-xs-4">
			<?php foreach ($arr_indi_peso as $key => $value): ?>
				<label for=""><?=$value['bajo'] ?></label>
				<label for=""><?=$value['Normal'] ?></label>
				<label for=""><?=$value['Sobrepeso'] ?></label>
				<label for=""><?=$value['Obesidad'] ?></label>
			<?php endforeach; ?>
		</div>
	</div>


</div>
