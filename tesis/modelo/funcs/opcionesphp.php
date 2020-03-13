<?php

function tipopregunta($id_pregunta)
{
    global $mysqli;

    $sql    = "  SELECT tbl_preguntas.id_tipo_pregunta FROM `tbl_preguntas` WHERE id_pregunta = '$id_pregunta' ";
    $result = mysqli_query($mysqli, $sql);

    return $result;

}

function id_tipo_pregunta($id_pregunta)
{
    global $mysqli;

    $sql    = "SELECT id_tipo_pregunta FROM tbl_preguntas WHERE id_pregunta = '$id_pregunta'";
    $result = mysqli_query($mysqli, $sql);

    return $result;

}

function cargar_tbl_opcionesfv($id_pregunta)
{
    global $mysqli;

    $sql    = "SELECT * FROM tbl_opcionesfv WHERE id_pregunta = '$id_pregunta'";
    $result = mysqli_query($mysqli, $sql);

    return $result;

}
