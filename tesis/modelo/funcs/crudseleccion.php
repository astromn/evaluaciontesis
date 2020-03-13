<?php

include 'conexion.php';

function mostarseleccion($id_evaluacion)
{

    global $mysqli;

    $query     = "SELECT s.id_seleccion,  t.tema FROM  tbl_seleccion s  inner join  tbl_temas t on (s.id_temas= t.id_temas)   WHERE id_evaluacion = '$id_evaluacion'";
    $resultado = $mysqli->query($query);

    return $resultado;

}

function insertarseleccion($id_evaluacion, $id_tema)
{

    global $mysqli;

    $query = "INSERT INTO tbl_seleccion (id_evaluacion , id_temas )
              VALUES ('$id_evaluacion', '$id_tema')";

    $resultado = $mysqli->query($query);

    return $resultado;

}

function contartemas($id_evaluacion)
{

    global $mysqli;

    $sql       = "SELECT COUNT(s.id_seleccion) seleccion from  tbl_evaluaciones e inner join tbl_seleccion s on (e.id_evaluacion=s.id_evaluacion) WHERE e.id_evaluacion='$id_evaluacion'";
    $resultado = $mysqli->query($sql);

    return $resultado;

}

function eliminarseleccion($id_seleccion)
{

    global $mysqli;
    $query     = "DELETE FROM tbl_seleccion WHERE tbl_seleccion.id_seleccion = '$id_seleccion'";
    $resultado = $mysqli->query($query);

    return $resultado;

}
