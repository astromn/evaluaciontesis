<?php

require '../modelo/funcs/conexion.php';
require '../modelo/funcs/crudadministrador.php'

?>





<div class="row">


<div class="col-sm-8"></div>
 <div class="col-sm-4">

  <label>documento</label>

  <select id="buscardocumento" class="form-control input-sm">
    <option value="0"> ingrese documento</option>

    <?php

$result = buscarestudiantes();

while ($ver = mysqli_fetch_row($result)):

?>

      <option value="<?php echo $ver[0] ?>">
        <?php echo $ver[1]; ?>
      </option>

    <?php endwhile;?>

  </select>


 </div>

</div>


<script type="text/javascript">
  $(document).ready(function (){
       $('#buscardocumento').select2();

       $('#buscardocumento').change(function(){

           $.ajax({

            type:"post",
            data:'valor='+ $('#buscardocumento').val(),
             url:'../controladores/funcionesAdministradorphp/crearsesion.php',
             success:function(r){
                $('#tabla').load('../componentes/tablausuarios.php');
             }


           });

       });

  });
</script>