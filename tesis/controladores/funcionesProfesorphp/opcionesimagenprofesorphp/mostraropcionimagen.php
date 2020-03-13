<?php
session_start();
// Incluimos el archivo de conexión a base de datos
include "../../../modelo/funcs/conexion.php";
include "../../../modelo/funcs/opcionesphp.php";

include "../../../modelo/funcs/crudopciones.php";

$id_pregunta = $_SESSION['id_pregunta'];

$nump = contaropcionesimagen($id_pregunta);

while ($mostar = mysqli_fetch_array($nump)) {
    $num = $mostar[0];

}

// Diseñamos el encabezado de la tabla
$data = '

  <input type="hidden" value=" ' . $num . ' " id="valorboton">


    <table class="table table-bordered table-hover table-condensed">
        <thead class="thead-gris">
            <tr>

                <th>imagen</th>
                  <th>Respuesta</th>
                <th>Accciones</th>
            </tr>
        </thead>';

$resultado = mostaropcionimagen($id_pregunta);

while ($row = $resultado->fetch_assoc()) {
    $data .= '
        <tbody>
            <tr>

                <td>  <img src="../controladores/funcionesProfesorphp/opcionesimagenprofesorphp/imagenesopcion/' . $row["imagen"] . '"  width="50" height="50"> </td>

                  <td> ' . $row["respuesta"] . ' </td>

                <td>    <abbr  title="Modificar " style="text-decoration:none">
                    <button onclick="obtenerDetallesOpcion(' . $row['id_imagen'] . ')" class="btn btn-success">Modificar</button>
                        </abbr>

                       <abbr  title="Eliminar " style="text-decoration:none">
                    <button onclick="eliminarOpcion(' . $row['id_imagen'] . ')" class="btn btn-danger">Eliminar</button>   </abbr>

                </td>
            </tr>
        </tbody>';
}

$data .= '</table>';

echo $data;
