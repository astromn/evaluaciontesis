<?php
session_start();
error_reporting(0);

include '../modelo/funcs/crudrespoder.php';

include '../modelo/funcs/carectizarpregunta.php';

insertarhistorial();

$id_evaluacion = $_GET['id_evaluacion'];
$id_usuario    = $_SESSION['id_usuario'];

$_SESSION['id_evaluacion'] = $id_evaluacion;

$_SESSION['contar'] = 0;

$_SESSION['dificultad'] = 1;

$_SESSION['posf']           = 0;
$_SESSION['posm']           = 0;
$_SESSION['posd']           = 0;
$_SESSION['contarpregunta'] = 0;

// AREGLOS PARA ALGORITMO
$id_pregunta1 = array();
$id_pregunta2 = array();
$id_pregunta3 = array();

$preguntasfacil   = array();
$preguntasmedio   = array();
$preguntasdificil = array();

$preguntasfacilestudiante   = array();
$preguntasmedioestudiante   = array();
$preguntasdificilestudiante = array();

// contamos numeros de preguntas evaluadas
$_SESSION['contarpregunta'] = 1;

$nivelestudiante = nivelestudiante($id_usuario);

$_SESSION['nivelestudiante'] = $nivelestudiante;

$_SESSION['inicioalgoritmo'] = 0;
$_SESSION['limit1']          = 0;

// AREGLOS PARA EL INGRESO DE INFORMACION

$id_preguntasfacil   = array();
$id_preguntasmedio   = array();
$id_preguntasdificil = array();
$id_tema             = array();

// preguntas de tipo facil

$id_temas = temasevaluados($id_evaluacion);

while ($row = mysqli_fetch_array($id_temas)) {
    $id_tema[] = $row['id_temas'];
}

if ($_SESSION['inicioalgoritmo'] == 0) {

    $respuestatema1facil = mostrarpreguntas1($id_evaluacion, $id_tema[0], 1);
    $respuestatema2facil = mostrarpreguntas1($id_evaluacion, $id_tema[1], 1);

    $x = 0;
    $s = 5;

    while ($row = mysqli_fetch_array($respuestatema1facil)) {

        $id_preguntasfacil[$x] = $row['id_pregunta'];
        $x++;
    }
    while ($rows = mysqli_fetch_array($respuestatema2facil)) {

        $id_preguntasfacil[$s] = $rows['id_pregunta'];
        $s++;
    }

    // preguntas de tipo medio

    $respuestatema1medio = mostrarpreguntas1($id_evaluacion, $id_tema[0], 2);
    $respuestatema2medio = mostrarpreguntas1($id_evaluacion, $id_tema[1], 2);

    $x = 0;
    $s = 5;

    while ($row = mysqli_fetch_array($respuestatema1medio)) {

        $id_preguntasmedio[$x] = $row['id_pregunta'];
        $x++;
    }
    while ($rows = mysqli_fetch_array($respuestatema2medio)) {

        $id_preguntasmedio[$s] = $rows['id_pregunta'];
        $s++;
    }

    // preguntas de tipo dificil

    $respuestatema1dificil = mostrarpreguntas1($id_evaluacion, $id_tema[0], 3);
    $respuestatema2dificil = mostrarpreguntas1($id_evaluacion, $id_tema[1], 3);

    $x = 0;
    $s = 5;

    while ($row = mysqli_fetch_array($respuestatema1dificil)) {

        $id_preguntasdificil[$x] = $row['id_pregunta'];
        $x++;
    }
    while ($rows = mysqli_fetch_array($respuestatema2dificil)) {

        $id_preguntasdificil[$s] = $rows['id_pregunta'];
        $s++;
    }

    $_SESSION['preguntasfacil']   = $id_preguntasfacil;
    $_SESSION['preguntasmedio']   = $id_preguntasmedio;
    $_SESSION['preguntasdidicil'] = $id_preguntasdificil;

    //var_dump($id_preguntasfacil);

    //  var_dump($id_preguntasmedio);

//var_dump($id_preguntasdificil);

    // TODO LO DEL ALGORITMO

} else if ($_SESSION['inicioalgoritmo'] == 1) {

    $preguntasid = obtenerpreguntas($id_evaluacion);

    while ($row = mysqli_fetch_array($preguntasid)) {

        $id_pre1     = $row['id_pregunta'];
        $malas       = $row['cantidad_fallos'];
        $buenas      = $row['cantidad_aciertos'];
        $dificultade = $row['dificultadestudiante'];

        $sumavalores = $malas + $buenas;

        if ($sumavalores == 0) {
            $preguntasmedio[]           = $id_pre1;
            $preguntasmedioestudiante[] = $dificultade;
        }

        if ($sumavalores != 0) {

            $porsentajebuenas = ($buenas * 100) / $sumavalores;

            if ($porsentajebuenas >= 80) {

                $preguntasfacil[]           = $id_pre1;
                $preguntasfacilestudiante[] = $dificultade;

            } else if ($porsentajebuenas > 55 && $porsentajebuenas < 80) {
                $preguntasmedio[]           = $id_pre1;
                $preguntasmedioestudiante[] = $dificultade;
            } else if ($porsentajebuenas <= 55) {
                $preguntasdificil[]           = $id_pre1;
                $preguntasdificilestudiante[] = $dificultade;
            }
        }

    }

    array_multisort($preguntasfacilestudiante, $preguntasfacil);

    array_multisort($preguntasmedioestudiante, $preguntasmedio);

    array_multisort($preguntasdificilestudiante, $preguntasdificil);

    $preguntastemas1f = array();
    $preguntastemas2f = array();

    $tam1 = count($preguntasfacil);

    //  echo $tam1;

    for ($i = 0; $i < $tam1; $i++) {

        //  echo "+". $preguntasfacil[$i] ;

        $respuestat = temapregunta($preguntasfacil[$i]);

        while ($row = mysqli_fetch_array($respuestat)) {

            $id_temas = $row['id_temas'];

        }

        if ($id_tema[0] == $id_temas) {
            $preguntastemas1f[] = $preguntasfacil[$i];
        } else if ($id_tema[1] == $id_temas) {
            $preguntastemas2f[] = $preguntasfacil[$i];
        }

    }

    $id_pregunta1[0] = $preguntastemas1f[0];
    $id_pregunta1[1] = $preguntastemas1f[1];
    $id_pregunta1[2] = $preguntastemas1f[2];
    $id_pregunta1[3] = $preguntastemas1f[3];
    $id_pregunta1[4] = $preguntastemas1f[4];
    $id_pregunta1[5] = $preguntastemas2f[0];
    $id_pregunta1[6] = $preguntastemas2f[1];
    $id_pregunta1[7] = $preguntastemas2f[2];
    $id_pregunta1[8] = $preguntastemas2f[3];
    $id_pregunta1[9] = $preguntastemas2f[4];

    // var_dump( $id_pregunta1 );

    $preguntastemas1m = array();
    $preguntastemas2m = array();

    $tam1 = count($preguntasmedio);

    //  echo $tam1;

    for ($i = 0; $i < $tam1; $i++) {

        // echo "-".$preguntasmedio[$i] ;

        $respuestat = temapregunta($preguntasmedio[$i]);

        while ($row = mysqli_fetch_array($respuestat)) {

            $id_temas = $row['id_temas'];

        }

        if ($id_tema[0] == $id_temas) {
            $preguntastemas1m[] = $preguntasmedio[$i];
        } else if ($id_tema[1] == $id_temas) {
            $preguntastemas2m[] = $preguntasmedio[$i];
        }

    }

    $id_pregunta2[0] = $preguntastemas1m[0];
    $id_pregunta2[1] = $preguntastemas1m[1];
    $id_pregunta2[2] = $preguntastemas1m[2];
    $id_pregunta2[3] = $preguntastemas1m[3];
    $id_pregunta2[4] = $preguntastemas1m[4];
    $id_pregunta2[5] = $preguntastemas2m[0];
    $id_pregunta2[6] = $preguntastemas2m[1];
    $id_pregunta2[7] = $preguntastemas2m[2];
    $id_pregunta2[8] = $preguntastemas2m[3];
    $id_pregunta2[9] = $preguntastemas2m[4];

    //  var_dump($id_pregunta2);

    $preguntastemas1d = array();
    $preguntastemas2d = array();

    $tam1 = count($preguntasdificil);

    //  echo $tam1;

    for ($i = 0; $i < $tam1; $i++) {

        //  echo $preguntasdificil[$i] ;

        $respuestat = temapregunta($preguntasdificil[$i]);

        while ($row = mysqli_fetch_array($respuestat)) {

            $id_temas = $row['id_temas'];

        }

        if ($id_tema[0] == $id_temas) {
            $preguntastemas1d[] = $preguntasdificil[$i];
        } else if ($id_tema[1] == $id_temas) {
            $preguntastemas2d[] = $preguntasdificil[$i];
        }

    }

    $id_pregunta3[0] = $preguntastemas1d[0];
    $id_pregunta3[1] = $preguntastemas1d[1];
    $id_pregunta3[2] = $preguntastemas1d[2];
    $id_pregunta3[3] = $preguntastemas1d[3];
    $id_pregunta3[4] = $preguntastemas1d[4];
    $id_pregunta3[5] = $preguntastemas2d[0];
    $id_pregunta3[6] = $preguntastemas2d[1];
    $id_pregunta3[7] = $preguntastemas2d[2];
    $id_pregunta3[8] = $preguntastemas2d[3];
    $id_pregunta3[9] = $preguntastemas2d[4];

    //  var_dump($id_pregunta3);

}

$_SESSION['preguntas1'] = $id_pregunta1;
$_SESSION['preguntas2'] = $id_pregunta2;
$_SESSION['preguntas3'] = $id_pregunta3;

// var_dump($id_pregunta1);
// var_dump($id_pregunta2);
// var_dump($id_pregunta3);

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>



  <link rel="stylesheet" href="../css/bootstrap.css">


   <link rel="stylesheet" href="../css/bootstrap-theme.min.css" >


     <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->

 <style>
    .color-palette {
      height: 35px;
      line-height: 35px;
      text-align: right;
      padding-right: .75rem;
    }

    .color-palette.disabled {
      text-align: center;
      padding-right: 0;
      display: block;
    }

    .color-palette-set {
      margin-bottom: 15px;
    }

    .color-palette span {
      display: none;
      font-size: 12px;
    }

    .color-palette:hover span {
      display: block;
    }

    .color-palette.disabled span {
      display: block;
      text-align: left;
      padding-left: .75rem;
    }

    .color-palette-box h4 {
      position: absolute;
      left: 1.25rem;
      margin-top: .75rem;
      color: rgba(255, 255, 255, 0.8);
      font-size: 12px;
      display: block;
      z-index: 7;
    }
  </style>
    <title>USUARIO-Encuestas</title>


</head>
<body class="hold-transition sidebar-mini">




<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="principal.php" class="nav-link">Home</a>
      </li>

    </ul>

    <!-- SEARCH FORM -->


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="btn btn-success my-2 my-sm-0" href='logout.php'>Cerrar Sesion </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="principal.php" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">CE-MATH 1.0</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo ' ' . utf8_decode($row['usu_nombre']); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Menu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
      <?php if ($_SESSION['tipo_usuario'] == 2) {?>
              <li class="nav-item">
                <a href="vistaestudiante.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Evaluaciones</p>
                   <li class="nav-item active" style="margin-left:10px">
        <button type="button" class="btn btn-outline-success" onClick="history.go(-1); return false;">Evaluaciones</button>
        </li>

         <li class="nav-item active" style="margin-left:10px">
        <button type="button" class="btn btn-outline-success" onClick="history.go(0); return false;">Inicio Evaluacion</button>
        </li>
                </a>
              </li>
    <?php }?>

            <?php if ($_SESSION['tipo_usuario'] == 3) {?>
              <li class="nav-item">
                <a href="creartemas.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear Temas</p>
                </a>
              </li>
  <?php }?>

        <?php if ($_SESSION['tipo_usuario'] == 3) {?>
              <li class="nav-item">
                <a href="crearevaluacion.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Evaluaciones</p>
                </a>
              </li>

  <?php }?>
            </ul>
          </li>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">



    <div class="content">
      <div class="container-fluid">


     <div style="margin-top: 30px;">
          <div class="card card-default color-palette-box"  >
          <div class="card-header" >
              <h3>Entrada Evaluacion </h3>
          </div>
          <div class="card-body">



    <div  align="center" >

<div class="card border-success mb-3" style="max-width: 40rem;">
  <div class="card-header">Observaciones para la evaluacion  </div>
  <div class="card-body ">
    <h5> Califique la dificultadad de la pregunta teniendo en cuenta que :</h5>
        <br/>
        <p>1 y 2 es una pregunta facil</p>

        <p>3 es una pregunta es regular</p>

        <p>4 y 5 es una pregunta dificil</p>



    <h5> Algunas preguntas cuentan con una ayuda</h5>



  </div>
</div>

</div>



     <div align="center" style=" margin:30px  " >
        <a class="btn btn-success" href="vistaevaluacion.php" >Iniciar evaluacion </a>
     </div>



          </div>
          <!-- /.card-body -->
        </div>

  </div>


      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>


  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.3-pre
    </div>
  </footer>
</div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../jsprograma/js/jquery-3.3.1.min.js"></script>
  <script src="../jsprograma/js/popper.min.js"></script>
  <script src="../jsprograma/js/bootstrap.min.js"></script>


 <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="../dist/js/adminlte.js"></script>


</body>
</html>