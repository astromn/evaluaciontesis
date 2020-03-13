
$(function() {

     var valorinicial = $("#valorinicial").val();

      var inicioalgoritmo = $("#inicoalgoritmo").val();

      var conteo =0;



 if (inicioalgoritmo==0){
 if(valorinicial > 0){
    $("#exampleModal").modal("show");
    $('#exampleModal').modal({backdrop: 'static', keyboard: false})

  } 
 }
 
  
  if(inicioalgoritmo>=0){
    $("#calificar").click(function() {
    $("#exampleModal").modal("show");
    conteo +=1;
  });  
  }


  if (inicioalgoritmo==0){
     $('#calificar').prop('disabled', true);
  }else{
    $('#calificar').prop('disabled', false);
  } 
  
});


$(function() {
  $("#ayuda").click(function() {
    $("#modalayuda").modal("show");
  });
});



function actualizarvalor (){


     var dificultad = $("#dificultad").val();
    var idpregunta = $("#idpregunta").val();
     var correcta = $("#correcta").val();




    $.post("../controladores/funcionesestudiantephp/estudiante/dificultadpregunta.php",
        {
            dificultad:dificultad,
            idpregunta : idpregunta,
            correcta : correcta ,
            
        },
        function (data, status) {
            // Cerrar el modal
            $("#exampleModal").modal("hide");
            // Mostrar las encuestas nuevamente
          
           
        }
    ) ;

}


