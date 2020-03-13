<?php

function registraencuesta($encuesta, $idusu)
{

    $servename = "localhost";
    $database  = "bdproyecto";
    $username  = "root";
    $password  = "";

// conexion al servidor

    $con = mysqli_connect($servename, $username, $password, $database);
//conexion al base de datos
    mysqli_select_db($con, $database);

    $insert = "INSERT INTO tbl_encuesta(ENC_NOMBRE, ENC_USU_ID) VALUES ('{$encuesta}','{$idusu}')";

    if ($con->query($insert) === true) {
        return 1;

    } else {
        return 0;

    }

}

function insertarpregunta($pregunta, $estado, $idencuesta)
{

    $servename = "localhost";
    $database  = "bdproyecto";
    $username  = "root";
    $password  = "";

// conexion al servidor

    $con = mysqli_connect($servename, $username, $password, $database);
//conexion al base de datos
    mysqli_select_db($con, $database);

    while (true) {

        //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
        $item1 = current($pregunta);
        $item2 = current($estado);
        $item3 = current($idencuesta);

        ////// ASIGNARLOS A VARIABLES ///////////////////
        $pre  = (($item1 !== false) ? $item1 : ", &nbsp;");
        $esta = (($item2 !== false) ? $item2 : ", &nbsp;");
        $iden = (($item3 !== false) ? $item3 : ", &nbsp;");

        //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
        $valores = '(' . $pre . ',"' . $esta . '","' . $iden . '"),';

        //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
        $valoresQ = substr($valores, 0, -1);

        ///////// QUERY DE INSERCIÓN ////////////////////////////
        $insert = "INSERT INTO tbl_pregunta(PRE_ENUCIADO, PRE_ESTADO, PRE_ENC_ID)
					VALUES $valoresQ";

        if ($con->query($insert) === true) {
            return 1;

        } else {
            return 0;

        }

        // Up! Next Value
        $item1 = next($items1);
        $item2 = next($items2);
        $item3 = next($items3);

        // Check terminator
        if ($item1 === false && $item2 === false && $item3 === false) {
            break;
        }

    }

}

function buscarencuesta($idusu)
{
    global $mysqli;

    $sql    = "  SELECT ENC_ID,ENC_NOMBRE FROM  tbl_encuesta WHERE ENC_USU_ID='$idusu' ";
    $result = mysqli_query($mysqli, $sql);

    return $result;

}
