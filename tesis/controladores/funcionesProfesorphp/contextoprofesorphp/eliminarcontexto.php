<?php
// Validar consulta
if (isset($_POST['id_contexto']) && isset($_POST['id_contexto']) != "") {
    // Incluir archivo de conexión a base de datos
    include "../../../modelo/funcs/crudcontexto.php";

    // Obtener id_pregunta
    $id_contexto = $_POST['id_contexto'];

    // Eliminar encuesta

    eliminarcontexto($id_contexto);
}
