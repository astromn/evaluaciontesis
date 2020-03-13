<?php

session_start();

include "../../../modelo/funcs/conexion.php";

$tipopre = $_SESSION['tipopre'];

if (isset($_POST['id_opcion']) && isset($_POST['id_opcion']) != "") {
    // Obtener id_opcion
    $id_opcion = $_POST['id_opcion'];

    if ($tipopre == 1) {
        // Obtener detalles de la pregunt
        $query = "SELECT * FROM tbl_opciones WHERE id_opcion = '$id_opcion'";
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

        // Obtener detalles de la pregunt
        $query = "SELECT * FROM tbl_opcionesfv WHERE id_opcion = '$id_opcion'";
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

    }

} else {
    $response['status']  = 200;
    $response['message'] = "Consulta Invalida!";
}
