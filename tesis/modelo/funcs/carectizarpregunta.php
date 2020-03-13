<?php

include 'conexion.php';

function valordificultad($idpregunta)
{

    global $mysqli;

    $query = " SELECT  h.dificultadestudiante , h.cantidadvotos FROM tbl_historialpreguntas h WHERE h.id_pregunta = '$idpregunta'";

    $resultado = $mysqli->query($query);

    return $resultado;

}

function consultarbuenasmalas($id_usuario)
{

    global $mysqli;

    $query = "SELECT e.preguntas_buenas ,e.preguntas_malas FROM tbl_resultadoevaluaciones e where e.id_usuario ='$id_usuario'";

    $resultado = $mysqli->query($query);

    return $resultado;

}

function nivelestudiante($id_usuario)
{

    $porcentaje  = 0;
    $buenas      = 0;
    $malas       = 0;
    $buenasmalas = consultarbuenasmalas($id_usuario);

    while ($mostarres = mysqli_fetch_array($buenasmalas)) {
        $buenas += $mostarres[0];
        $malas += $mostarres[1];
    }

    $total = $buenas + $malas;

    if ($total > 0) {

        $porcentaje = ($buenas * 100) / $total;

    }

    return $porcentaje;

}

function actualizar($idpregunta, $valor, $correcta, $id_usuario)
{

    $nuevonivel = "";

    $nivelestu = nivelestudiante($id_usuario);

    // echo  $nivelestu ;
    $nivel1 = valordificultad($idpregunta);

    while ($mostarres = mysqli_fetch_array($nivel1)) {
        $nivel11 = $mostarres[0];

        $cantidad = $mostarres[1];
    }

    if ($nivelestu >= 80) {

        if ($valor <= 2 && $correcta == 0) {
            // le ponemos regular

            $valor = 3;
            if ($nivel11 == 0) {
                $nuevonivel = $valor;

            } else {
                $nuevonivel = ($nivel11 + $valor) / 2;

            }

            $nuevacantidad = $cantidad + 1;

            actualizarnivel($idpregunta, $nuevonivel, $nuevacantidad);

        } else {

            if ($nivel11 == 0) {
                $nuevonivel = $valor;

            } else {
                $nuevonivel = ($nivel11 + $valor) / 2;

            }

            $nuevacantidad = $cantidad + 1;

            actualizarnivel($idpregunta, $nuevonivel, $nuevacantidad);

        }

    } else if ($nivelestu < 80 && $nivelestu >= 60 && $nivelestu == 0) {

        if ($valor <= 2 && $correcta == 0) {

            $valor = 3;

            if ($nivel11 == 0) {
                $nuevonivel = $valor;

            } else {
                $nuevonivel = ($nivel11 + $valor) / 2;

            }

            $nuevacantidad = $cantidad + 1;

            actualizarnivel($idpregunta, $nuevonivel, $nuevacantidad);

        } else {

            if ($nivel11 == 0) {
                $nuevonivel = $valor;

            } else {
                $nuevonivel = ($nivel11 + $valor) / 2;

            }

            $nuevacantidad = $cantidad + 1;

            actualizarnivel($idpregunta, $nuevonivel, $nuevacantidad);
        }

    } else if ($nivelestu < 60) {

        if ($valor <= 2 && $correcta == 0) {

            // le ponemos regular
            $valor = 3;

            if ($nivel11 == 0) {
                $nuevonivel = $valor;

            } else {
                $nuevonivel = ($nivel11 + $valor) / 2;

            }

            $nuevacantidad = $cantidad + 1;

            actualizarnivel($idpregunta, $nuevonivel, $nuevacantidad);

        } else {

            if ($nivel11 == 0) {
                $nuevonivel = $valor;

            } else {
                $nuevonivel = ($nivel11 + $valor) / 2;

            }

            $nuevacantidad = $cantidad + 1;

            actualizarnivel($idpregunta, $nuevonivel, $nuevacantidad);

        }

    }

}

function actualizarnivel($idpregunta, $nuevonivel, $nuevacantidad)
{

    global $mysqli;

    $query = " UPDATE tbl_historialpreguntas h SET h.dificultadestudiante='$nuevonivel', h.cantidadvotos='$nuevacantidad' WHERE h.id_pregunta ='$idpregunta'";

    $resultado = $mysqli->query($query);

    return $resultado;

}
