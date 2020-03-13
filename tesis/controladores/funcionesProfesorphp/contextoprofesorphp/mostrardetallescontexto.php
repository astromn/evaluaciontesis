<?php

include "../../../modelo/funcs/conexion.php";

if (isset($_POST['id_contexto']) && isset($_POST['id_contexto']) != "") {
    // Obtener id_pregunta
    $id_contexto = $_POST['id_contexto'];

    // Obtener detalles de la pregunta
    $query = "SELECT * FROM tbl_contexto WHERE id_contexto = '$id_contexto'";
    if (!$result = mysqli_query($mysqli, $query)) {
        exit(mysqli_error($mysqli));
    }
    $response = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }
    } else {
        $response['status']  = 200;
        $response['message'] = "Información no encontrada!";
    }
    // display JSON data
    echo json_encode($response);
} else {
    $response['status']  = 200;
    $response['message'] = "Consulta Invalida!";
}
