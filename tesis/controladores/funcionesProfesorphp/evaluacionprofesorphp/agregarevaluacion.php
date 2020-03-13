<?php

if (isset($_POST['id_usuario']) && isset($_POST['titulo'])) {
    // Incluir archivo de conexión a base de datos
    include "../../../modelo/funcs/crudevaluacion.php";

    // Obtener valores
    $id_usuario = $_POST['id_usuario'];
    $titulo     = $_POST['titulo'];
    $grado      = $_POST['grado'];

    echo $id_usuario;
    echo $titulo;

    insertarevaluacion($id_usuario, $titulo, $grado);

}
