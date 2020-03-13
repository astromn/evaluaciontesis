<?php

include "../../../modelo/funcs/conexion.php";

if (isset($_POST)) {
    // Obtener valores
    $id_opcion = $_POST['id_opcion'];
    $valor     = $_POST['valor'];

    // Modificar producto
    $query = "
        UPDATE tbl_opciones SET
        valor  = '$valor'
        WHERE id_opcion   = '$id_opcion'
    ";
    if (!$result = mysqli_query($mysqli, $query)) {
        exit(mysqli_error($mysqli));
    }
}
