<?php
// Validar consulta
if (isset($_POST['id_opcion']) && isset($_POST['id_opcion']) != "" && isset($_POST['idtipo'])) {
    // Incluir archivo de conexión a base de datos
    include "../../../modelo/funcs/crudopciones.php";

    // Obtener id_opcion
    $id_opcion = $_POST['id_opcion'];
    $idtipo    = $_POST['idtipo'];

    echo $idtipo;

    if ($idtipo == 1) {

        eliminaropciones($id_opcion);

    } else if ($idtipo == 2) {

        eliminaropcionesfv($id_opcion);

    }
}
