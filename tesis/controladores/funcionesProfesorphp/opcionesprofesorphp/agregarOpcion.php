<?php

if (isset($_POST['id_pregunta']) && isset($_POST['valor']) && isset($_POST['txtfv']) && isset($_POST['idtipo']) && isset($_POST['valorres'])) {
    // Incluir archivo de conexión a base de datos
    include "../../../modelo/funcs/crudopciones.php";

    // Obtener valores
    $id_pregunta = $_POST['id_pregunta'];
    $valor       = $_POST['valor'];
    $txtfv       = $_POST['txtfv'];
    $idtipo      = $_POST['idtipo'];
    $valorres    = $_POST['valorres'];

    echo $id_pregunta;
    echo $valor;
    echo $txtfv;
    echo $idtipo;
    echo $valorres;

    if ($idtipo == 1) {

        insertaropciones($id_pregunta, $valor, $valorres);

    } else if ($idtipo == 2) {

        insertaropcionesfv($id_pregunta, $txtfv);

        echo $idtipo;
    }

}
