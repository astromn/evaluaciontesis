<?php
session_start();
// Incluimos el archivo de conexión a base de datos
include "../../../modelo/funcs/crudseleccion.php";

$id_evaluacion = $_SESSION['id_evaluacion'];

$nump = contartemas($id_evaluacion);

while ($mostar = mysqli_fetch_array($nump)) {
    $num = $mostar[0];

}

// Diseñamos el encabezado de la tabla
$data = '

 <input type="hidden" value=" ' . $num . ' " id="valorboton">
    <table class="table table-bordered table-hover table-condensed">
        <thead class="thead-gris">
            <tr>

                <th> Nombre Temas </th>


                <th>Accciones</th>
            </tr>
        </thead>';

$resultado = mostarseleccion($id_evaluacion);

while ($row = $resultado->fetch_assoc()) {
    $data .= '
        <tbody>
            <tr>


                <td>' . $row['tema'] . '</td>





                <td>

                    <button onclick="eliminarseleccion(' . $row['id_seleccion'] . ')" class="btn btn-danger">Eliminar</button>
                </td>
            </tr>
        </tbody>';
}

$data .= '</table>';

echo $data;
