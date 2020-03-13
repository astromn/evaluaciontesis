<?php
session_start();
require 'modelo/funcs/conexion.php';
include 'modelo/funcs/funcs.php';

//Iniciar una nueva sesión o reanudar la existente

if (isset($_SESSION["id_usuario"])) {
    //En caso de existir la sesión redireccionamos
    header("location:Vista/principal.php");
}

$errors = array();

if (!empty($_POST)) {
    $usuario  = $mysqli->real_escape_string($_POST['usuario']);
    $password = $mysqli->real_escape_string($_POST['password']);

    if (isNullLogin($usuario, $password)) {
        $errors[] = "Debe llenar todos los campos";
    }

    $errors[] = login($usuario, $password);
}
?>
<html>
  <head>
    <title>Login</title>

  <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap-theme.css">


  <script src="librerias/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="jsprograma/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="jsprograma/js/popper.min.js"></script>




  </head>
<body  class="hold-transition login-page">

<div class="container" align="center" >


  <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

    <div style="padding-top:50px" class="panel-body" >

          <div class = "panel panel-primary">

              <div class = "panel-heading">
               <h3 class = "panel-title">Login</h3>
              </div>

                <div class = "panel-body" style="padding-top:50px" >

                  <form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'];?>" method="POST" autocomplete="off">



                     <div class="form-group">
                      <div  class="input-group">
                     <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                       <input id="usuario" type="text" class="form-control" name="usuario" value="" placeholder="usuario o email" required>
                      </div>
                      </div>


                       <div class="form-group">
                       <div  class="input-group">
                       <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                       <input id="password" type="password" class="form-control" name="password" placeholder="password" required>
                       </div>
                        </div>


                      <div class="form-group">
                      <div class="col-sm-12 controls">
                      <button id="btn-login" type="submit" class="btn btn-success">Iniciar Sesi&oacute;n</a>
                      </div>
                       </div>

                     <div class="form-group">
                      <div class="col-md-12 control">
                      <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                        No tiene una cuenta! <a href="Vista/Registrousuarios.php"><h2>Registrarte</h2></a>
                        </div>
                      </div>
                      </div>


                  </form>

                           <?php echo resultBlock($errors); ?>

                 </div>


               </div>



              </div>
        </div>
</div>




  </body>
</html>
