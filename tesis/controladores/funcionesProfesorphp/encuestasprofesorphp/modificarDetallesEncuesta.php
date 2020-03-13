<?php

include "../../../modelo/funcs/conexion.php";

if (isset($_POST)) {
    // Obtener valores
    $id_encuesta = $_POST['id_encuesta'];
    $titulo      = $_POST['titulo'];

    // Modificar producto
    $query = "
        UPDATE tbl_temas SET
        tema  = '$titulo'

        WHERE id_temas   = '$id_encuesta'
    ";
    if (!$result = mysqli_query($mysqli, $query)) {
        exit(mysqli_error($mysqli));
    }
}
