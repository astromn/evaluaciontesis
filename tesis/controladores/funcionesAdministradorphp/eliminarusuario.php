<?php

require '../../modelo/funcs/conexion.php';
require '../../modelo/funcs/crudadministrador.php';

$id = $_POST['id'];

$result = eliminarusuario($id);

echo $result;
