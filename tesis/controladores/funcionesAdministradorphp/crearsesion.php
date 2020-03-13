<?php

session_start();

$id = $_POST['valor'];

$_SESSION['consulta'] = $id;

echo $id;
