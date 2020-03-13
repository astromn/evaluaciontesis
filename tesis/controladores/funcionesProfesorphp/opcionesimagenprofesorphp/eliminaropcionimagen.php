<?php
// Validar consulta
if (isset($_POST['id_opcion']) && isset($_POST['id_opcion']) != "") {
    // Incluir archivo de conexión a base de datos
    include "../../../modelo/funcs/crudopciones.php";

    // Obtener id_pregunta
    $id_opcion = $_POST['id_opcion'];

    // Eliminar encuesta
    eliminaropcionimagen($id_opcion);
}
