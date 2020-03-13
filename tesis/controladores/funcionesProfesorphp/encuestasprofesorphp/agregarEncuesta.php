<?php

if (isset($_POST['id_usuario']) && isset($_POST['titulo'])) {
    // Incluir archivo de conexión a base de datos
    include "../../../modelo/funcs/crudencuesta.php";

    // Obtener valores
    $id_usuario = $_POST['id_usuario'];
    $titulo     = $_POST['titulo'];

    echo $id_usuario;
    echo $titulo;

    insertarencuesta($id_usuario, $titulo);

}
