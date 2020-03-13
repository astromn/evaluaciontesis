
<?php

require '../../modelo/funcs/conexion.php';
require '../../modelo/funcs/funcs.php';

$id          = $_POST['id'];
$documento   = $_POST['documento'];
$nombre      = $_POST['nombre'];
$apellido    = $_POST['apellido'];
$correo      = $_POST['correo'];
$fecha       = $_POST['fecha'];
$genero      = $_POST['genero'];
$tipo        = $_POST['tipo'];
$institucion = $_POST['institucion'];
$passwordd   = $_POST['password'];

$actualizar = actulizardatos($id, $documento, $nombre, $apellido, $correo, $fecha, $genero, $tipo, $institucion, $passwordd);
echo $actualizar;

?>