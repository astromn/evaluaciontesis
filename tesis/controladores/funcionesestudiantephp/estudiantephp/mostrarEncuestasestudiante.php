<?php
session_start();
// Incluimos el archivo de conexión a base de datos
include "../../../modelo/funcs/crudrespoder.php";

$id_usuario = $_SESSION['id_usuario'];

unset($_SESSION['id_evaluacion']);

$resultado = mostrarevaluacion($id_usuario);

$tamaño = $resultado->num_rows;

$data = "";

if ($tamaño == 0) {
    $data .= "No hay encuestas disponibles";
} elseif ($tamaño > 0) {

// Diseñamos el encabezado de la tabla
    $data = '
    <table class="table table-bordered table-hover table-condensed">
        <thead class="thead-gris">
            <tr>
                <th>Título</th>


                <th>Accciones</th>
            </tr>
        </thead>';

    while ($row = $resultado->fetch_assoc()) {

        $data .= '
        <tbody>
            <tr>
                <td>' . $row['tituloevaluacion'] . '</td>


                <td>  <abbr  title="Ingresar al Examen " style="text-decoration:none">
 <a class="btn btn-success" href="entradaevaluacion.php?id_evaluacion=' . $row['id_evaluacion'] . '" >Responder</a>
  </abbr>


                </td>
            </tr>
        </tbody>';
    }

    $data .= '</table>';

}

echo $data;
