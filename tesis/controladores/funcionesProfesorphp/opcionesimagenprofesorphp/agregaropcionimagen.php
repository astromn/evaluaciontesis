<?php
session_start();
include "../../../modelo/funcs/crudopciones.php";

$id_pregunta = $_SESSION['id_pregunta'];

$respuesta = $_POST['valorrespuesta'];

$nom = $_FILES['imagen']['name'];

$ruta = 'imagenesopcion/' . $nom;

echo $respuesta;
echo $ruta . "--------";

if (move_uploaded_file($_FILES['imagen']["tmp_name"], $ruta)) {

    echo "image cargada";
} else {

    echo "imagen no cargada ";
}

agregaropcionimagen($id_pregunta, $nom, $respuesta);
