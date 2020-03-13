<?php

include 'conexion.php';

function contarpreguntas($id_temas)
{

    global $mysqli;
    $query     = "SELECT COUNT(p.id_pregunta) pregunta FROM tbl_temas t INNER JOIN tbl_contexto c on (t.id_temas=c.id_tema) inner join tbl_preguntas p on (p.id_contexto=c.id_contexto) WHERE t.id_temas='$id_temas'";
    $resultado = $mysqli->query($query);

    return $resultado;

}

function mostrarpreguntasprevia($id_temas, $limit, $nroLotes)
{

    global $mysqli;

    $query = "SELECT p.id_pregunta,p.titulo,p.id_tipo_pregunta ,p.ayudaestudiante,c.descripcion,c.contextoimagen  FROM tbl_temas t
 INNER JOIN tbl_contexto c on (t.id_temas=c.id_tema) inner join tbl_preguntas p on (p.id_contexto=c.id_contexto)
 WHERE t.id_temas='$id_temas' LIMIT $limit ,$nroLotes ";

    $resultado = $mysqli->query($query);

    return $resultado;

}
