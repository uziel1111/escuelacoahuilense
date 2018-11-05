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


			<div class="row justify-content-center flex-column mb-3 ml-0 mr-0">
				<nav>
					<div class="nav nav-tabs nav-tabs-style-1" id="nav-tab" role="tablist">
						<a class="nav-item nav-link nav-link-style-1 active" id="nav-ruta-tab" data-toggle="tab" href="#nav-ruta" role="tab" aria-controls="nav-ruta" aria-selected="true">Resumen general</a>
						<a class="nav-item nav-link nav-link-style-1" id="nav-indicadores-tab" data-toggle="tab" href="#nav-indicadores" role="tab" aria-controls="nav-indicadores" aria-selected="false">Recomendaciones</a>
						<a class="nav-item nav-link nav-link-style-1" id="nav-ayuda-tab" data-toggle="tab" href="#nav-ayuda" role="tab" aria-controls="nav-ayuda" aria-selected="false">Preguntas Frecuentes</a>
					</div>
				</nav>
				<div class="tab-content tab-content-style-1" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-ruta" role="tabpanel" aria-labelledby="nav-ruta-tab">

  <div class="row">
    <div class="col-sm-12">
<h4>Peso General</h4>
  <div class="row">
    <div class="col-sm">
		<div class="imc_box">
       		<div class="imc_box_head">
       Peso Predominante
		</div>
       		<div class="imc_box_num">
       47
		</div>
       		<div class="imc_box_label">
       Sobrepeso
		</div>
		</div>
    </div>
    <div class="col-sm">
<ul class="list-group imc_list">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Bajo peso
    <span class="badge badge-secondary badge-pill">7%</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Normal
    <span class="badge badge-secondary badge-pill">40%</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-info">
    Sobrepeso
    <span class="badge badge-primary badge-pill">47%</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Obesidad
    <span class="badge badge-secondary badge-pill">7%</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Obesidad+Sobrepeso
    <span class="badge badge-secondary badge-pill">53%</span>
  </li>
</ul>
    </div>
  </div>

    </div>
    <div class="col-sm">
		<h4>Grafica</h4>
      <img src="../../../assets/img/graficaIMCdemo3.png" class="img-fluid" alt="Responsive image">
    </div>
  </div>

  <div class="row mt-10">
    <div class="col-sm">
    <div class="alert alert-warning" role="alert">
		<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the <strong>1500s</strong>, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
</div>
    </div>
  </div>
			</div>

					<div class="tab-pane fade" id="nav-indicadores" role="tabpanel" aria-labelledby="nav-indicadores-tab">
						<img src="../../../assets/img/bmi-and-obesity.jpg" class="img-fluid" alt="Responsive image">
					</div>
					<div class="tab-pane fade" id="nav-ayuda" role="tabpanel" aria-labelledby="nav-ayuda-tab">
						<div class="card bg-light mb-3">
							<div class="card-header"><span class="badge badge-secondary h5 text-white">1.</span> ¿Qué es el índice de masa corporal?</div>
							<div class="card-body">
								<p class="card-text">El índice de masa corporal (IMC) es un método utilizado para estimar la cantidad de grasa corporal que tiene una persona, y determinar por tanto si el peso está dentro del rango normal, o por el contrario, se tiene sobrepeso o delgadez. Para ello, se pone en relación la estatura y el peso actual del individuo. Esta fórmula matemática fue ideada por el estadístico belga Adolphe Quetelet, por lo que también se conoce como índice de Quetelet o Body Mass Index (BMI).</p>
							</div>
						</div>
						<div class="card bg-light mb-3">
							<div class="card-header"><span class="badge badge-secondary h5 text-white">2.</span> ¿Cómo se calcula?</div>
							<div class="card-body">
								<p class="card-text">El IMC es una fórmula que se calcula dividiendo el peso, expresado siempre en Kg, entre la altura, siempre en metros al cuadrado. Una cosa importante que destaca la nutricionista es que no se pueden aplicar los mismos valores en niños y adolescentes que en adultos. “Para calcular el IMC en niños se utilizan los percentiles. Estos son una media en los que se establece el peso del niño y se le relaciona con sus iguales de edad y sexo, dentro de la misma área; y si está en la media, tiene un peso adecuado; si está por encima, habría un percentil alto, por lo que  tendrían obesidad, y si está por debajo, se calificaría como un bajo peso”, indica Escalada. </p>
							</div>
						</div>
					</div>
				</div>
			</div>

</div>
