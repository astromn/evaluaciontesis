<?php
session_start();

$id = $_POST['valor'];

$_SESSION['sesionencuesta'] = $id;

echo $id;
