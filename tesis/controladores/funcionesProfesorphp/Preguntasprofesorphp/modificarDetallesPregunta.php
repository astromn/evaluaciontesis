<?php

include "../../../modelo/funcs/conexion.php";

if (isset($_POST)) {
    // Obtener valores
    $id_pregunta = $_POST['id_pregunta'];
    $titulo      = $_POST['titulo'];
    $ayuda       = $_POST['ayuda'];

    // Modificar producto
    $query = "
        UPDATE tbl_preguntas SET
        titulo  = '$titulo' , ayudaestudiante='$ayuda'
        WHERE id_pregunta   = '$id_pregunta'
    ";

    if (!$result = mysqli_query($mysqli, $query)) {
        exit(mysqli_error($mysqli));
    }
}
