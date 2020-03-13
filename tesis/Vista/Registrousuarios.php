<!DOCTYPE html>
<html>
<head>
  <title></title>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">




  <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">

  <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap-theme.css">

     <link rel="stylesheet" type="text/css" href="../css/jquery-ui.min.css">

      <link rel="stylesheet" type="text/css" href="../librerias/css/alertify.css">
     <link rel="stylesheet" type="text/css" href="../librerias/css/themes/default.css">





   <script src="../jsprograma/js/jquery-3.3.1.min.js" ></script>
    <script type="text/javascript" src="../jsprograma/js/jquery-ui.js"></script>
     <script src="../jsprograma/js/bootstrap.min.js" ></script>

    <script src="../librerias/alertify.js" ></script>
   <script src="../jsprograma/js/popper.min.js"></script>

   <style type="text/css">

     .styled-select {

   height: 40px;
   overflow: hidden;
   width: 280px;
}
   </style>

</head>
<body>




    <div class="container" align="center" >


      <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

          <div style="padding-top:50px" class="panel-body" >


  <div class = "panel panel-primary">
   <div class = "panel-heading">

       <h3 class = "panel-title" style="color:rgb(253, 254, 254  );">Registro de Usuarios</h3>

   </div>

   <div class = "panel-body">



  <form method="post" class="form-horizontal" autocomplete="off" onsubmit=" return enviar();">

               <div class="form-group" style="margin-top:20px;" >


                <label for="documento" class="col-md-3 control-label">Documento o Usuario:</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="documento" id="documento" placeholder="documento" value="<?php if (isset($documento)) {
    echo $documento;
}
?>" required  >
                </div>
              </div>

               <br />

              <div class="form-group">
                <label for="nombre" class="col-md-3 control-label">Nombre:</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nombre"  id="nombre" placeholder="Nombre" value="<?php if (isset($nombre)) {
    echo $nombre;
}
?>" required  >
                </div>
              </div>
                 <br />

              <div class="form-group">
                <label for="apellido" class="col-md-3 control-label">Apellido</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido" value="<?php if (isset($apellido)) {
    echo $apellido;
}
?>" required>
                </div>
              </div>
                 <br />


                 <br />



                 <br />


                           <div class="form-group">
                <label for="Genero" class="col-md-3 control-label">Genero</label>
                <div class="col-md-9">


                               <div class="radio">
                               <label for="radios-0">
                               <input type="radio" name="radios"  id="radioh" value="1"  >
                                   Hombre
                               </label>

                                <label for="radios-1">
                               <input type="radio" name="radios" id="radiom" value="2"  >
                                    Mujer
                               </label>
                             </div>
                              </div>
              </div>
                 <br />

               <div class="form-group">
                <label for="rol" class="col-md-3 control-label">rol</label>
                <div class="col-md-9">


                               <div class="radio">
                               <label for="radios-0">
                               <input type="radio" name="radios1" id="radios0" value="3"  >
                                   Estudiante
                               </label>

                                <label for="radios-1">
                               <input type="radio" name="radios1" id="radios1" value="4">
                                    Profesor
                               </label>
                             </div>
                              </div>
              </div>
                 <br />


              <div class="form-group">
                <label for="titulo" class="col-sm-3 col-form-label"> Grado </label>
                <div class="col-sm-9">
                  <select id="tipo_grado" class="form-control styled-select">
                     <option   disabled selected > Seleccionar </option>
                  <?php
for ($i = 6; $i < 12; $i++) {

    ?>
                    <option  value="<?php echo $i; ?>" required><?php echo $i; ?></option>
                  <?php
}
?>
                  </select>
                </div>
              </div>



               <input type="hidden" value="" id="grado">



                <div class="form-group">
                <label for="institucion" class="col-md-3 control-label">Institucion</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="institucion" id="institucion" placeholder="institucion" value="<?php if (isset($institucion)) {
    echo $institucion;
}
?>" required >
                </div>
              </div>
                 <br />


              <div class="form-group">
                <label for="password" class="col-md-3 control-label">Contraseña</label>
                <div class="col-md-9">
                  <input type="password" class="form-control"  id="password" name="password" placeholder="Password" required>
                </div>
              </div>
                 <br />

              <div class="form-group">
                <label for="con_password" class="col-md-3 control-label">Confirmar Contraseña</label>
                <div class="col-md-9">
                  <input type="password" class="form-control" name="con_password" id="con_password" placeholder="Confirmar Password" required>
                </div>
              </div>
                 <br />

              <div class="input-group">
                <div class="col-md-offset col-md-12">
                     <input type="submit"  value="Registrar"  class="btn btn-success ">  <i class="icon-hand-right"></i>
                       <br />
                         <br />


                </div>
              </div>

  </form>


   </div>
</div>
</div>
</div>
</div>

   <br />

      <br />

         <br />




</body>
</html>





<script  type="text/javascript">



 function enviar(){



 documento=$('#documento').val();
  nombre=$('#nombre').val();
  apellido=$('#apellido').val();
  correo=0;
  fecha =$('#datepicker').val();
  genero = generobd;
      tipo = rolbd;
      grado= $('#grado').val();

  institucion=$('#institucion').val();
  password=$('#password').val();
    con_password=$('#con_password').val();



  var datos = 'documento='+documento+'&nombre='+nombre+'&apellido='+apellido+'&correo='+correo+'&genero='+genero+'&tipo='+tipo+'&grado='+grado+'&institucion='+institucion+'&password='+password+'&con_password='+con_password;

  $.ajax({

    type:'post',
    url:'../controladores/funcionesAdministradorphp/insertarusuario.php',
    data:datos,
    success:function(res){
       if(res==2){
       alertify.confirm('Registro Usuario', 'Contraseñas incorrectas', function(){ alertify.success('contraseñas incorrectas') }
                , function(){ alertify.error('Cerrar')});

       }else if(res==3){
         alertify.confirm('Registro Usuario', 'Usuario ya existe', function(){ alertify.success('Documento o correo ya existen') }
                , function(){ alertify.error('Cerrar')});
       }else if(res==1){

           alertify.confirm('Registro Usuario', 'Registro exitoso', function(){ alertify.success('exitoso')



             location.href = "../index.php";

            }
                , function(){ alertify.error('Cerrar')});

       }
    }


  });
  return false;

 }

</script>



<script type="text/javascript">

   var generobd ="",rolbd ="";
  $('#tipo_grado').prop('disabled', true);

  $(document).ready(function(){
    $('#radioh').click(function(){
        generobd= "hombre";

    });

    $('#radiom').click(function(){
               generobd= "Mujer";

    });

    $('#radios0').click(function(){
               rolbd = 2;

   $('#tipo_grado').prop('disabled', false);

    });

    $('#radios1').click(function(){
              rolbd= 3;

 $('#tipo_grado').prop('disabled', true);

    });

    });

</script>


<script type="text/javascript">
   $(document).ready(function(){




        $("#tipo_grado").change(function(){

           grados =$("#tipo_grado").val();

           document.getElementById("grado").value = grados;


        });

    });

</script>
