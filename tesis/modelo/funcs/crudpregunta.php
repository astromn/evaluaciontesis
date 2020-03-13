<?php

include 'conexion.php';

function contarcontextos($id_encuesta)
{

    global $mysqli;

    $contt     = "SELECT COUNT(tbl_contexto.id_contexto) from tbl_contexto WHERE tbl_contexto.id_encuesta='$id_encuesta'";
    $resultado = $mysqli->query($contt);

    return $resultado;

}

function contarpreguntas($id_contexto)
{

    global $mysqli;

    $cont      = "SELECT COUNT(id_pregunta) from  tbl_preguntas WHERE id_contexto='$id_contexto'";
    $resultado = $mysqli->query($cont);

    return $resultado;

}

function insertarpregunta($id_contexto, $titulo, $ayuda, $id_dificultad, $id_tipo_pregunta, $imagenpregunta)
{

    global $mysqli;

    $query = "INSERT INTO tbl_preguntas (id_contexto, titulo, ayudaestudiante,imagenpregunta,id_tipo_pregunta ,id_dificultad)
              VALUES ('$id_contexto', '$titulo', '$ayuda','$imagenpregunta','$id_tipo_pregunta','$id_dificultad')";
    $resultado = $mysqli->query($query);

    return $resultado;

}

function idpreguntainsert($id_contexto)
{

    global $mysqli;

    $idpre = "  SELECT id_pregunta FROM tbl_preguntas p  INNER JOIN tbl_contexto e on (p.id_contexto=e.id_contexto)  WHERE e.id_contexto=' $id_contexto ' ORDER by id_pregunta  DESC LIMIT 1";

    $resultado = $mysqli->query($idpre);

    return $resultado;

}

function insertarorden($ordenp, $id_pregunta)
{

    global $mysqli;
    $ordenin = "INSERT INTO tbl_orden(numero_orden, id_pregunta) VALUES ('$ordenp','$id_pregunta')";

    $resultado = $mysqli->query($ordenin);

    return $resultado;

}

function preguntaanterior($id_contexto)
{

    global $mysqli;

    $idpree = " SELECT id_pregunta FROM tbl_preguntas p INNER JOIN tbl_contexto e on (p.id_contexto=e.id_contexto) WHERE e.id_contexto=' $id_contexto ' ORDER by id_pregunta DESC LIMIT 1, 1";

    $resultado = $mysqli->query($idpree);

    return $resultado;

}

function numeroorden($id_pregunta)
{

    global $mysqli;

    $numero_ordenn = "SELECT tbl_orden.numero_orden from tbl_orden WHERE id_pregunta='$id_pregunta' ";
    $resultado     = $mysqli->query($numero_ordenn);

    return $resultado;

}

function idultimocontexto($id_encuesta)
{

    global $mysqli;

    $idconan = "SELECT tbl_contexto.id_contexto from tbl_encuestas INNER join tbl_contexto on (tbl_contexto.id_encuesta=tbl_encuestas.id_encuesta) WHERE tbl_contexto.id_encuesta='$id_encuesta' ORDER by tbl_contexto.id_contexto DESC LIMIT 1, 1";

    $resultado = $mysqli->query($idconan);

    return $resultado;

}

function ordenidpregunta($contextoan)
{

    global $mysqli;

    $idpreg = "SELECT tbl_preguntas.id_pregunta ,  tbl_orden.numero_orden  FROM tbl_preguntas INNER JOIN tbl_orden on (tbl_preguntas.id_pregunta = tbl_orden.id_pregunta) WHERE tbl_preguntas.id_contexto='$contextoan' ORDER BY tbl_preguntas.id_pregunta DESC LIMIT 1";

    $resultado = $mysqli->query($idpreg);

    return $resultado;

}
