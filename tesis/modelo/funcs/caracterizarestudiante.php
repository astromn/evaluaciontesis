<?php

include 'conexion.php';

function tematipouno($id_opcion)
{

    global $mysqli;

    $query = "SELECT t.id_temas FROM tbl_temas t inner join tbl_contexto c on (t.id_temas=c.id_tema) inner join tbl_preguntas p on (p.id_contexto=c.id_contexto) inner join  tbl_opciones o on (p.id_pregunta=o.id_pregunta) where o.id_opcion= '$id_opcion' ";

    $resultado = $mysqli->query($query);
    return $resultado;

}

function tematipodos($id_opcion)
{

    global $mysqli;

    $query = "SELECT t.id_temas FROM tbl_temas t inner join tbl_contexto c on (t.id_temas=c.id_tema) inner join tbl_preguntas p on (p.id_contexto=c.id_contexto) inner join  tbl_opcionesfv of on (p.id_pregunta=of.id_pregunta) where of.id_opcion=  '$id_opcion' ";

    $resultado = $mysqli->query($query);
    return $resultado;

}

function tematipotres($id_opcion)
{

    global $mysqli;

    $query = "SELECT t.id_temas FROM tbl_temas t inner join tbl_contexto c on (t.id_temas=c.id_tema) inner join tbl_preguntas p on (p.id_contexto=c.id_contexto) inner join  tbl_opcionesimagen om on (p.id_pregunta=om.id_imagen) where om.id_imagen= '$id_opcion'";

    $resultado = $mysqli->query($query);
    return $resultado;

}

function insertarcaracterizacion($id_evaluacion, $id_usuario, $preguntas_malas, $preguntas_buenas, $id_preguntasmalas
    , $id_preguntasbuenas, $idtemasfallo, $nota_caracterizar, $vectorcarecterizar) {

    global $mysqli;

    $query = "INSERT INTO tbl_caracterizar (id_evaluacion, id_usuario, preguntas_malas, preguntas_buenas, id_preguntasmalas,id_preguntasbuenas,id_temasfallo,nota_caracterizar,vectorcarecterizar)

     VALUES ('$id_evaluacion', '$id_usuario','$preguntas_malas','$preguntas_buenas','$id_preguntasmalas','$id_preguntasbuenas','$idtemasfallo','$nota_caracterizar','$vectorcarecterizar')";

    $resultado = $mysqli->query($query);

    return $resultado;

}

function idopcion($id_opcion)
{

    global $mysqli;

    $query = " SELECT tbl_opciones.respuesta from tbl_opciones WHERE tbl_opciones.id_opcion= '$id_opcion'";

    $resultado = $mysqli->query($query);
    return $resultado;

}

function mostraridpreguntamala($id_opcion)
{

    global $mysqli;

    $query = "SELECT  p.id_pregunta from  tbl_preguntas p inner  join
       tbl_opciones o on (p.id_pregunta= o.id_pregunta) WHERE o.id_opcion = '$id_opcion'";

    $resultado = $mysqli->query($query);
    return $resultado;

}

function idopcionfv($id_opcion)
{

    global $mysqli;

    $query = "  SELECT tbl_opcionesfv.valor from tbl_opcionesfv WHERE tbl_opcionesfv.id_opcion= '$id_opcion'";

    $resultado = $mysqli->query($query);
    return $resultado;

}

function mostraridpreguntamalafv($id_opcion)
{

    global $mysqli;

    $query = " SELECT  p.id_pregunta from  tbl_preguntas p inner  join tbl_opcionesfv fv on(p.id_pregunta=fv.id_pregunta) WHERE fv.id_opcion= '$id_opcion'";

    $resultado = $mysqli->query($query);
    return $resultado;

}

function idopcionimagen($id_opcion)
{

    global $mysqli;

    $query = "  SELECT tbl_opcionesimagen.respuesta FROM  tbl_opcionesimagen WHERE tbl_opcionesimagen.id_imagen= '$id_opcion'";

    $resultado = $mysqli->query($query);
    return $resultado;

}

function mostraridpreguntamalaimagen($id_opcion)
{

    global $mysqli;

    $query = " SELECT  p.id_pregunta from  tbl_preguntas p inner  join tbl_opcionesimagen oi on (p.id_pregunta=oi.id_pregunta) WHERE oi.id_imagen=  '$id_opcion'";

    $resultado = $mysqli->query($query);
    return $resultado;

}
