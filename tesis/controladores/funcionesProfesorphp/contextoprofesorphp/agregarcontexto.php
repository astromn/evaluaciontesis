
<?php
session_start();
include "../../../modelo/funcs/crudcontexto.php";

$id_temas = $_SESSION['id_temas'];

$descripcion = $_POST['descripcion'];

$nom = $_FILES['imagen']['name'];

$ruta = 'imagenesf/' . $nom;

if (move_uploaded_file($_FILES['imagen']["tmp_name"], $ruta)) {

    // echo "image cargada";
} else {

    // echo "imagen no cargada ";
}

$re = insertarcontexto($id_temas, $descripcion, $nom);

echo $re;

?>