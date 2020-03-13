<?php

include 'conexion.php';

function insertarcontexto($id_temas, $descripcion, $nom)
{

    global $mysqli;

    $query = "INSERT INTO tbl_contexto ( id_tema, descripcion, contextoimagen)
              VALUES ('$id_temas','$descripcion','$nom')";

    $resultado = $mysqli->query($query);

    return $resultado;

}

function eliminarcontexto($id_contexto)
{

    global $mysqli;

    $query     = "DELETE FROM tbl_contexto WHERE id_contexto = '$id_contexto'";
    $resultado = $mysqli->query($query);
    return $resultado;

}

function mostarrcontexto($id_encuesta)
{

    global $mysqli;

    $query = "SELECT * from tbl_contexto  where id_tema ='$id_encuesta' ";

    $resultado = $mysqli->query($query);
    return $resultado;

}
