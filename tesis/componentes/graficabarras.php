<?php
session_start();

include "../modelo/funcs/conexion.php";
include "../modelo/funcs/crudevaluacion.php";

$id_evaluacion = $_SESSION['id_evaluaciones'];

$id_usuario = $_SESSION['id_usuario'];

$resultado = mostarnombrecal($id_evaluacion);

$valoresx = array();
$valoresy = array();

while ($mostar = mysqli_fetch_row($resultado)) {
    $valoresx[] = $mostar[0];
    $valoresy[] = $mostar[1];
}

$datosx = json_encode($valoresx);
$datosy = json_encode($valoresy);

?>

<div id="graficabarras"> </div>


<script type="text/javascript">

function crearcadenabarras(json){
var parsed = JSON.parse(json);

var arr =[];
for(var x in parsed){
  arr.push(parsed[x]);
}

return arr ;

}



</script>



<script type="text/javascript">

 datosx =crearcadenabarras('<?php echo $datosx ?> ');

  datosy =crearcadenabarras('<?php echo $datosy ?> ');


  var data = [
  {
    x: datosx,
    y: datosy,
    type: 'bar'
  }
];

Plotly.newPlot('graficabarras', data);

</script>