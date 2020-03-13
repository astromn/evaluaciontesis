<?php
session_start();
require "../modelo/funcs/conexion.php";

$id_temas = $_GET['id_temas'];

$_SESSION['id_temas'] = $id_temas;

?>

<!DOCTYPE html>
<html lang="es">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">




  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">

  <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap-theme.css">


     <link rel="stylesheet" type="text/css" href="../librerias/css/themes/default.css">


  <link rel="stylesheet" type="text/css" href="../css/index_style.css">

  <script src="../jsprograma/js/jquery-3.3.1.min.js"></script>
  <script src="../jsprograma/js/popper.min.js"></script>
  <script src="../jsprograma/js/bootstrap.min.js"></script>
    <script src="../jsprograma/jsevaluacion/vistaprevia.js"></script>

  <title>Responder</title>
</head>
<body>
     <style>
      body {
      padding-top: 20px;
      padding-bottom: 20px;
      }
    </style>

  <input type="hidden" value="15" id="tamma" name="tamma">



    <nav class="navbar navbar-expand-lg navbar-dark bg-verde">
    <a class="navbar-brand" href="javascript:void(0)">Vista Previa de Preguntas</a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
      <span class="navbar-toggler-icon"></span>
    </button>


    <!--NAVBAR-->
    <div class="collapse navbar-collapse" id="navb">
      <ul class="navbar-nav mr-auto">
      </ul>
      <form class="form-inline my-2 my-lg-0" style="color: #fff">


      </form>
    </div>
  </nav>


    <div class="container">


         <div class="registros" id="agrega-registros"></div>

         <br>
          <br>
           <br>


    <center>

      <ul class="pagination" id="pagination"></ul>
    </center>


    </div>



</body>
</html>
