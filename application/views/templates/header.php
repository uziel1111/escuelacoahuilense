<!DOCTYPE html>
<html lang="es" class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon-->
  <link rel="icon" type="image/png" href="http://coahuila.gob.mx/images/favicon-electoral.png">
  <!-- Meta Description -->
  <meta name="description" content="">
  <!-- Meta Keyword -->
  <meta name="keywords" content="">
  <!-- meta character set -->
  <meta charset="UTF-8">
  <!-- Site Title -->
    <title>Escuela Coahuilense</title>
    <!-- Site Title -->
    <link href="http://fonts.googleapis.com/css?family=Boogaloo" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Fira+Sans+Condensed:400,400i,500,500i,800,800i" rel="stylesheet">
  <!-- CSS -->

    <link rel="stylesheet" href="<?= base_url('assets/css/linearicons.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link href="<?= base_url('assets/bootstrap-411/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
  <link href="<?= base_url('assets/sweetalert2/sweetalert2.min.css'); ?>" rel="stylesheet" media="screen">

  <link href="<?= base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet" media="screen">
  <link href="<?= base_url('assets/css/loader.css') ?>" rel="stylesheet" media="screen">


    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">

  <script src="<?= base_url('assets/jquery-3.3.1.min.js'); ?>"></script>
  <script src="<?= base_url('assets/jquery.validate.js'); ?>"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="<?= base_url('assets/bootstrap-411/js/bootstrap.min.js'); ?>"></script>
  <script src="<?= base_url('assets/sweetalert2/sweetalert2.min.js'); ?>"></script>

  <script src="<?= base_url('assets/js/messages.js') ?>"></script>

  <script src="<?= base_url('assets/js/utiles.js') ?>"></script>

  <script src="<?= base_url('assets/js/general.js') ?>"></script>
  <script src="<?= base_url('assets/js/loader.js') ?>"></script>


  <script>
    $(function() {
      base_url = live_url = "<?= base_url(); ?>";
      base_url = base_url + "index.php/";
    });
  </script>
</head>

    <body>
        <div id="top"></div>
        <!-- Start Header Area -->
        <header class="default-header">
            <div class="sticky-header">
                <div class="container">
                    <div class="header-content d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="<?= base_url() ?>" class="smooth"><img src="<?= base_url('assets/img/logo.png'); ?>" alt=""></a>
                        </div>
                        <div class="right-bar d-flex align-items-center">
                            <nav class="d-flex align-items-center">
                                <ul class="main-menu">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link hcolor-1" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Estadística e Indicadores
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right ddm-color-1" aria-labelledby="navbarDropdownMenuLink">
                                          <a class="dropdown-item hcolor-1" href="<?= base_url('index.php/Estadistica/estad_indi_generales'); ?>">Por estado, municipio y zona</a>
                                          <a class="dropdown-item hcolor-1" href="<?= base_url('index.php/Busqueda_xlista/index'); ?>">Por escuela</a>
                                          <a class="dropdown-item hcolor-1" href="<?= base_url('index.php/Mapa/busqueda_x_mapa'); ?>">Localiza tu escuela</a>
                                          <a class="dropdown-item hcolor-1" href="#">Riesgo de abandono</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link hcolor-2" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Servicios
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right ddm-color-2" aria-labelledby="navbarDropdownMenuLink">
                                          <a class="dropdown-item hcolor-2" href="#">Servicio profesional docente</a>
                                          <a class="dropdown-item hcolor-2" href="#">Supervisión</a>
                                          <a class="dropdown-item hcolor-2" href="#">Escuelas particulares</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link hcolor-3" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Información
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right ddm-color-3" aria-labelledby="navbarDropdownMenuLink">
                                          <a class="dropdown-item hcolor-3" href="#">Guía para padres de familia</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link hcolor-4" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Otros
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right ddm-color-4" aria-labelledby="navbarDropdownMenuLink">
                                          <a class="dropdown-item hcolor-4" href="#">Modelo Coahuilense</a>
                                          <a class="dropdown-item hcolor-4" href="#">Calendario escolar</a>
                                          <a class="dropdown-item hcolor-4" href="#">Sismo</a>
                                        </div>
                                    </li>
                                </ul>
                                <a href="#" class="mobile-btn"><span class="lnr lnr-menu"></span></a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End Header Area -->

<!-- Modal -->
<div class="modal fade" id="idmodalloader" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
  <center><div class="loader"></div></center>
  </div>
</div>
