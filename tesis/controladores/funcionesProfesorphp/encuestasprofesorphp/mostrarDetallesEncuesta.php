<?php

include "../../../modelo/funcs/conexion.php";

if (isset($_POST['id_encuesta']) && isset($_POST['id_encuesta']) != "") {
    // Obtener id_encuesta
    $id_encuesta = $_POST['id_encuesta'];

    // Obtener detalles de la encuesta
    $query = "SELECT * FROM tbl_temas WHERE id_temas = '$id_encuesta'";
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
