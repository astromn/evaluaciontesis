<?php
session_start();

include "../../../modelo/funcs/crudcontexto.php";

$id_temas = $_SESSION['id_temas'];

$data = '
    <table class="table table-bordered table-hover table-condensed">
        <thead class="thead-gris">
            <tr>

                <th>Contexto</th>
                <th>imagen</th>

                <th>Accciones</th>
            </tr>
        </thead>';

$resultado = mostarrcontexto($id_temas);

while ($row = $resultado->fetch_assoc()) {
    $data .= '
        <tbody>
            <tr>


                <td > <abbr  title="Crear Nueva Pregunta " style="text-decoration:none">  <a href="CrearPregunta.php?id_contexto=' . $row['id_contexto'] . '">' . $row['descripcion'] . '</a> </abbr> </td>

                 <td>  <img src="../controladores/funcionesProfesorphp/contextoprofesorphp/imagenesf/' . $row["contextoimagen"] . '"  width="50" height="50"> </td>




                <td  width="280">
                   <abbr  title="Modificar " style="text-decoration:none"> <button onclick="obtenerDetallescontexto(' . $row['id_contexto'] . ')" class="btn btn-success">Modificar</button></abbr>

                    <abbr  title="Eliminar " style="text-decoration:none"> <button onclick="eliminarcontexto(' . $row['id_contexto'] . ')" class="btn btn-danger">Eliminar</button> </abbr>
                </td>
            </tr>
        </tbody>';
}

$data .= '</table>';

echo $data;
