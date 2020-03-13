<?php
session_start();
error_reporting(0);
require "../modelo/funcs/conexion.php";
include '../modelo/funcs/crudrespoder.php';

$id_evaluacion   = $_SESSION['id_evaluacion'];
$id_usuario      = $_SESSION['id_usuario'];
$nivelestudiante = $_SESSION['nivelestudiante'];

// id preguntas profesor
$id_preguntasfacil   = $_SESSION['preguntasfacil'];
$id_preguntasmedio   = $_SESSION['preguntasmedio'];
$id_preguntasdificil = $_SESSION['preguntasdidicil'];

// id preguntas estudiente
$id_pregunta1 = $_SESSION['preguntas1'];
$id_pregunta2 = $_SESSION['preguntas2'];
$id_pregunta3 = $_SESSION['preguntas3'];

$Correcta                     = "";
$_SESSION['correctasdificil'] = 0;

$correctasdificil = $_SESSION['correctasdificil'];

$numeropreguntas = $_SESSION['contarpregunta'];
$_SESSION['contarpregunta'] += 1;

if (isset($_POST['enviar'])) {
    $numerof = $_SESSION['contar'];

    if ($numeropreguntas == 11) {

        header("location:finalevaluacion.php");

    } else if ($numerof == 5 && $_SESSION['correctasdificil'] == 5) {
        header("location:finalevaluacion.php");
    }

    $tipop = $_POST['tipop'];

    $horas    = $_POST['hora'];
    $minutos  = $_POST['minuto'];
    $segundos = $_POST['segundo'];

    $tiempo = $horas . ':' . $minutos . ':' . $segundos;

    if ($minutos == null && $horas == null) {

        $tiempop = "00:00:" . $segundos;
    }

    if ($horas == null && $minutos != null && $segundos != null) {

        $tiempop = "00:" . $minutos . ":" . $segundos;
    }

    $Correcta = "";

    if ($tipop == 1) {

        $radio = $_POST['radios1'];

        // id pregunta
        $respuestas = respuestareguntasopcions($radio);

        while ($mostarres = mysqli_fetch_array($respuestas)) {
            $id_orden = $mostarres[0];
        }

        $cadena2 = "Correcta";

        $idpregunta = idpreguntaopciones($radio);

        while ($mostarress = mysqli_fetch_array($idpregunta)) {
            $idpreguntas = $mostarress[0];
        }

        if (strcasecmp($id_orden, $cadena2) == 0) {

            $Correcta = 1;

            $resultado = insertarresultadoevaluacion($id_evaluacion, $id_usuario, $idpreguntas, $numerof, $Correcta, $tiempop);

            if ($resultado == 1) {

                $_SESSION['contar'] += 1;
            }
            if ($_SESSION['dificultad'] == 3) {
                $_SESSION['correctasdificil'] = $correctasdificil + 1;
            } else {
                $_SESSION['correctasdificil'] = 0;
            }

            if ($_SESSION['dificultad'] == 1) {
                $_SESSION['dificultad'] = 2;
            } else if ($_SESSION['dificultad'] == 2) {
                $_SESSION['dificultad'] = 3;
            } else if ($_SESSION['dificultad'] == 3) {
                $_SESSION['dificultad'] = 3;
            }

            actualizardatoshistorial($idpreguntas, $Correcta, $tiempo);

            //    echo "correcta";

        } else {

            $Correcta  = 0;
            $resultado = insertarresultadoevaluacion($id_evaluacion, $id_usuario, $idpreguntas, $numerof, $Correcta, $tiempop);

            if ($resultado == 1) {
                $_SESSION['contar'] += 1;
            }

            if ($_SESSION['dificultad'] == 3) {
                $_SESSION['correctasdificil'] = $correctasdificil + 1;
            } else {
                $_SESSION['correctasdificil'] = 0;
            }

            if ($_SESSION['dificultad'] == 1) {
                $_SESSION['dificultad'] = 1;
            } else if ($_SESSION['dificultad'] == 2) {
                $_SESSION['dificultad'] = 1;
            } else if ($_SESSION['dificultad'] == 3) {
                $_SESSION['dificultad'] = 2;
            }

            actualizardatoshistorial($idpreguntas, $Correcta, $tiempo);

            //    echo "incorrecta";

        }

    } else if ($tipop == 2) {

        $radio2 = $_POST['radios2'];
        $valor  = $_POST['valor'];

        $respuestas = idopcionfv($radio2);

        while ($mostarres = mysqli_fetch_array($respuestas)) {
            $resfv = $mostarres[0];
        }

        $idpregunta = idpreguntaopcionesfv($radio2);

        while ($mostarress = mysqli_fetch_array($idpregunta)) {
            $idpreguntas = $mostarress[0];
        }

        if ($resfv == $valor) {

            $Correcta  = 1;
            $resultado = insertarresultadoevaluacion($id_evaluacion, $id_usuario, $idpreguntas, $numerof, $Correcta, $tiempop);

            if ($resultado == 1) {
                $_SESSION['contar'] += 1;

            }
            if ($_SESSION['dificultad'] == 3) {
                $_SESSION['correctasdificil'] = $correctasdificil + 1;
            } else {
                $_SESSION['correctasdificil'] = 0;
            }

            if ($_SESSION['dificultad'] == 1) {
                $_SESSION['dificultad'] = 2;
            } else if ($_SESSION['dificultad'] == 2) {
                $_SESSION['dificultad'] = 3;
            } else if ($_SESSION['dificultad'] == 3) {
                $_SESSION['dificultad'] = 3;
            }

            actualizardatoshistorial($idpreguntas, $Correcta, $tiempo);

            //  echo "correcta";

        } else {
            $Correcta = 0;

            $resultado = insertarresultadoevaluacion($id_evaluacion, $id_usuario, $idpreguntas, $numerof, $Correcta, $tiempop);
            if ($resultado == 1) {
                $_SESSION['contar'] += 1;

            }

            if ($_SESSION['dificultad'] == 3) {
                $_SESSION['correctasdificil'] = $correctasdificil + 1;
            } else {
                $_SESSION['correctasdificil'] = 0;
            }

            $_SESSION['responde'] = 0;
            if ($_SESSION['dificultad'] == 1) {
                $_SESSION['dificultad'] = 1;
            } else if ($_SESSION['dificultad'] == 2) {
                $_SESSION['dificultad'] = 1;
            } else if ($_SESSION['dificultad'] == 3) {
                $_SESSION['dificultad'] = 2;
            }

            actualizardatoshistorial($idpreguntas, $Correcta, $tiempo);
            // echo "incorrecta";
        }

    } else if ($tipop == 3) {

        $radio3 = $_POST['radios3'];

        $respuestas = idopcionimagen($radio3);

        while ($mostarres = mysqli_fetch_array($respuestas)) {
            $id_orden = $mostarres[0];
        }

        $idpregunta = idpreguntaopcionesimagen($radio3);

        while ($mostarress = mysqli_fetch_array($idpregunta)) {
            $idpreguntas = $mostarress[0];
        }

        $cadena2 = "Correcta";

        if (strcasecmp($id_orden, $cadena2) == 0) {

            $Correcta = 1;

            $resultado = insertarresultadoevaluacion($id_evaluacion, $id_usuario, $idpreguntas, $numerof, $Correcta, $tiempop);
            if ($resultado == 1) {
                $_SESSION['contar'] += 1;

            }

            if ($_SESSION['dificultad'] == 3) {
                $_SESSION['correctasdificil'] = $correctasdificil + 1;
            } else {
                $_SESSION['correctasdificil'] = 0;
            }

            if ($_SESSION['dificultad'] == 1) {
                $_SESSION['dificultad'] = 2;
            } else if ($_SESSION['dificultad'] == 2) {
                $_SESSION['dificultad'] = 3;
            } else if ($_SESSION['dificultad'] == 3) {
                $_SESSION['dificultad'] = 3;
            }

            // echo "correcta";

            actualizardatoshistorial($idpreguntas, $Correcta, $tiempo);

        } else {

            $Correcta = 0;

            $resultado = insertarresultadoevaluacion($id_evaluacion, $id_usuario, $idpreguntas, $numerof, $Correcta, $tiempop);
            if ($resultado == 1) {

                $_SESSION['contar'] += 1;

            }

            if ($_SESSION['dificultad'] == 3) {
                $_SESSION['correctasdificil'] = $correctasdificil + 1;
            } else {
                $_SESSION['correctasdificil'] = 0;
            }

            if ($_SESSION['dificultad'] == 1) {
                $_SESSION['dificultad'] = 1;
            } else if ($_SESSION['dificultad'] == 2) {
                $_SESSION['dificultad'] = 1;
            } else if ($_SESSION['dificultad'] == 3) {
                $_SESSION['dificultad'] = 2;
            }

            actualizardatoshistorial($idpreguntas, $Correcta, $tiempo);
            // echo "incorrecta";
        }
    }

}

?>

<!DOCTYPE html>
<html lang="es">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>


  <link rel="stylesheet" href="../css/bootstrap.css">
   <link rel="stylesheet" href="../css/bootstrap-theme.min.css" >



     <link rel="stylesheet" type="text/css" href="../librerias/css/themes/default.css">


  <link rel="stylesheet" type="text/css" href="../css/index_style.css">

    <style>
      body {
      padding-top: 20px;
      padding-bottom: 20px;
      }
    </style>

  <title>Responder</title>
</head>
<body onload="iniciar()">



  <input type="hidden" value="15" id="tamma" name="tamma">



    <nav class="navbar navbar-expand-lg navbar-dark bg-verde">
    <a class="navbar-brand" href="javascript:void(0)">Evaluacion de Estudiante </a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
      <span class="navbar-toggler-icon"></span>
    </button>


    <!--NAVBAR-->
    <div class="collapse navbar-collapse" id="navb">
      <ul class="navbar-nav mr-auto">
      </ul>

    </div>
  </nav>

 <div style="margin-left:  85%;margin-top: 10px">
   <button type="button" class="btn btn-success"  >
   Pregunta : <span class="badge badge-light" > <?php echo $numeropreguntas; ?></span>
</button>

</div>

    <div align="center">

     <input type="hidden" value=" <?php echo $_SESSION['contar'] ?> " id="valorinicial" name="valorinicial">

     <input type="hidden" value=" <?php echo $_SESSION['inicioalgoritmo'] ?> " id="inicoalgoritmo" name="inicoalgoritmo">



<br/>


  <h2> Tiempo </h2>

<br/>


    <button type="button" class="btn btn-success">
  horas : <span class="badge badge-light" id="horas" name="horas" ></span>
</button>

   <button type="button" class="btn btn-success">
  minutos : <span class="badge badge-light" id="minutos" name="minutos" ></span>
</button>

 <button type="button" class="btn btn-success">
  segundos : <span class="badge badge-light" id="segundos" name="segundos"></span>
</button>


 </div>

<br>

<?php

$valor = $_SESSION['inicioalgoritmo'];

if ($valor == 0) {

    if ($_SESSION['contar'] == 0) {
        $respuesta2 = mostrarnivelpregunta($id_evaluacion, $id_preguntasfacil[$_SESSION['limit1']]);
        $_SESSION['limit1'] += 1;
        $_SESSION['posf'] += 1;

    } else {

        if ($_SESSION['dificultad'] == 1) {

            if ($_SESSION['limit1'] < 5) {
                $respuesta2 = mostrarnivelpregunta($id_evaluacion, $id_preguntasfacil[$_SESSION['posf']]);
                $_SESSION['posf'] += 1;

            } else if ($_SESSION['limit1'] >= 5) {

                $_SESSION['posf'] = $_SESSION['limit1'];

                $respuesta2 = mostrarnivelpregunta($id_evaluacion, $id_preguntasfacil[$_SESSION['posf']]);
                $_SESSION['posf'] += 1;

            }

            $_SESSION['limit1'] += 1;

        } else if ($_SESSION['dificultad'] == 2) {

            if ($_SESSION['limit1'] < 5) {
                $respuesta2 = mostrarnivelpregunta($id_evaluacion, $id_preguntasmedio[$_SESSION['posm']]);
                $_SESSION['posm'] += 1;

            } else if ($_SESSION['limit1'] >= 5) {

                $_SESSION['posm'] = $_SESSION['limit1'];

                $respuesta2 = mostrarnivelpregunta($id_evaluacion, $id_preguntasmedio[$_SESSION['posm']]);
                $_SESSION['posm'] += 1;

            }

            $_SESSION['limit1'] += 1;

        } else if ($_SESSION['dificultad'] == 3) {

            if ($_SESSION['limit1'] < 5) {
                $respuesta2 = mostrarnivelpregunta($id_evaluacion, $id_preguntasdificil[$_SESSION['posd']]);
                $_SESSION['posd'] += 1;

            } else if ($_SESSION['limit1'] >= 5) {

                $_SESSION['posd'] = $_SESSION['limit1'];

                $respuesta2 = mostrarnivelpregunta($id_evaluacion, $id_preguntasdificil[$_SESSION['posd']]);
                $_SESSION['posd'] += 1;

            }

            $_SESSION['limit1'] += 1;
        }

    }

} else if ($valor == 1) {

    if ($_SESSION['contar'] == 0) {

        $pos = $_SESSION['limit1'];

        if ($nivelestudiante < 60) {
            $respuesta2 = mostrarpreuntaspersonalizada($id_evaluacion, $id_pregunta1[$pos]);
            $_SESSION['posf'] += 1;

        } else if ($nivelestudiante >= 60 && $nivelestudiante < 80 || $nivelestudiante == 0) {

            $respuesta2 = mostrarpreuntaspersonalizada($id_evaluacion, $id_pregunta2[$pos]);
            $_SESSION['posm'] += 1;
        } else if ($nivelestudiante >= 80) {
            $respuesta2 = mostrarpreuntaspersonalizada($id_evaluacion, $id_pregunta3[$pos]);
            $_SESSION['posd'] += 1;
        }

        $_SESSION['limit1'] += 1;

    } else {

        if ($_SESSION['dificultad'] == 1) {

            $pos = $_SESSION['limit1'];

            if ($pos < 5) {
                $respuesta2 = mostrarpreuntaspersonalizada($id_evaluacion, $id_pregunta1[$_SESSION['posf']]);
                $_SESSION['posf'] += 1;
            } else if ($pos >= 5) {
                $_SESSION['posf'] = $pos;
                $respuesta2       = mostrarpreuntaspersonalizada($id_evaluacion, $id_pregunta1[$_SESSION['posf']]);
                $_SESSION['posf'] += 1;
            }

            $_SESSION['limit1'] += 1;

        } else if ($_SESSION['dificultad'] == 2) {
            $pos = $_SESSION['limit1'];

            if ($pos < 5) {
                $respuesta2 = mostrarpreuntaspersonalizada($id_evaluacion, $id_pregunta2[$_SESSION['posm']]);
                $_SESSION['posm'] += 1;

            } else if ($pos >= 5) {
                $_SESSION['posm'] = $pos;
                $respuesta2       = mostrarpreuntaspersonalizada($id_evaluacion, $id_pregunta2[$_SESSION['posm']]);
                $_SESSION['posm'] += 1;
            }

            $_SESSION['limit1'] += 1;

        } else if ($_SESSION['dificultad'] == 3) {
            $pos = $_SESSION['limit1'];

            if ($pos < 5) {

                $respuesta2 = mostrarpreuntaspersonalizada($id_evaluacion, $id_pregunta3[$_SESSION['posd']]);
                $_SESSION['posd'] += 1;

            } else if ($pos >= 5) {
                $_SESSION['posd'] = $pos;
                $respuesta2       = mostrarpeuntaspersonalizada($id_evaluacion, $id_pregunta3[$_SESSION['posd']]);
                $_SESSION['posd'] += 1;
            }
            $_SESSION['limit1'] += 1;
        }

    }

}

while (($row2 = $respuesta2->fetch_assoc())) {

    $id = $row2['id_pregunta'];

    $respuesta = mostraropciones($id);

    ?>



    <?php

    if ($row2['contextoimagen'] != null) {

        ?>



       <div style="margin-left: 50px">

       <div class="container col-md-12 ">

       <h2><?php echo $row2['descripcion'] ?></h2>

       <img src="../controladores/funcionesProfesorphp/contextoprofesorphp/imagenesf/<?php echo $row2['contextoimagen'] ?> " width="auto" height="auto">

      <h4>  <?php echo $row2['titulo'] ?></h4>



    </div>


<?php

    } else {

        ?>



       <div class="container col-md-12 ">


       <h2> <?php echo $row2['descripcion'] ?> </h2>



      <h4> <?php echo $row2['titulo'] ?></h4>

    </div>

    <?php

    }

    ?>










   <form name="opcionesres" id="opcionesres"  action=" <?php echo $_SERVER['PHP_SELF'] ?> "  method="post"   >



                <input type="hidden" value="<?php echo $row2['id_tipo_pregunta'] ?> " id="tipop" name="tipop">

                 <input type="hidden" value="" id="hora" name="hora">
                  <input type="hidden" value="" id="minuto" name="minuto">
                   <input type="hidden" value="" id="segundo" name="segundo">




 <?php

    if ($row2['id_tipo_pregunta'] == 1) {

        while ($row = mysqli_fetch_array($respuesta)) {

            $id_opcion[] = $row['id_opcion'];

            $valorr[] = $row['valor'];

        }

        ?>
                           <div style="margin-left: 40px">
                           <div class=" col-md-12">


                               <div class="radio">
                               <label for="radios-0">
                                 <label><input class="form-check-input" type="radio" id="radios1"  name="radios1" value=" <?php echo $id_opcion[0] ?>" required> <?php echo $valorr[0] ?></label>

                                  </div>



                               <div class="radio">
                               <label for="radios-1">
                                 <label><input class="form-check-input" type="radio" id="radios2"  name="radios1" value="<?php echo $id_opcion[1] ?>" required> <?php echo $valorr[1] ?></label>

                                   </div>





                               <div class="radio">
                               <label for="radios-2">
                                 <label><input class="form-check-input" type="radio" id="radios3"  name="radios1" value="<?php echo $id_opcion[2] ?>" required> <?php echo $valorr[2] ?></label>
                                   </div>




                               <div class="radio">
                               <label for="radios-2">
                                 <label><input class="form-check-input" type="radio" id="radios4"  name="radios1" value="<?php echo $id_opcion[3] ?>" required><?php echo $valorr[3] ?></label>
                                   </div>

                                  </div>

        </div>

  <?php
} else if ($row2['id_tipo_pregunta'] == 2) {

        $confv = mostraropcionesfv($id);

        while ($row = mysqli_fetch_array($confv)) {

            $id_opcion[] = $row['id_opcion'];

        }

        ?>



                          <div class="col-md-12">


                               <div class="radio">
                               <label for="radios-0">
                               <input type="radio" name="radios2"  id="radiofv1" value="<?php echo $id_opcion[0] ?>"required />
                                   Verdadero
                               </label>

                              </div>


                               <div class="radio">
                               <label for="radios-1">
                               <input type="radio" name="radios2"  id="radiofv2" value="<?php echo $id_opcion[0] ?>"required />
                                   Falso
                               </label>

                              </div>

                              <input type="hidden" value="" id="valor" name="valor">



    <?php

    } else if ($row2['id_tipo_pregunta'] == 3) {

        $respuestas = mostraropcionesimagen($id);

        while ($mostarnumeros = mysqli_fetch_array($respuestas)) {

            $id_opcion[] = $mostarnumeros['id_imagen'];

            $tblimagenes[] = $mostarnumeros['imagen'];

        }

        ?>

                  <div class="row" style="margin-left: 15px">



                           <div class="col-md-6">
                               <div class="radio">
                               <label for="radios-0">
                               <input type="radio" name="radios3"  id="radioi1" value=" <?php echo $id_opcion[0] ?>"   required />



                           <img src="../controladores/funcionesProfesorphp/opcionesimagenprofesorphp/imagenesopcion/<?php echo $tblimagenes[0]; ?>" width="auto" height="auto">

                               </label>

                              </div>

                               </div>



                                <div class="col-md-6">
                               <div class="radio">
                               <label for="radios-1">
                               <input type="radio" name="radios3"  id="radioi2" value=" <?php echo $id_opcion[1] ?>"   required / >



                           <img src="../controladores/funcionesProfesorphp/opcionesimagenprofesorphp/imagenesopcion/<?php echo $tblimagenes[1]; ?>" width="auto" height="auto">

                               </label>

                              </div>

                               </div>


                               </div>


<div class="row" style="margin-left: 15px">


                                <div class="col-md-6">
                               <div class="radio">
                               <label for="radios-2">
                               <input type="radio" name="radios3"  id="radioi3" value=" <?php echo $id_opcion[2] ?>"  required />





                           <img src="../controladores/funcionesProfesorphp/opcionesimagenprofesorphp/imagenesopcion/<?php echo $tblimagenes[2]; ?>" width="auto" height="auto">

                               </label>

                              </div>

                               </div>



                                <div class="col-md-6">
                               <div class="radio">
                               <label for="radios-3">
                               <input type="radio" name="radios3"  id="radioi4" value=" <?php echo $id_opcion[3] ?>" required  />



                           <img src="../controladores/funcionesProfesorphp/opcionesimagenprofesorphp/imagenesopcion/<?php echo $tblimagenes[3]; ?>" width="auto" height="auto" >

                               </label>

                              </div>

                               </div>


                               </div>


   <?php

    }

    ?>
            </br> </br> </br>

      <div class="btn-group" style="margin-left: 40%">



         <input type="submit"  value="Respoder"  class="btn btn-info " name="enviar" id="enviar" >  <i class="icon-hand-right"></i>



<abbr  title="Calificar Pregunta  " style="text-decoration:none" >
     <button class="float-right btn btn-success" id="calificar" style="margin-left: 10px ;display:none"    >
                  Calificar Pregunta
                </button>

              </abbr>


               <?php if ($row2['ayudaestudiante'] != "" || $row2['imagenpregunta'] != null) {

        ?>
        <input type="button" style=" margin-left: 10px" class="btn btn-success" id="ayuda" value="Visualizar Ayuda ">
       <?php }?>



</div>



            </form>

 </br>
</br>
 </br>

</div>





<div class="modal fade" id="modalayuda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ayuda </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

       <?php

    if ($row2['ayudaestudiante'] != "") {

        ?>

  <p class="info"> <?php echo $row2['ayudaestudiante']; ?>  </p>

 <?php
} else if ($row2['imagenpregunta'] != null) {

        ?>

   <div align="center">
  <img src="../controladores/funcionesProfesorphp/Preguntasprofesorphp/imagenesf/<?php echo $row2['imagenpregunta']; ?>" width="auto" height="auto">
</div>
<?php

    }?>




      <div class="modal-footer" >

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</div>

 <?php

}
?>




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="col-xs-12"> <h5 class="modal-title" id="exampleModalLabel" > califique de 1 a 5 la dificultad de la pregunta    </h5>  </div>



        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



  <div class="row" >
    <div class="col-sm-2">

<label class="btn btn-success"><img src="../imagenes/uno.PNG"  width="100" height="100" class="img-thumbnail img-check"> <input type="radio" name="radios3"  id="radiod1" value=" "  /></label>

    </div>

    <div class="col-sm-2">

               <label class="btn btn-success"><img src="../imagenes/dos.PNG"  width="100" height="100" class="img-thumbnail img-check"> <input type="radio" name="radios3"  id="radiod2" value=" "  /></label>

    </div>

    <div class="col-sm-2">

<label class="btn btn-success"><img src="../imagenes/tres.PNG"  width="100" height="100" class="img-thumbnail img-check"> <input type="radio" name="radios3"  id="radiod3" value=" "  /></label>

    </div>


      <div class="col-sm-2">

<label class="btn btn-success"><img src="../imagenes/cuatro.PNG"  width="100" height="100" class="img-thumbnail img-check"> <input type="radio" name="radios3"  id="radiod4" value=" "  /></label>

    </div>

      <div class="col-sm-2">

<label class="btn btn-success"><img src="../imagenes/cinco.PNG"  width="100" height="100" class="img-thumbnail img-check"> <input type="radio" name="radios3"  id="radiod5" value=" "  /></label>

    </div>
  </div>



    <input type="hidden" value="" id="dificultad" name="dificultad">

 <input type="hidden" value="  <?php echo $idpreguntas ?>" id="idpregunta" name="idpregunta">
  <input type="hidden" value="  <?php echo $Correcta ?>" id="correcta" name="correcta">




      <div class="modal-footer" >

        <button  type="button" id="modal1" class="btn btn-success" onclick="actualizarvalor()" >Continuar</button>
      </div>
    </div>
  </div>
</div>
</div>



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="../jsprograma/js/jquery-3.3.1.min.js" ></script>
   <script src="../jsprograma/js/popper.min.js"></script>
    <script src="../jsprograma/js/bootstrap.min.js" ></script>
  <script src="../librerias/alertify.js" ></script>

  <script type="text/javascript" src="../jsprograma/jsestudiante/evaluacionestudiante.js"></script>



</body>
</html>
<Script language="javascript">
function checkKeyCode(evt)
{

var evt = (evt) ? evt : ((event) ? event : null);
var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
if(event.keyCode==116)
{
evt.keyCode=0;
return false
}
}
document.onkeydown=checkKeyCode;

$(document).ready(function() {
    $("form").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });
});
</script>


<script type="text/javascript">

var cronometro ;


function iniciar (){
  var h =0;
  var m= 0;
  var s=0;

  var hp = document.getElementById("horas")  ;
  var mp = document.getElementById("minutos")  ;
  var sp = document.getElementById("segundos") ;




  cronometro = setInterval(function(){

    if(s==59){

      s=0;
      m++;
     mp.innerHTML=m;
      document.getElementById("minuto").value = m;
if(m==59){
   m=0;
   h++;
   hp.innerHTML=h;
    document.getElementById("hora").value = h;

}

    }

    s++;
    sp.innerHTML=s;
     document.getElementById("segundo").value = s;


  },1000);

}


</script>


<script type="text/javascript">

 $(document).ready(function(){

  $("#radiofv1").click(function(){


           var valor ="Verdadero" ;

        document.getElementById("valor").value = valor;


    });


    $("#radiofv2").click(function(){


           var valor ="Falso" ;

document.getElementById("valor").value = valor;

    });





   $("#radiod1").click(function(){

              $('#modal1').prop('disabled', false);
      var difi ="1" ;

        document.getElementById("dificultad").value = difi;
    });


$("#radiod2").click(function(){

              $('#modal1').prop('disabled', false);
           var difi ="2" ;

         document.getElementById("dificultad").value = difi;
    });

$("#radiod3").click(function(){

              $('#modal1').prop('disabled', false);
           var difi ="3" ;

          document.getElementById("dificultad").value = difi;
    });



$("#radiod4").click(function(){

              $('#modal1').prop('disabled', false);
           var difi ="4" ;

          document.getElementById("dificultad").value = difi;
    });

$("#radiod5").click(function(){

              $('#modal1').prop('disabled', false);
           var difi ="5" ;

          document.getElementById("dificultad").value = difi;
    });




      });

</script>