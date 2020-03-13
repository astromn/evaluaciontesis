<?php

include 'conexion.php';

function mostrarevaluacion()
{

    global $mysqli;
    $query     = "SELECT * FROM tbl_evaluaciones  WHERE estado = '1'";
    $resultado = $mysqli->query($query);

    return $resultado;

}

function insertarresultado($premalas, $prebuenas, $id_usuario, $id_encuesta)
{

    global $mysqli;

    $query = "INSERT INTO tbl_resultados(numero_malas, numero_buenas, id_estudiante, id_encuesta)
              VALUES ('$premalas', '$prebuenas','$id_usuario','$id_encuesta')";

    $resultado = $mysqli->query($query);

    return $resultado;

}

function consultarencuesta($id_encuestas)
{

    global $mysqli;

    $numero_p = " SELECT * FROM tbl_contexto WHERE tbl_contexto.id_encuesta='$id_encuestas'";

    $cont = $mysqli->query($numero_p);

    return $cont;

}

function numeropreguntas($id_encuestas)
{

    global $mysqli;

    $numero_p = " SELECT COUNT(p.id_pregunta) from tbl_preguntas p INNER JOIN tbl_contexto c on (p.id_contexto=c.id_contexto) WHERE c.id_encuesta=' $id_encuestas'";

    $resultado = $mysqli->query($numero_p);

    return $resultado;

}

function mostrapreguntasen($id_evaluacion, $limit, $nroLotes)
{

    global $mysqli;

    $query2 = "  SELECT t.id_temas ,t.tema from tbl_evaluaciones e INNER join tbl_seleccion s on (e.id_evaluacion =s.id_evaluacion) INNER JOIN tbl_temas t on (s.id_temas = t.id_temas) INNER JOIN tbl_contexto c on (c.id_tema= t.id_temas)WHERE e.id_evaluacion ='$id_evaluacion'";

    $resultado = $mysqli->query($query2);

    while ($row = mysqli_fetch_array($resultado)) {

        $id_temas[] = $row['id_temas'];

    }

    $query3 = " SELECT p.id_pregunta,p.titulo,p.id_tipo_pregunta ,p.ayudaestudiante,c.descripcion,c.contextoimagen FROM tbl_contexto c INNER join tbl_preguntas p on(c.id_contexto=p.id_contexto) INNER join (( SELECT p.id_pregunta pregunta from tbl_contexto c inner join tbl_preguntas p on (p.id_contexto=c.id_contexto) WHERE c.id_tema = 4 ORDER BY rand() limit 5 ) UNION ( SELECT p.id_pregunta pregunta from tbl_contexto c inner join tbl_preguntas p on (p.id_contexto=c.id_contexto) WHERE c.id_tema = 5 ORDER BY rand() limit 5 ) union ( SELECT p.id_pregunta pregunta from tbl_contexto c inner join tbl_preguntas p on (p.id_contexto=c.id_contexto) WHERE c.id_tema = 6 ORDER BY rand() limit 5 ) ) t1 on (t1.pregunta = p.id_pregunta) LIMIT   $limit, $nroLotes ";

    $resultados = $mysqli->query($query3);

    return $resultados;

/*

$query2 = "  SELECT p.id_pregunta,p.titulo,p.id_tipo_pregunta ,p.ayudaestudiante, c.descripcion,c.contextoimagen from tbl_evaluaciones e INNER join tbl_seleccion s on (e.id_evaluacion =s.id_evaluacion) INNER JOIN tbl_temas t on (s.id_temas = t.id_temas) INNER JOIN tbl_contexto c on (c.id_tema= t.id_temas) INNER join tbl_preguntas p on (p.id_contexto=c.id_contexto ) WHERE e.id_evaluacion ='$id_evaluacion'  ORDER BY rand() LIMIT $limit, $nroLotes";

$resultado = $mysqli->query($query2);

return $resultado;
 */

}

function mostrarpreguntasdatos($id, $limit, $nroLotes)
{

    global $mysqli;

    $query = "SELECT p.id_pregunta,p.titulo,p.id_tipo_pregunta ,p.ayudaestudiante, c.descripcion,c.contextoimagen from tbl_contexto c inner join tbl_preguntas p on (c.id_contexto=p.id_contexto) WHERE p.id_pregunta='$id' LIMIT $limit, $nroLotes ";

    $resultado = $mysqli->query($query);

    return $resultado;

}

function mostraropciones($id)
{

    global $mysqli;

    $query = "SELECT tbl_preguntas.id_pregunta ,tbl_opciones.id_opcion, tbl_opciones.valor from tbl_preguntas INNER JOIN tbl_opciones on (tbl_preguntas.id_pregunta=tbl_opciones.id_pregunta) WHERE tbl_preguntas.id_pregunta='$id'";

    $resultado = $mysqli->query($query);

    return $resultado;

}

function mostraropcionesfv($id)
{

    global $mysqli;

    $fv = "SELECT FV.id_opcion FROM tbl_preguntas p INNER join tbl_opcionesfv fv on (p.id_pregunta= fv.id_pregunta)
           WHERE P.id_pregunta='$id'";

    $resultado = $mysqli->query($fv);

    return $resultado;

}

function mostraropcionesimagen($id)
{

    global $mysqli;

    $valorimagen = "SELECT tbl_orden.id_orden,tbl_opcionesimagen.id_imagen, tbl_opcionesimagen.imagen from tbl_orden INNER JOIN tbl_opcionesimagen on (tbl_orden.id_orden=tbl_opcionesimagen.id_orden) WHERE tbl_orden.id_pregunta='$id'";

    $respuestas = $mysqli->query($valorimagen);

    return $respuestas;

}

function mostraridtemas($id_evaluacion)
{

    global $mysqli;

    $query2 = "SELECT e.id_evaluacion ,t.id_temas FROM tbl_evaluaciones e inner join tbl_seleccion s on (e.id_evaluacion=s.id_evaluacion)INNER join tbl_temas t on (s.id_temas=t.id_temas) where e.id_evaluacion= '$id_evaluacion'";

    $resultado = $mysqli->query($query2);

    return $resultado;

}
