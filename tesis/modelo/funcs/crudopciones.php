<?php

include 'conexion.php';

function mostaropciones($id_pregunta)
{

    global $mysqli;

    $query     = "SELECT * FROM  tbl_opciones WHERE id_pregunta = '$id_pregunta'";
    $resultado = $mysqli->query($query);

    return $resultado;

}

function mostaropcionesfv($id_pregunta)
{

    global $mysqli;

    $sql       = "SELECT * FROM tbl_opcionesfv WHERE id_pregunta = '$id_pregunta'";
    $resultado = $mysqli->query($sql);

    return $resultado;

}

function insertaropciones($id_pregunta, $valor, $valorres)
{

    global $mysqli;

    $query = "INSERT INTO tbl_opciones (id_pregunta, valor,respuesta)
              VALUES ('$id_pregunta', '$valor','$valorres')";

    $resultado = $mysqli->query($query);

    return $resultado;

}

function insertaropcionesfv($id_pregunta, $txtfv)
{
    global $mysqli;

    $query = "INSERT INTO tbl_opcionesfv (id_pregunta, valor)
              VALUES ('$id_pregunta', '$txtfv')";

    $resultado = $mysqli->query($query);

    return $resultado;

}

function eliminaropciones($id_opcion)
{

    global $mysqli;
    $query     = "DELETE FROM tbl_opciones WHERE id_opcion = '$id_opcion'";
    $resultado = $mysqli->query($query);

    return $resultado;

}

function eliminaropcionesfv($id_opcion)
{

    global $mysqli;
    $query     = "DELETE FROM tbl_opcionesfv WHERE id_opcion = '$id_opcion'";
    $resultado = $mysqli->query($query);

    return $resultado;

}

function agregaropcionimagen($id_pregunta, $nom, $respuesta)
{

    global $mysqli;

    $query = "INSERT INTO tbl_opcionesimagen ( id_pregunta, imagen,respuesta)
              VALUES ('$id_pregunta','$nom','$respuesta')";

    $resultado = $mysqli->query($query);

    return $resultado;

}

function eliminaropcionimagen($id_orden)
{

    global $mysqli;

    $query     = "DELETE FROM tbl_opcionesimagen WHERE id_imagen = '$id_orden'";
    $resultado = $mysqli->query($query);

    return $resultado;

}

function mostaropcionimagen($id_pregunta)
{

    global $mysqli;

    $query = "SELECT * FROM  tbl_opcionesimagen WHERE id_pregunta = '$id_pregunta'";

    $resultado = $mysqli->query($query);

    return $resultado;

}

function contaropciones($id_pregunta)
{

    global $mysqli;

    $sql       = "SELECT COUNT(o.id_opcion) from  tbl_preguntas p inner JOIN tbl_opciones o on (p.id_pregunta=o.id_pregunta )  WHERE p.id_pregunta ='$id_pregunta'";
    $resultado = $mysqli->query($sql);

    return $resultado;

}

function contaropcionesfv($id_pregunta)
{

    global $mysqli;

    $sql       = "SELECT COUNT(o.id_opcion) from  tbl_preguntas p inner JOIN tbl_opcionesfv o on (p.id_pregunta=o.id_pregunta )  WHERE p.id_pregunta ='$id_pregunta'";
    $resultado = $mysqli->query($sql);

    return $resultado;

}

function contaropcionesimagen($id_pregunta)
{

    global $mysqli;

    $sql       = "SELECT COUNT(o.id_imagen) from  tbl_preguntas p inner JOIN tbl_opcionesimagen o on (p.id_pregunta=o.id_pregunta )  WHERE p.id_pregunta ='$id_pregunta'";
    $resultado = $mysqli->query($sql);

    return $resultado;

}
