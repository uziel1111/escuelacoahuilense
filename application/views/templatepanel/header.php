<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>LOGIN</title>
	<link href="<?= base_url('assets/bootstrap-411/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
	<script src="<?= base_url('assets/jquery-3.3.1.min.js'); ?>"></script>
	<script src="<?= base_url('assets/bootstrap-411/js/bootstrap.min.js'); ?>"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.26.2/dist/sweetalert2.all.min.js"></script>
	<script>
    $(function() {
      base_url = live_url = "<?= base_url(); ?>";
      base_url = base_url + "index.php/";
    });
  </script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="#"><?=$nombreuser?></a>
	  <a class="navbar-brand" href="#"><?=$nivel?></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarColor01">
	    <ul class="navbar-nav ml-auto">
	      <li class="nav-item">
	        <a class="nav-link" href="<?= site_url("login/cerrar_sesion")?>">Cerrar Sesión</a>
	      </li>
	    </ul>
	  </div>
	</nav>