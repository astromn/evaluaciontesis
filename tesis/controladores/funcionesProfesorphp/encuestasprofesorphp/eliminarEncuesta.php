<?php
// Validar consulta
if (isset($_POST['id_encuesta']) && isset($_POST['id_encuesta']) != "") {
    // Incluir archivo de conexión a base de datos

    include "../../../modelo/funcs/crudencuesta.php";

    // Obtener id_encuesta
    $id_encuesta = $_POST['id_encuesta'];
    echo $id_encuesta;

    eliminarencuesta($id_encuesta);

}
