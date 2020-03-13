<?php

// Incluimos el archivo de conexión a base de datos
include "../../../modelo/funcs/crudencuesta.php";

// Diseñamos el encabezado de la tabla
$data = '
    <table class="table table-bordered table-hover table-condensed">
        <thead class="thead-gris">
            <tr>

                <th>Título</th>

                <th>Accciones</th>
            </tr>
        </thead>';
/*

$query = "SELECT * FROM tbl_encuestas ORDER BY id_encuesta DESC";
$resultado = $mysqli->query($query);
 */

$resultado = mostrarencuestas();

while ($row = $resultado->fetch_assoc()) {
    $data .= '
        <tbody>
            <tr>

                <td>   <abbr  title="ingresar a crear pregunta " style="text-decoration:none"> <a href="crearcontexto.php?id_temas=' . $row['id_temas'] . '">' . $row['tema'] . '</a>  </abbr> </td>

                <td>

                     <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  <abbr  title="Click Para Mas Opciones " style="text-decoration:none">
                      Accciones  </abbr>
                    </button>


                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <button onclick="obtenerDetallesEncuesta(' . $row['id_temas'] . ')" class="dropdown-item ">Modificar</button>
                        <button onclick="eliminarEncuesta(' . $row['id_temas'] . ')" class="dropdown-item ">Eliminar</button>


                        <a class="dropdown-item btn btn-secondary" href="vistapreviaprofesor.php?id_temas=' . $row['id_temas'] . '">Vista Previa</a>


                    </div>
                </td>
            </tr>
        </tbody>';
}

$data .= '</table>';

echo $data;
