<?php
session_start();
if (isset($_POST['id_tema'])) {
    // Incluir archivo de conexión a base de datos
    include "../../../modelo/funcs/crudseleccion.php";

    // Obtener valores

    $id_evaluacion = $_SESSION['id_evaluacion'];
    $id_tema       = $_POST['id_tema'];

    echo $id_evaluacion;
    echo $id_tema;

    insertarseleccion($id_evaluacion, $id_tema);

}
