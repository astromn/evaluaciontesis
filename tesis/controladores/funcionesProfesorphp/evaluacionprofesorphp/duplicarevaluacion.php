<?php

include "../../../modelo/funcs/crudevaluacion.php";
include "../../../modelo/funcs/crudseleccion.php";

$id_usuario = $_POST['id_usuario'];
$titulo     = $_POST['titulo'];
$grado      = $_POST['grado'];

$id_evaluacion = $_POST['id_evaluacion'];

$id_temas = array();
$id_eva   = "";

insertarevaluacion($id_usuario, $titulo, $grado);

$respuesta = consultaultimoidevaluacion($id_usuario);

while ($mostarres = mysqli_fetch_array($respuesta)) {
    $id_eva = $mostarres[0];
}

$respuestas = consultatemas($id_evaluacion);

while ($row = mysqli_fetch_array($respuestas)) {

    $id_temas[] = $row['id_temas'];

}

$tam = count($id_temas);

for ($i = 0; $i < $tam; $i++) {
    insertarseleccion($id_eva, $id_temas[$i]);
}
