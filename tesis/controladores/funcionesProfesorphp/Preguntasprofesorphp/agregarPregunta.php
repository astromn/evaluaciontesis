<?php
session_start();
// Incluir archivo de conexión a base de datos
include "../../../modelo/funcs/conexion.php";

include "../../../modelo/funcs/crudpregunta.php";

// Obtener valores
//echo "hola imgreso";

$id_contexto = $_POST['id_contexto'];

$titulo = $_POST['titulo'];

$id_tipo_pregunta = $_POST['tipopregunta'];

$id_dificultad = $_POST['tipodificultad'];

$ayuda = $_POST['ayuda'];

$nom = $_FILES['imagen']['name'];

$ruta = 'imagenesf/' . $nom;

if (move_uploaded_file($_FILES['imagen']["tmp_name"], $ruta)) {

    // echo "image cargada";
} else {

    // echo "imagen no cargada ";
}

echo "difi --" . $id_dificultad;
echo "TIPO--" . $id_tipo_pregunta;

echo "ayu---" . $ayuda;

echo "imagen-- " . $nom;

$resultado = insertarpregunta($id_contexto, $titulo, $ayuda, $id_dificultad, $id_tipo_pregunta, $nom);
