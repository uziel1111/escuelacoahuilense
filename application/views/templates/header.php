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
                                          <a class="dropdown-item hcolor-1" href="#">Resultados PLANEA por contenido temetico municipal/zona escolar</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link hcolor-2" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Docentes
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right ddm-color-2" aria-labelledby="navbarDropdownMenuLink">
                                          <a class="dropdown-item hcolor-2" href="http://servicioprofesionaldocente.sep.gob.mx/" target="_blank">Servicio profesional docente</a>
                                          <a class="dropdown-item hcolor-2" href="http://www.escuelatransparente.gob.mx/transparencia/docentes.php" target="_blank">Reconocimientos estatales</a>
                                          <a class="dropdown-item hcolor-2" href="http://www.inee.edu.mx/" target="_blank">Instituto Nacional para la Evaluación de la Educación</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link hcolor-3" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Padres de familia y niños
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right ddm-color-3" aria-labelledby="navbarDropdownMenuLink">
                                          <a class="dropdown-item hcolor-3" href="#" target="_blank">Guía para padres de familia</a>
                                          <a class="dropdown-item hcolor-3" href="http://libros.conaliteg.gob.mx/content/common/consulta-libros-gb/" target="_blank">Libros de texto gratuito SEP</a>
                                          <a class="dropdown-item hcolor-3" href="http://bibliotecadigitalcoahuila.gob.mx/" target="_blank">Biblioteca digital Coahuila</a>
                                          <a class="dropdown-item hcolor-3" href="http://siecec.seducoahuila.gob.mx/expediente_alumno/" target="_blank">Consulta de calificaciones</a>
                                          <a class="dropdown-item hcolor-3" href="http://www.seducoahuila.gob.mx/yabasta/" target="_blank">Alto al Bullying</a>
                                          <a class="dropdown-item hcolor-3" href="http://www.escuelatransparente.gob.mx/transparencia/juegos.php" target="_blank">Juegos y aplicaciones educativas</a>
                                          <a class="dropdown-item hcolor-3" href="http://www.escuelatransparente.gob.mx/transparencia/correo.php" target="_blank">Ingresa a tu correo electronico</a>
                                          <a class="dropdown-item hcolor-3" href="http://www.escuelatransparente.gob.mx/transparencia/concursos.php" target="_blank">Cursos y convocatorias</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link hcolor-4" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Otros
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right ddm-color-4" aria-labelledby="navbarDropdownMenuLink">
                                          <a class="dropdown-item hcolor-4" href="#">Modelo Coahuilense</a>
                                          <a class="dropdown-item hcolor-4" href="http://www.escuelatransparente.gob.mx/transparencia/2017-2018/calendario_2017.pdf" target="_blank">Calendario escolar</a>
                                          <a class="dropdown-item hcolor-4" href="http://www.becascoahuila.gob.mx/becas2.html" target="_blank">Becas escolares</a>
                                          <a class="dropdown-item hcolor-4" href="http://www.escuelatransparente.gob.mx/transparencia/2017-2018/lista_utiles_2017-2018.pdf" target="_blank">Lista de materiasles y útiles autorizados</a>
                                          <a class="dropdown-item hcolor-4" href="http://www.escuelatransparente.gob.mx/transparencia/2017-2018/ESCUELAS_ALTA_DEMANDA.pdf" target="_blank">Escuelas de alta demanda</a>
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
