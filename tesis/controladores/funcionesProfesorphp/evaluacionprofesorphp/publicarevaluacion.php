<?php
// Validar consulta
if (isset($_POST['id_evaluacion']) && isset($_POST['id_evaluacion']) != "") {
    // Incluir archivo de conexión a base de datos
    include "../../../modelo/funcs/crudevaluacion.php";

    // Obtener id_encuesta
    $id_evaluacion = $_POST['id_evaluacion'];

    echo $id_evaluacion;

    // Eliminar encuesta

    publicarevaluacion($id_evaluacion);

}
