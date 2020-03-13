<?php

include "../../../modelo/funcs/conexion.php";

if (isset($_POST)) {
    // Obtener valores

    $id_contexto = $_POST['id_contexto'];

    $descripcion = $_POST['descripcion'];

    // Modificar producto
    $query = "
        UPDATE tbl_contexto SET
       descripcion='$descripcion'
        WHERE id_contexto   = '$id_contexto'
    ";

    if (!$result = mysqli_query($mysqli, $query)) {
        exit(mysqli_error($mysqli));
    }
}
