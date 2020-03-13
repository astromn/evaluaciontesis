<?php
session_start();
// Incluimos el archivo de conexión a base de datos
include "../../../modelo/funcs/crudevaluacion.php";

// Diseñamos el encabezado de la tabla

$id_usuario = $_SESSION['id_usuario'];

$data = '
    <table class="table table-bordered table-hover table-condensed">
        <thead class="thead-gris">
            <tr>

                <th>Título</th>
                  <th>Grado</th>
                 <th>Estado</th>
                <th>Accciones</th>
            </tr>
        </thead>';
/*

$query = "SELECT * FROM tbl_encuestas ORDER BY id_encuesta DESC";
$resultado = $mysqli->query($query);
 */

$resultado = mostrarencuestas($id_usuario);

while ($row = $resultado->fetch_assoc()) {
    $data .= '
        <tbody>
            <tr>

                <td><a href="seleccionevaluacion.php?id_evaluacion=' . $row['id_evaluacion'] . '">' . $row['tituloevaluacion'] . '</a></td>

                  <td>' . $row['grado'] . '</td>
                  <td>' . $row['estado'] . '</td>

                <td>
                    <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Accciones
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <button onclick="obtenerDetallesPregunta(' . $row['id_evaluacion'] . ')" class="dropdown-item ">Modificar</button>
                        <button onclick="eliminarPregunta(' . $row['id_evaluacion'] . ')" class="dropdown-item ">Eliminar</button>
                         <button onclick="publicarEncuesta(' . $row['id_evaluacion'] . ')" class="dropdown-item ">Publicar</button>
                        <button onclick="finalizarEncuesta(' . $row['id_evaluacion'] . ')" class="dropdown-item ">Finalizar</button>
                        <a class="dropdown-item " href="resultadosestadisticos.php?id_evaluacion=' . $row['id_evaluacion'] . '">Resultados Estadisticos </a>

                         <button  onclick="llamarmodal(' . $row['id_evaluacion'] . ')" class="dropdown-item ">
                     Duplicar Evaluacion
                </button>





                    </div>
                </td>
            </tr>
        </tbody>';
}

$data .= '</table>';

echo $data;
