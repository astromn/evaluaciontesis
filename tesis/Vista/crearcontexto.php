<?php
session_start();
include "../modelo/funcs/conexion.php";

$id_temas = $_GET['id_temas'];

$_SESSION['id_temas'] = $id_temas;

$query     = "SELECT * FROM tbl_temas WHERE id_temas = '$id_temas'";
$respuesta = $mysqli->query($query);
$row       = $respuesta->fetch_assoc();

$idUsuario = $_SESSION['id_usuario'];

$sql    = "SELECT usu_id, usu_nombre FROM tbl_usuario WHERE usu_id = '$idUsuario'";
$result = $mysqli->query($sql);

$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link rel="stylesheet" href="../css/bootstrap.css">
   <link rel="stylesheet" href="../css/bootstrap-theme.min.css" >


       <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.css">






    <title>Contexto</title>





</head>
<body  class="hold-transition sidebar-mini">





<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="principal.php" class="nav-link">Inicio</a>
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
              <img src="../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
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
              <img src="../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
              <img src="../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
                </a>
              </li>
    <?php }?>

            <?php if ($_SESSION['tipo_usuario'] == 3) {?>
              <li class="nav-item">
                <a href="creartemas.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear Temas</p>
                      <li class="has-sub"><a title="" href="#"> Temas</a>
                    <ul>

                        <li class="nav-item active" style="margin-left:10px">
       <button type="button" class="btn btn-outline-success" onClick="history.go(-1); return false;">Temas</button>
        </li>
        <br>


                       <li class="nav-item active" style="margin-left:10px">
       <button type="button" class="btn btn-outline-success" onClick="history.go(0); return false;">Contexto</button>
        </li>


                    </ul>
                 </li>
                </a>
              </li>
  <?php }?>

        <?php if ($_SESSION['tipo_usuario'] == 3) {?>
              <li class="nav-item item has-treeview menu-open ">
                <a href="crearevaluacion.php" class="nav-link ">
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



      <div class="container" style="margin-top: 30px;">


          <div class="container" style="margin-top: 30px;">
          <div class="progress">
  <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Proceso para Crear Tema 50 %</div>

</div>
</div>
</div>



    <div class="content">
      <div class="container-fluid">


       <div style="margin-top: 30px;">
          <div class="card card-default color-palette-box"  >
          <div class="card-header" >
              <div class="col-md-12 row">
            <div class="col-md-10 col-xs-12">
                 <input type="hidden" id="id_encuesta" value="<?php echo $row['id_encuesta'] ?>">
              <h3>CONTEXTO DE PREGUNTAS </h3>
            </div>
            <div class="col-md-2 col-xs-12">
              <abbr  title="Crear un Nuevo Contexto " style="text-decoration:none">
               <button class="float-right btn btn-success" id="boton_agregar">
                      Agregar contexto
                  </button> </abbr>
            </div>
          </div>
          </div>

          <div class="card-body">


           <div class="container" >
      <div class="row">
          <div class="col-md-12 row">
            <div class="col-md-12 col-xs-12">

            </div>
          </div>
      </div>
      <h4>Contextos:</h4>
      <hr/>
        <div class="row">

          <div class="col-md-12">

              <div class="table-responsive">
                <div id="tabla_contexto"></div>
              </div>
          </div>
      </div>
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
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.3-pre
    </div>
  </footer>
</div>

<div class="modal fade" id="modal_agregar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">Agregar Nueva Contextos</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

              <form name="formulario-envia"  id="formulario-envia" enctype="multipart/form-data" method="post" >

            <div class="modal-body">


              <div class="form-group row">
                <label for="descripcion" class="col-sm-3 col-form-label">Descripción</label>
                <div class="col-sm-9">
                  <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Contexto" rows="15" cols="50"></textarea>
                </div>
              </div>


                 <div class="form-group row">
                <label for="imagenes" class="col-sm-3 col-form-label">agragar imagen </label>
                <div class="col-sm-9">
                  <input type="file" id="imagen" name="imagen" >
                </div>
              </div>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <input type="button"  class="btn btn-success" value="agregar contexto"  onclick="agregar_contextos()">


            </div>

             </form>


        </div>
    </div>
</div>

<!-- Modal Modificar Producto -->
<div class="modal fade" id="modal_modificar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">Modificar Producto</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">



              <div class="form-group row">
                <label for="descripcion" class="col-sm-3 col-form-label">Descripción</label>
                <div class="col-sm-9">
                  <textarea class="form-control" id="modificar_descripcion" placeholder="Descripción" rows="15" cols="50"></textarea>
                </div>
              </div>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="modificarDetallescontexto()">Modificar Encuesta</button>
                <input type="hidden" id="hidden_id_opcion">
            </div>

        </div>
    </div>
</div>




   <script src="../jsprograma/js/jquery-3.3.1.min.js" ></script>
   <script src="../jsprograma/js/popper.min.js"></script>
    <script src="../jsprograma/js/bootstrap.min.js" ></script>
    <script src="../jsprograma/jsprofesor/crudcontextos.js"></script>


  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="../dist/js/adminlte.js"></script>


</body>
</html>

