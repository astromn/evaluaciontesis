<?php
session_start();
include '../../../modelo/funcs/conexion.php';
include '../../../modelo/funcs/crudrespoder.php';

include '../../../modelo/funcs/crudvistaprevia.php';

$paginaActual = $_POST['partida'];

$id_temas = $_SESSION['id_temas'];

$tipo_usuario = $_SESSION['tipo_usuario'];

$numer = contarpreguntas($id_temas);

while ($row = mysqli_fetch_array($numer)) {

    $numep[] = $row['pregunta'];

}

$nroProductos = $numep[0];
$nroLotes     = 1;
$nroPaginas   = ceil($nroProductos / $nroLotes);
$lista        = '';
$tabla        = '';

if ($paginaActual > 1) {
    $lista = $lista . '<li><a href="javascript:pagination(' . ($paginaActual - 1) . ');">Anterior</a></li>';

}
for ($i = 1; $i <= $nroPaginas; $i++) {

    if ($i == $paginaActual) {
        $lista = $lista . '<li class="active"><a href="javascript:pagination(' . $i . ');">' . $i . '</a></li>';

    } else {
        $lista = $lista . '<li><a href="javascript:pagination(' . $i . ');">' . $i . '</a></li>';
    }
}

if ($paginaActual < $nroPaginas) {
    $lista = $lista . '<li><a href="javascript:pagination(' . ($paginaActual + 1) . ');">Siguiente</a></li>';

}

if ($paginaActual <= 1) {
    $limit = 0;
} else {
    $limit = $nroLotes * ($paginaActual - 1);
}

$respuesta2 = mostrarpreguntasprevia($id_temas, $limit, $nroLotes);

while (($row2 = $respuesta2->fetch_assoc())) {

    $id = $row2['id_pregunta'];

    $respuesta = mostraropciones($id);

    $tabla = $tabla . '


<div class="modal fade" id="modalayuda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ayuda </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">';

    if ($row2['ayudaestudiante'] != "") {

        $tabla = $tabla . '
  <p class="info"> ' . $row2['ayudaestudiante'] . ' </p>
  ';

    } else if ($row2['ayudaestudiante'] != null) {

        $tabla = $tabla . '
   <div align="center">
  <img src="../controladores/funcionesProfesorphp/Preguntasprofesorphp/imagenesf/' . $row2['imagenpregunta'] . '" width="300" height="300">
</div>
';

    }

    $tabla = $tabla . '

      <div class="modal-footer" >

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</div>




    <div class="container col-md-12">



  <div class="col-md-12">

   <div class="col-md-6">

 </div>



    ';

    if ($row2['ayudaestudiante'] != "") {

        $tabla = $tabla . '


    <button style=" margin-left: 85%" class="btn btn-success" id="ayuda">Visualizar Ayuda</button>











     <div class="col-md-6">


  <div id="body">

    <div class="subapartado">

      <div class="titulo">
        <p class="titulo">Ayuda</p>
      </div>

      <div class="info">
        <p class="info"> ' . $row2['ayudaestudiante'] . ' </p>
      </div>

    </div>

  </div>


 </div>




 ';
    }

    if ($row2['contextoimagen'] != null) {

        $tabla = $tabla . '


       <div class="container col-md-12 ">

       <h2>' . $row2['descripcion'] . '</h2>' . '

       <img src="../controladores/funcionesProfesorphp/contextoprofesorphp/imagenesf/' . $row2['contextoimagen'] . '" width="auto" height="auto">

      <h4>' . $row2['titulo'] . '</h4>' . '

    </div>
    ';

    } else {

        $tabla = $tabla . '


       <div class="container col-md-12 ">

       <h2>' . $row2['descripcion'] . '</h2>' . '



      <h4>' . $row2['titulo'] . '</h4>' . '

    </div>
    ';

    }

    $tabla = $tabla . '

<form name=opcionesres   method="post"  onsubmit=" return guardardatos();" >



  <input type="hidden" value="' . $paginaActual . '" id="actual" name="actual">

   <input type="hidden" value="' . $row2['id_tipo_pregunta'] . '" id="tipop" name="tipop">


      ';

    if ($row2['id_tipo_pregunta'] == 1) {

        while ($row = mysqli_fetch_array($respuesta)) {

            $id_opcion[] = $row['id_opcion'];

            $valor[] = $row['valor'];

        }

        $tabla = $tabla . '



                           <div class="col-md-12">


                               <div class="radio">
                               <label for="radios-0">
                                 <label><input class="form-check-input" type="radio" id="radios1"  name="radios1" value="' . $id_opcion[0] . '" required> ' . $valor[0] . '</label>

                                  </div>



                               <div class="radio">
                               <label for="radios-1">
                                 <label><input class="form-check-input" type="radio" id="radios2"  name="radios1" value="' . $id_opcion[1] . '" required> ' . $valor[1] . '</label>

                                   </div>





                               <div class="radio">
                               <label for="radios-2">
                                 <label><input class="form-check-input" type="radio" id="radios3"  name="radios1" value="' . $id_opcion[2] . '" required> ' . $valor[2] . '</label>
                                   </div>




                               <div class="radio">
                               <label for="radios-2">
                                 <label><input class="form-check-input" type="radio" id="radios4"  name="radios1" value="' . $id_opcion[3] . '" required> ' . $valor[3] . '</label>
                                   </div>





       </div>






        ';

    } else if ($row2['id_tipo_pregunta'] == 2) {

        $confv = mostraropcionesfv($id);

        while ($row = mysqli_fetch_array($confv)) {

            $id_opcion[] = $row['id_opcion'];

        }

        $tabla = $tabla . '


                           <div class="col-md-12">


                               <div class="radio">
                               <label for="radios-0">
                               <input type="radio" name="radios2"  id="radiofv1" value="' . $id_opcion[0] . '"  required />
                                   Verdadero
                               </label>

                              </div>


                               <div class="radio">
                               <label for="radios-1">
                               <input type="radio" name="radios2"  id="radiofv2" value="' . $id_opcion[0] . '"   required />
                                   Falso
                               </label>

                              </div>';

    } else if ($row2['id_tipo_pregunta'] == 3) {

        $respuestas = mostraropcionesimagen($id);

        while ($mostarnumeros = mysqli_fetch_array($respuestas)) {

            $id_opcion[] = $mostarnumeros['id_imagen'];

            $tblimagenes[] = $mostarnumeros['imagen'];

        }

        $tabla = $tabla . '
                  <div class="col-md-12">



                           <div class="col-md-6">
                               <div class="radio">
                               <label for="radios-0">
                               <input type="radio" name="radios3"  id="radioi1" value="' . $id_opcion[0] . '"   required />



                           <img src="../controladores/funcionesProfesorphp/opcionesimagenprofesorphp/imagenesopcion/' . $tblimagenes[0] . '" width="auto" height="auto">

                               </label>

                              </div>

                               </div>



                                <div class="col-md-6">
                               <div class="radio">
                               <label for="radios-1">
                               <input type="radio" name="radios3"  id="radioi2" value="' . $id_opcion[1] . '"   required / >



                           <img src="../controladores/funcionesProfesorphp/opcionesimagenprofesorphp/imagenesopcion/' . $tblimagenes[1] . '" width="auto" height="auto">

                               </label>

                              </div>

                               </div>


                               </div>


<div class="col-md-12">


                                <div class="col-md-6">
                               <div class="radio">
                               <label for="radios-2">
                               <input type="radio" name="radios3"  id="radioi3" value="' . $id_opcion[2] . '"  required />





                           <img src="../controladores/funcionesProfesorphp/opcionesimagenprofesorphp/imagenesopcion/' . $tblimagenes[2] . '" width="auto" height="auto">

                               </label>

                              </div>

                               </div>



                                <div class="col-md-6">
                               <div class="radio">
                               <label for="radios-3">
                               <input type="radio" name="radios3"  id="radioi4" value="' . $id_opcion[3] . '" required  />



                           <img src="../controladores/funcionesProfesorphp/opcionesimagenprofesorphp/imagenesopcion/' . $tblimagenes[3] . '" width="auto" height="auto">

                               </label>

                              </div>

                               </div>


                               </div>


                              ';

    }
}

// fin  while

if ($paginaActual == $nroPaginas) {

    if ($tipo_usuario == 2) {

        $tabla = $tabla . '

       <div class="col-md-12">

       <div align="center">


         <input type="submit"  value="Evaluar"  class="btn btn-info ">  <i class="icon-hand-right"></i>


           <a class="btn btn-outline-success my-2 my-sm-0" href="respuestaestudiante.php">Finalizar Evaluacion</a>



</div>

</div>


</br> </br> </br>


';

    } else if ($tipo_usuario == 3) {

        $tabla = $tabla . '


</br> </br> </br>

       <div class="col-md-12">


       <div class="container" align="center">


       <h4> Final del Tema  </h4>

       </div>

         </div>

       </br> </br> </br>

';

    }

}

$tabla = $tabla . ' </form>';

$tabla = $tabla . '


         <script type="text/javascript">





  $(document).ready(function(){

    $("#radios1").click(function(){

          var valorid =  document.opcionesres.radios1.value;
           crearmatris1( valorid);




    });

    $("#radios2").click(function(){

           var valorid =  document.opcionesres.radios1.value;
           crearmatris1( valorid);



    });



    $("#radios3").click(function(){

             var valorid =  document.opcionesres.radios1.value;
           crearmatris1( valorid);


    });

    $("#radios4").click(function(){

           var valorid =  document.opcionesres.radios1.value;
           crearmatris1( valorid);


    });





    $("#radiofv1").click(function(){

          var valorid =  document.opcionesres.radios2.value;



           var valor ="Verdadero" ;

           crearmatris2( valorid, valor);

    });


    $("#radiofv2").click(function(){

          var valorid =  document.opcionesres.radios2.value;



           var valor ="Falso" ;

           crearmatris2( valorid, valor);


    });



    $("#radioi1").click(function(){

          var valorid =  document.opcionesres.radios3.value;





           crearmatris1( valorid);


    });


    $("#radioi2").click(function(){

          var valorid =  document.opcionesres.radios3.value;





           crearmatris1( valorid);


    });



    $("#radioi3").click(function(){

         var valorid =  document.opcionesres.radios3.value;



           crearmatris1( valorid);


    });


    $("#radioi4").click(function(){

         var valorid =  document.opcionesres.radios3.value;



           crearmatris1( valorid);


    });

    });







</script>




        ';

$array = array(0 => $tabla,
    1                => $lista);

echo json_encode($array);
