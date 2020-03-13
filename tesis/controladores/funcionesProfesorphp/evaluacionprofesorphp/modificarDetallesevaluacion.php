<?php

include "../../../modelo/funcs/conexion.php";

if (isset($_POST)) {
    // Obtener valores
    $id_evaluacion = $_POST['id_pregunta'];
    $titulo        = $_POST['titulo'];

    // Modificar producto
    $query = "
        UPDATE tbl_evaluaciones SET
        tituloevaluacion  = '$titulo'

        WHERE id_evaluacion  = '$id_evaluacion'
    ";
    if (!$result = mysqli_query($mysqli, $query)) {
        exit(mysqli_error($mysqli));
    }
}
