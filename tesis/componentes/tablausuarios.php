 <?php

session_start();
require '../modelo/funcs/crudadministrador.php';
require '../modelo/funcs/conexion.php';

?>


<div class="row">
  <div class="col-sm-12">
    <h2> tabla de usuarios </h2>
    <table id="tablausuario" class="table table-bordered  table-sm table-hover">
  <thead class="thead-dark-light"  >
    <tr>
      <th scope="col">#</th>

       <th scope="col">Documento</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Email</th>
      <th scope="col">fecha nacimiento</th>
      <th scope="col"> Genero </th>
      <th scope="col"> tipo usuario </th>
      <th scope="col"> institucion </th>
      <th scope="col"> contraseña </th>
      <th scope="col"> ultima sesion </th>

       <th scope="col">actualizar</th>
        <th scope="col">eliminar</th>

    </tr>
  </thead>
  <tbody>

    <?php
$cont = 1;

if (isset($_SESSION['consulta'])) {

    if ($_SESSION['consulta'] > 0) {

        $id = $_SESSION['consulta'];

        $result = buscarestudiantedoc($id);

    } else {
        $result = buscarestudiantes();
    }

} else {
    $result = buscarestudiantes();
}

while ($mostar = mysqli_fetch_array($result)) {

    $id = $mostar[0] . "||" .
        $mostar[1] . "||" .
        $mostar[2] . "||" .
        $mostar[3] . "||" .
        $mostar[4] . "||" .
        $mostar[5] . "||" .
        $mostar[6] . "||" .
        $mostar[7] . "||" .
        $mostar[8] . "||" .
        $mostar[9] . "||" .
        $mostar[10];
    ?>

<tr>
      <th scope="row"><?php echo $cont ?></th>

      <td><?php echo $mostar['USU_DOCUMENTO'] ?></td>
      <td><?php echo $mostar['USU_NOMBRE'] ?></td>
      <td><?php echo $mostar['USU_APELLIDO'] ?></td>
      <td><?php echo $mostar['USU_CORREO'] ?></td>
      <td><?php echo $mostar['USU_FECHA_NACIMIENTO'] ?></td>
      <td><?php echo $mostar['USU_GENERO'] ?></td>
      <td><?php echo $mostar['USU_TIPO_USUARIO'] ?></td>
      <td><?php echo $mostar['USU_INSTITUCION'] ?></td>
        <td><?php echo $mostar['USU_PASSWORD'] ?></td>
         <td><?php echo $mostar['USU_ULTIMA_SESION'] ?></td>

      <td><button class="btn btn-warning glyphicon glyphicon-pencil" id="actualizaru" data-toggle="modal" data-target="#modalactualizar" onclick="obtenerid('<?php echo $id ?>')" ></button>
      </td>
      <td><button class="btn btn-danger glyphicon glyphicon-remove" onclick="validarsiono('<?php echo $mostar[0] ?> ')"></button> </td>

    </tr>
     <?php
$cont++;
}
?>



      </tbody>
</table>



  </div>
</div>



