<?php
session_start();
// Incluimos el archivo de conexión a base de datos
include "../../../modelo/funcs/conexion.php";
include "../../../modelo/funcs/opcionesphp.php";

include "../../../modelo/funcs/crudopciones.php";

$id_pregunta = $_SESSION['id_pregunta'];

$id_tipo = id_tipo_pregunta($id_pregunta);

while ($mostar = mysqli_fetch_array($id_tipo)) {
    $tipopre = $mostar[0];
}

if ($tipopre == 1) {

    $nump = contaropciones($id_pregunta);

    while ($mostar = mysqli_fetch_array($nump)) {
        $num = $mostar[0];

    }

// Diseñamos el encabezado de la tabla
    $data = '

              <input type="hidden" value=" ' . $num . ' " id="valorboton">


          <table class="table table-bordered table-hover table-condensed">
        <thead class="thead-gris">
            <tr>

                <th>Valor</th>
                <th>Respuesta</th>
                <th>Accciones</th>
            </tr>
        </thead>';

    $resultado = mostaropciones($id_pregunta);

    while ($row = $resultado->fetch_assoc()) {
        $data .= '
        <tbody>
            <tr>

                <td>' . $row["valor"] . '</td>
                 <td>' . $row["respuesta"] . '</td>
                <td>  <abbr  title="Modificar " style="text-decoration:none">
                    <button onclick="obtenerDetallesOpcion(' . $row['id_opcion'] . ')" class="btn btn-success">Modificar</button>
                    <button onclick="eliminarOpcion(' . $row['id_opcion'] . ')" class="btn btn-danger">Eliminar</button>
                </td>
            </tr>
        </tbody>';
    }

    $data .= '</table>';

    echo $data;

} else if ($tipopre == 2) {

    $nump = contaropcionesfv($id_pregunta);

    while ($mostar = mysqli_fetch_array($nump)) {
        $num = $mostar[0];

    }

    $data = '

 <input type="hidden" value=" ' . $num . ' " id="valorboton">

    <table class="table table-bordered table-hover table-condensed">
        <thead class="thead-gris">
            <tr>

                <th>Opción</th>
                <th>Accciones</th>
            </tr>
        </thead>';

    $resultado = mostaropcionesfv($id_pregunta);

    while ($row = $resultado->fetch_assoc()) {
        $data .= '
        <tbody>
            <tr>

                <td>' . $row["valor"] . '</td>
                <td>    <abbr  title="Modificar " style="text-decoration:none">
                    <button onclick="obtenerDetallesOpcion(' . $row['id_opcion'] . ')" class="btn btn-success">Modificar</button>
                            </abbr>
                     <abbr  title="Eliminar " style="text-decoration:none">
                    <button onclick="eliminarOpcion(' . $row['id_opcion'] . ')" class="btn btn-danger">Eliminar</button>     </abbr>
                </td>
            </tr>
        </tbody>';
    }

    $data .= '</table>';

    echo $data;

}
