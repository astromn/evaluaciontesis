<?php

include 'conexion.php';

function insertarencuesta($id_usuario, $titulo)
{

    global $mysqli;

    $query = "INSERT INTO tbl_temas (id_usuario, tema)
              VALUES ('$id_usuario', '$titulo')";

    $resultado = $mysqli->query($query);

    return $resultado;

}

function eliminarencuesta($id_tema)
{

    global $mysqli;

    $query     = " DELETE FROM tbl_temas WHERE id_temas = '$id_tema'";
    $resultado = $mysqli->query($query);

    return $resultado;

}

function finalizarencuesta($id_encuesta)
{

    global $mysqli;

    $query     = "UPDATE tbl_encuestas SET estado = '0' WHERE id_encuesta = '$id_encuesta'";
    $resultado = $mysqli->query($query);

    return $resultado;

}

function publicarencuesta($id_encuesta)
{

    global $mysqli;

    $query     = "UPDATE tbl_encuestas SET estado = '1' WHERE id_encuesta = '$id_encuesta'";
    $resultado = $mysqli->query($query);

    return $resultado;

}

function mostrarencuestas()
{

    global $mysqli;

    $query     = "SELECT * FROM tbl_temas ORDER BY id_temas DESC";
    $resultado = $mysqli->query($query);

    return $resultado;

}
