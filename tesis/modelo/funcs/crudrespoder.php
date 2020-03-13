<?php

include 'conexion.php';

function mostrarevaluacion($id_usuario)
{

    global $mysqli;
    $query     = "SELECT * FROM tbl_evaluaciones e  inner join tbl_usuario u on (u.grado=e.grado) WHERE estado = '1' and u.USU_ID='$id_usuario'";
    $resultado = $mysqli->query($query);

    return $resultado;

}

function temasevaluados($id_evaluacion)
{
    global $mysqli;
    $query = "
  SELECT t.id_temas from tbl_evaluaciones e inner join tbl_seleccion s on (e.id_evaluacion=s.id_evaluacion) INNER join tbl_temas t on(t.id_temas=s.id_temas)  WHERE e.id_evaluacion='$id_evaluacion'";
    $resultado = $mysqli->query($query);

    return $resultado;

}

function mostrarpreguntas1($id_evaluacion, $tema, $dificultad)
{

    global $mysqli;
    $query     = "SELECT p.id_pregunta from tbl_evaluaciones e inner join tbl_seleccion s on (e.id_evaluacion=s.id_evaluacion) INNER join tbl_temas t on(t.id_temas=s.id_temas) inner join tbl_contexto c on (c.id_tema=t.id_temas) inner join tbl_preguntas p on (p.id_contexto=c.id_contexto)  WHERE e.id_evaluacion='$id_evaluacion' and p.id_dificultad='$dificultad' and t.id_temas='$tema' ORDER BY RAND() LIMIT 5";
    $resultado = $mysqli->query($query);

    return $resultado;

}

function mostrarnivelpregunta($id_evaluacion, $id_pregunta)
{

    global $mysqli;
    $query     = "SELECT * from tbl_evaluaciones e inner join tbl_seleccion s on (e.id_evaluacion=s.id_evaluacion) INNER join tbl_temas t on(t.id_temas=s.id_temas) inner join tbl_contexto c on (c.id_tema=t.id_temas) inner join tbl_preguntas p on (p.id_contexto=c.id_contexto)  WHERE e.id_evaluacion='$id_evaluacion' and p.id_pregunta='$id_pregunta' ";
    $resultado = $mysqli->query($query);

    return $resultado;

}

function respuestareguntasopcions($id_opcion)
{

    global $mysqli;
    $query     = " SELECT tbl_opciones.respuesta from tbl_opciones WHERE tbl_opciones.id_opcion= '$id_opcion'";
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

function idopcionimagen($id_opcion)
{

    global $mysqli;

    $query = "  SELECT tbl_opcionesimagen.respuesta FROM  tbl_opcionesimagen WHERE tbl_opcionesimagen.id_imagen= '$id_opcion'";

    $resultado = $mysqli->query($query);
    return $resultado;

}

function insertarresultadoevaluacion($id_evaluacion, $id_usuario, $id_pregunta, $numerof, $correcta, $tiempo)
{

    $resultado = "";

    global $mysqli;

    if ($numerof == 0) {

        if ($correcta == 1) {

            $preguntas_buenas = 1;
            $preguntas_malas  = 0;

            $id_preguntasbuenas = $id_pregunta;
            $id_preguntasmalas  = "";

            $query = "INSERT INTO tbl_resultadoevaluaciones( id_evaluacion, id_usuario, preguntas_malas, preguntas_buenas, id_preguntasmalas, id_preguntasbuenas, tiempoevaluacion)
              VALUES ('$id_evaluacion', '$id_usuario','$preguntas_malas','$preguntas_buenas','$id_preguntasmalas','$id_preguntasbuenas','$tiempo')";

            $resultado = $mysqli->query($query);

        } else if ($correcta == 0) {

            $preguntas_buenas = 0;
            $preguntas_malas  = 1;

            $id_preguntasbuenas = "";
            $id_preguntasmalas  = $id_pregunta;

            $query = "INSERT INTO tbl_resultadoevaluaciones( id_evaluacion, id_usuario, preguntas_malas, preguntas_buenas, id_preguntasmalas, id_preguntasbuenas, tiempoevaluacion)
              VALUES ('$id_evaluacion', '$id_usuario','$preguntas_malas','$preguntas_buenas','$id_preguntasmalas','$id_preguntasbuenas','$tiempo')";

            $resultado = $mysqli->query($query);

        }

        // cuando es mayor a  0

    } else if ($numerof > 0) {

        $respuesta = datosevaluacion($id_evaluacion, $id_usuario);

        while ($mostarress = mysqli_fetch_array($respuesta)) {
            $preguntasmalas    = $mostarress[0];
            $preguntasbuenas   = $mostarress[1];
            $id_preguntasmalas = $mostarress[2];
            $idpreguntasbuenas = $mostarress[3];
            $idresultado       = $mostarress[4];
            $tiempoanti        = $mostarress[5];
        }

        $horasbd = [$tiempo, $tiempoanti];

        $tiemponuevo = sumarHoras($horasbd);

        $resultado = actualizardatosevaluacion($id_evaluacion, $id_usuario, $correcta, $preguntasbuenas, $preguntasmalas, $idpreguntasbuenas, $id_preguntasmalas, $id_pregunta, $idresultado, $tiemponuevo);

    }

    return $resultado;
}

function idpreguntaopciones($id_opcion)
{

    global $mysqli;

    $query = "
SELECT p.id_pregunta from tbl_preguntas p inner JOIN tbl_opciones o on(p.id_pregunta=o.id_pregunta) WHERE o.id_opcion='$id_opcion'";

    $resultado = $mysqli->query($query);
    return $resultado;

}

function idpreguntaopcionesfv($id_opcion)
{

    global $mysqli;

    $query = "
SELECT p.id_pregunta from tbl_preguntas p inner JOIN tbl_opcionesfv o on(p.id_pregunta=o.id_pregunta) WHERE o.id_opcion='$id_opcion'";

    $resultado = $mysqli->query($query);
    return $resultado;

}

function idpreguntaopcionesimagen($id_opcion)
{

    global $mysqli;

    $query = " SELECT p.id_pregunta FROM tbl_preguntas p inner join tbl_opcionesimagen o on(p.id_pregunta=o.id_pregunta) WHERE o.id_imagen ='$id_opcion'";

    $resultado = $mysqli->query($query);
    return $resultado;

}

function datosevaluacion($id_evaluacion, $id_usuario)
{

    global $mysqli;

    $query = " SELECT e.preguntas_malas,e.preguntas_buenas,e.id_preguntasmalas,e.id_preguntasbuenas,e.id_resultados ,e.tiempoevaluacion FROM tbl_resultadoevaluaciones e WHERE e.id_evaluacion ='$id_evaluacion' and e.id_usuario='$id_usuario' ORDER by e.id_resultados DESC LIMIT 1 ";

    $resultado = $mysqli->query($query);
    return $resultado;

}

function actualizardatosevaluacion($id_evaluacion, $id_usuario, $correcta, $preguntas_buenas, $preguntas_malas, $id_preguntasbuenas, $id_preguntasmalas, $id_pregunta, $idresultado, $tiemponuevo)
{
    global $mysqli;

    $resultado = "";
    $nuevoid   = "";

    if ($correcta == 1) {

        $n_preguntabuenas = $preguntas_buenas + 1;

        if ($id_preguntasbuenas == null) {

            $nuevoid = $id_pregunta;

        } else {

            $coma = ",";

            $cadena = $coma . $id_pregunta;

            $nuevoid = $id_preguntasbuenas . $cadena;

        }

        $query = " UPDATE tbl_resultadoevaluaciones e SET preguntas_buenas ='$n_preguntabuenas' , id_preguntasbuenas ='$nuevoid', tiempoevaluacion='$tiemponuevo' WHERE e.id_evaluacion= '$id_evaluacion' and e.id_usuario= '$id_usuario' and e.id_resultados='$idresultado'";

        $resultado = $mysqli->query($query);

    } else if ($correcta == 0) {

        $n_preguntasmalas = $preguntas_malas + 1;

        if ($id_preguntasmalas == null) {

            $nuevoid = $id_pregunta;

        } else {

            $coma = ",";

            $cadena = $coma . $id_pregunta;

            $nuevoid = $id_preguntasmalas . $cadena;
        }

        $query = " UPDATE tbl_resultadoevaluaciones e SET preguntas_malas='$n_preguntasmalas', id_preguntasmalas='$nuevoid' ,tiempoevaluacion='$tiemponuevo' WHERE e.id_evaluacion= '$id_evaluacion' and e.id_usuario= '$id_usuario' and e.id_resultados='$idresultado'";

        $resultado = $mysqli->query($query);

    }

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

    $valorimagen = "SELECT p.id_pregunta,i.id_imagen, i.imagen from tbl_preguntas p inner join  tbl_opcionesimagen i on (p.id_pregunta=i.id_pregunta) WHERE p.id_pregunta='$id'";

    $respuestas = $mysqli->query($valorimagen);

    return $respuestas;

}

function idpreguntas()
{

    global $mysqli;

    $valorimagen = "SELECT P.id_pregunta ,p.titulo FROM tbl_preguntas P ";

    $respuestas = $mysqli->query($valorimagen);

    return $respuestas;

}

function idpreguntastitulo($id_pregunta)
{

    global $mysqli;

    $valorimagen = "SELECT p.titulo FROM  tbl_preguntas p WHERE p.id_pregunta='$id_pregunta' ";

    $respuestas = $mysqli->query($valorimagen);

    return $respuestas;

}

function idpreguntashistorial()
{

    global $mysqli;

    $valorimagen = "SELECT p.id_pregunta from  tbl_historialpreguntas p  ";

    $respuestas = $mysqli->query($valorimagen);

    return $respuestas;

}

function insertarhistorialpreguntas($id_pregunta, $cantidadcaracteres)
{

    global $mysqli;

    $valorimagen = "INSERT INTO tbl_historialpreguntas( id_pregunta, cantidad_fallos, cantidad_aciertos, tiempo,dificultadestudiante,cantidadcaracteres) VALUES ('$id_pregunta' , '' ,'' ,'','','$cantidadcaracteres' ) ";

    $respuestas = $mysqli->query($valorimagen);

    return $respuestas;

}

function insertarhistorial()
{

    $idPreguntas          = array();
    $titulo               = "";
    $idpreguntashistorial = array();
    $idpreguntasfalta     = array();
    $nuevo                = array();

    $respuesta = idpreguntas();

    while ($row = mysqli_fetch_array($respuesta)) {

        $idPreguntas[] = $row['id_pregunta'];

    }

    $respuestas = idpreguntashistorial();

    while ($row = mysqli_fetch_array($respuestas)) {

        $idpreguntashistorial[] = $row['id_pregunta'];

    }

    $idpreguntasfalta = array_diff($idPreguntas, $idpreguntashistorial);

    $nuevo = array_values($idpreguntasfalta);

    $tam = count($nuevo);

    if ($tam != 0) {

        for ($i = 0; $i < $tam; $i++) {

            $tiulop = idpreguntastitulo($nuevo[$i]);

            while ($mostarres = mysqli_fetch_array($tiulop)) {
                $titulo = $mostarres[0];
            }

            $cadena = str_replace(' ', '', $titulo);

            $numeroc = strlen($cadena);

            insertarhistorialpreguntas($nuevo[$i], $numeroc);
        }

    }
}

function idpreguntashistorialactualizar($id_pregunta)
{

    global $mysqli;

    $valorimagen = "SELECT p.cantidad_fallos,p.cantidad_aciertos,p.tiempo FROM tbl_historialpreguntas p WHERE p.id_pregunta='$id_pregunta' ";

    $respuestas = $mysqli->query($valorimagen);

    return $respuestas;

}

function actualizarfallospregunta($id_pregunta, $nuevofallo, $nuevotimepo)
{

    global $mysqli;

    $valorimagen = " UPDATE tbl_historialpreguntas p SET cantidad_fallos = '$nuevofallo' ,tiempo='$nuevotimepo'  WHERE  p.id_pregunta='$id_pregunta' ";

    $respuestas = $mysqli->query($valorimagen);

    return $respuestas;

}

function actualizaraciertospregunta($id_pregunta, $nuevoacierto, $nuevotimepo)
{

    global $mysqli;

    $valorimagen = "  UPDATE tbl_historialpreguntas p SET cantidad_aciertos = '$nuevoacierto' ,tiempo='$nuevotimepo'  WHERE  p.id_pregunta='$id_pregunta' ";

    $respuestas = $mysqli->query($valorimagen);

    return $respuestas;

}

function actualizardatoshistorial($id_pregunta, $correcta, $tiemponuevo)
{

    $nuevofallo   = "";
    $nuevoacierto = "";
    $nuevotiempo  = "";

    $respuesta = idpreguntashistorialactualizar($id_pregunta);

    while ($mostarress = mysqli_fetch_array($respuesta)) {
        $cantidadfallos   = $mostarress[0];
        $cantidadaciertos = $mostarress[1];
        $tiempo           = $mostarress[2];
    }

    if ($correcta == 1) {

        $nuevoacierto = $cantidadaciertos + 1;

        $horasbd = [$tiemponuevo, $tiempo];

        $nuevotiempo = sumarHoras($horasbd);

        actualizaraciertospregunta($id_pregunta, $nuevoacierto, $nuevotiempo);

    } else if ($correcta == 0) {

        $nuevofallo = $cantidadfallos + 1;

        $horasbd = [$tiemponuevo, $tiempo];

        $nuevotiempo = sumarHoras($horasbd);

        actualizarfallospregunta($id_pregunta, $nuevofallo, $nuevotiempo);

    }

}

function sumarHoras($horas)
{

    error_reporting(0);
    $total = 0;
    foreach ($horas as $h) {
        $parts = explode(":", $h);
        $total += $parts[2] + $parts[1] * 60 + $parts[0] * 3600;
    }
    return gmdate("H:i:s", $total);
}

//---------consultas para la tabla historia pregunta ----------------------------------------------------------------------

function mostrarpreuntaspersonalizada($id_evaluacion, $id_pregunta)
{

    global $mysqli;
    $query     = "SELECT * from tbl_evaluaciones e inner join tbl_seleccion s on (e.id_evaluacion=s.id_evaluacion) INNER join tbl_temas t on(t.id_temas=s.id_temas) inner join tbl_contexto c on (c.id_tema=t.id_temas) inner join tbl_preguntas p on (p.id_contexto=c.id_contexto)  WHERE e.id_evaluacion='$id_evaluacion' and p.id_pregunta='$id_pregunta' ";
    $resultado = $mysqli->query($query);

    return $resultado;

}

function obtenerpreguntas($id_evaluacion)
{

    global $mysqli;
    $query     = " SELECT p.id_pregunta, h.cantidad_fallos ,h.cantidad_aciertos,h.dificultadestudiante from tbl_evaluaciones e inner join tbl_seleccion s on (e.id_evaluacion=s.id_evaluacion) INNER join tbl_temas t on(t.id_temas=s.id_temas) inner join tbl_contexto c on (c.id_tema=t.id_temas) inner join tbl_preguntas p on (p.id_contexto=c.id_contexto) inner join tbl_historialpreguntas h on (p.id_pregunta= h.id_pregunta) WHERE e.id_evaluacion='$id_evaluacion' ";
    $resultado = $mysqli->query($query);

    return $resultado;

}

// resultado de la evaluacion

function obtenervalores($idevaluacion, $idusuario)
{

    global $mysqli;
    $query     = "SELECT  u.USU_NOMBRE ,r.preguntas_buenas,r.preguntas_malas FROM tbl_resultadoevaluaciones r inner join tbl_usuario u on (r.id_usuario=u.USU_ID) WHERE r.id_evaluacion='$idevaluacion' and r.id_usuario='$idusuario' ORDER BY r.id_resultados DESC LIMIT 1 ";
    $resultado = $mysqli->query($query);

    return $resultado;

}

function temapregunta($id_pregunta)
{

    global $mysqli;

    $query     = "SELECT t.id_temas from tbl_evaluaciones e inner join tbl_seleccion s on (e.id_evaluacion=s.id_evaluacion) INNER join tbl_temas t on(t.id_temas=s.id_temas) inner join tbl_contexto c on (c.id_tema=t.id_temas) inner join tbl_preguntas p on (p.id_contexto=c.id_contexto) WHERE p.id_pregunta='$id_pregunta' ";
    $resultado = $mysqli->query($query);

    return $resultado;
}
