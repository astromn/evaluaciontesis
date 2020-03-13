<?php

include 'conexion.php';

function mostrarencuestas($id_usuario)
{

    global $mysqli;

    $query     = "SELECT * FROM tbl_evaluaciones  where tbl_evaluaciones.id_usuario = '$id_usuario' ORDER BY id_evaluacion DESC";
    $resultado = $mysqli->query($query);

    return $resultado;

}

function consultatemas($id_evaluacion)
{

    global $mysqli;

    $query     = "SELECT s.id_temas FROM tbl_seleccion s where s.id_evaluacion ='$id_evaluacion' ";
    $resultado = $mysqli->query($query);

    return $resultado;

}

function consultaultimoidevaluacion($id_usuario)
{

    global $mysqli;

    $query     = "  SELECT e.id_evaluacion FROM tbl_evaluaciones e where e.id_usuario = '$id_usuario' ORDER by e.id_evaluacion DESC LIMIT 1";
    $resultado = $mysqli->query($query);

    return $resultado;

}

function insertarevaluacion($id_usuario, $titulo, $grado)
{

    global $mysqli;

    $query = "INSERT INTO tbl_evaluaciones (id_usuario, tituloevaluacion,grado)
              VALUES ('$id_usuario', '$titulo' ,'$grado')";

    $resultado = $mysqli->query($query);

    return $resultado;

}

function eliminarevaluacion($id_evaluacion)
{

    global $mysqli;

    $query     = " DELETE FROM tbl_evaluaciones WHERE id_evaluacion = '$id_evaluacion'";
    $resultado = $mysqli->query($query);

    return $resultado;

}

function finalizarevaluacion($id_evaluacion)
{

    global $mysqli;

    $query     = "UPDATE tbl_evaluaciones SET estado = '0' WHERE id_evaluacion = '$id_evaluacion'";
    $resultado = $mysqli->query($query);

    return $resultado;

}

function publicarevaluacion($id_evaluacion)
{

    global $mysqli;

    $query     = "UPDATE tbl_evaluaciones SET estado = '1' WHERE id_evaluacion = '$id_evaluacion'";
    $resultado = $mysqli->query($query);

    return $resultado;

}

function mostarnombrecal($id_evaluacion)
{

    global $mysqli;

    $query     = "SELECT u.USU_NOMBRE,e.preguntas_buenas from tbl_usuario u  inner join  tbl_resultadoevaluaciones e on (u.USU_ID=e.id_usuario) WHERE e.id_evaluacion ='$id_evaluacion' ";
    $resultado = $mysqli->query($query);

    return $resultado;

}
