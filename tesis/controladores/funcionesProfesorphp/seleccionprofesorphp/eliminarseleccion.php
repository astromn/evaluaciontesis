<?php
// Validar consulta
if (isset($_POST['id_pregunta']) && isset($_POST['id_pregunta']) != "") {
    // Incluir archivo de conexión a base de datos

    include "../../../modelo/funcs/crudseleccion.php";

    // Obtener id_encuesta
    $id_seleccion = $_POST['id_pregunta'];

    echo $id_seleccion;

    eliminarseleccion($id_seleccion);

}
