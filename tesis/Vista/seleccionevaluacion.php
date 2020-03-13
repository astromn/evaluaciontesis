<?php
session_start();
include "../modelo/funcs/conexion.php";

$id_evaluacion = $_GET['id_evaluacion'];

$_SESSION['id_evaluacion'] = $id_evaluacion;

$id_usuario = $_SESSION['id_usuario'];

$query      = "SELECT * FROM tbl_temas WHERE id_usuario = '$id_usuario'";
$respuesta3 = $mysqli->query($query);

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


   <script src="../jsprograma/js/jquery-3.3.1.min.js" ></script>
   <script src="../jsprograma/js/popper.min.js"></script>
    <script src="../jsprograma/js/bootstrap.min.js" ></script>
    <script src="../jsprograma/jsprofesor/crudseleccion.js"></script>

       <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="../dist/js/adminlte.js"></script>

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
                </a>
              </li>
  <?php }?>

        <?php if ($_SESSION['tipo_usuario'] == 3) {?>
              <li class="nav-item item has-treeview menu-open ">
                <a href="crearevaluacion.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Evaluaciones</p>

                  <li class="has-sub"><a title="" href="#">Crear Evaluacion </a>
                    <ul>
                        <li class="nav-item active" style="margin-left:10px">
       <button type="button" class="btn btn-outline-success" onClick="history.go(-1); return false;">evaluaciones </button>
        </li>
        <br>
                        <li class="nav-item active" style="margin-left:10px">
       <button type="button" class="btn btn-outline-success" onClick="history.go(0); return false;">Seleccionar Temas </button>
        </li>
   <br>

                    </ul>
                 </li>


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
   <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Proceso para Evaluacion 100 %</div>
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
              <h3>Temas a Evaluar</h3>
            </div>

            <div class="col-md-2 col-xs-12">
             <abbr  title="permite agragar un nuevo tema ">   <button class="float-right btn btn-success" id="boton_agregar">
                      Agregar Tematica
                  </button>
                  </abbr>
            </div>

          </div>
          </div>

          <div class="card-body">


           <div class="container" >


      <hr/>
        <div class="row">
          <div class="col-md-12">
              <h4>temas  seleccionados :</h4>
              <div class="table-responsive">
                <div id="tabla_preguntas"></div>
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
              <h4 class="modal-title">Agregar Temas </h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

              <form name="formulario-envia"  id="formulario-envia" enctype="multipart/form-data" method="post" >

            <div class="modal-body">


              <div class="form-group row">
                <label for="titulo" class="col-sm-3 col-form-label">Elegir Temas</label>
                <div class="col-sm-9">
                  <select id="tipo_pregunta" class="form-control">
                     <option   disabled selected > Seleccionar </option>
                  <?php
while ($row3 = $respuesta3->fetch_assoc()) {
    ?>
                    <option id="id_tipo_pregunta" value="<?php echo $row3['id_temas'] ?>" required><?php echo $row3['tema'] ?></option>
                  <?php
}
?>
                  </select>
                </div>
              </div>





            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <input type="button"  class="btn btn-success" value="agregar contexto"  onclick="agregarseleccion()">


            </div>

             <input type="hidden" value="" id="tipopregunta">

             </form>


        </div>
    </div>
</div>



</body>
</html>


</body>
</html>




<script type="text/javascript">
   $(document).ready(function(){

        $("#tipo_pregunta").change(function(){
            var valor=$("#tipo_pregunta").val();


           document.getElementById("tipopregunta").value = valor;
        });



    });


</script>