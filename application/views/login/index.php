<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>LOGIN</title>
	<link href="<?= base_url('assets/bootstrap-411/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
	<script src="<?= base_url('assets/jquery-3.3.1.min.js'); ?>"></script>
	<script src="<?= base_url('assets/bootstrap-411/js/bootstrap.min.js'); ?>"></script>
</head>
<body>
    <div class="container">
    	<div class="row">
	        <div class="col-12">
	        	<center>
	        		<div class="card" style="width: 18rem;">
					  <div class="card-body">
					    <h5 class="card-title">Iniciar Sesión</h5>
			            <?= form_open('login/login_action');?>
						  <div class="form-group">
						    <?= form_label('Usuario', 'usuario') ?>
                          	<?= form_input('usuario', '', array('id' => 'usuario', 'class'=>'form-control', 'required'=>'required', 'autofocus'=>'autofocus')) ?>
						  </div>
						  <div class="form-group">
						    <?= form_label('Contraseña', 'password') ?>
                          	<?= form_password('password', '', array('id' => 'password', 'class'=>'form-control')) ?>
						  </div>
						  <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
						<?= form_close() ?>
					  </div>
				</div>
	        	</center>
	        </div>
	    </div>
    </div><!-- /container -->
</body>
</html>