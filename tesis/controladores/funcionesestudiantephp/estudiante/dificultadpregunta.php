<?php
session_start();
include "../../../modelo/funcs/carectizarpregunta.php";

$dificultad = $_POST['dificultad'];

$idpregunta = $_POST['idpregunta'];
$correcta   = $_POST['correcta'];
$id_usuario = $_SESSION['id_usuario'];

actualizar($idpregunta, $dificultad, $correcta, $id_usuario);
