<?php
session_start();
// Incluimos el archivo de conexión a base de datos
include "../../../modelo/funcs/conexion.php";

$id_contexto = $_SESSION['id_contexto'];

// Diseñamos el encabezado de la tabla
$data = '
    <table class="table table-bordered table-hover table-condensed">
        <thead class="thead-gris">
            <tr>


                <th>Título</th>
                 <th>texto Ayuda</th>
                 <th> Ayuda imagen </th>
                 <th>dificultad </th>
                <th>Tipo</th>
                <th >Accciones</th>
            </tr>
        </thead>';

$query = "SELECT p.id_pregunta, p.titulo, p.ayudaestudiante,p.imagenpregunta,tbl_dificultad.nombres,tipo_pregunta.nombre ,p.id_tipo_pregunta FROM tbl_preguntas p INNER JOIN tipo_pregunta ON (p.id_tipo_pregunta = tipo_pregunta.id_tipo_pregunta) INNER JOIN   tbl_dificultad on(p.id_dificultad=tbl_dificultad.id_dificultad )  WHERE p.id_contexto = '$id_contexto'  ORDER BY p.id_pregunta ";

$resultado = $mysqli->query($query);

while ($row = $resultado->fetch_assoc()) {
    $data .= '
        <tbody>
            <tr>

                 ';

    if ($row["id_tipo_pregunta"] == 3) {

        $data .= '  <td> <abbr  title="Crear Nueva Opcion " style="text-decoration:none"> <a href="CrearOpcionesimagen.php?id_pregunta=' . $row['id_pregunta'] . '">' . $row['titulo'] . '</a> </abbr></td>';

    } else {

        $data .= '  <td>  <abbr  title="Crear Nueva Opcion " style="text-decoration:none"><a href="CrearOpciones.php?id_pregunta=' . $row['id_pregunta'] . '">' . $row['titulo'] . '</a> </abbr></td>';

    }

    $data .= '


            <td>' . $row["ayudaestudiante"] . '</td>



             <td>  <img src="../controladores/funcionesProfesorphp/preguntasprofesorphp/imagenesf/' . $row["imagenpregunta"] . '"  width="50" height="50"> </td>

            <td>' . $row["nombres"] . '</td>
            ';

    $data .= '


                <td>' . $row["nombre"] . '</td>
                <td width="280"> <abbr  title="Modificar " style="text-decoration:none">
                    <button onclick="obtenerDetallesPregunta(' . $row['id_pregunta'] . ')" class="btn btn-success">Modificar</button> </abbr>

                     <abbr  title="Eliminar" style="text-decoration:none"><button onclick="eliminarPregunta(' . $row['id_pregunta'] . ')" class="btn btn-danger">Eliminar</button></abbr>
                </td>
            </tr>
        </tbody>';
}

$data .= '</table>';

echo $data;
