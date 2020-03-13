// Cargar modal de boostrap para agregar nueva pregunta
// Usaremos el "shorter method"
$(function() {
	$("#boton_agregar").click(function() {
		$("#modal_agregar").modal("show");
	});
     validarboton();
});




// Mostrar encuestas
function mostrarseleccion() {
    // Mostrar encuestas con el método ajax POST
    $.post("../controladores/funcionesProfesorphp/seleccionprofesorphp/mostrarseleccion.php", {
    	
    }, function(data, status) {
        $("#tabla_preguntas").html(data);
         validarboton();
    });
}

// Mostrar encuestas al cargar la página
$(function() {
    mostrarseleccion(); // Llamando a la función
});

// Agregar nueva pregunta
function agregarseleccion() {
    // Obtener los valores de los inputs


    var id_tema  = $("#tipopregunta").val();
    

    // Agregar encuesta con el método ajax POST
    $.post("../controladores/funcionesProfesorphp/seleccionprofesorphp/agregarseleccion.php",
        {
        	id_tema : id_tema
           
        },
        function (data, status) {
            // Cerrar el modal
            $("#modal_agregar").modal("hide");
            // Mostrar las encuestas nuevamente
            mostrarseleccion();     
             validarboton();       
            // Limpiar campos del modal
            $("#titulo").val("");
             $("#ayuda").val("");
        }
    ) ;
}



function validarboton() {

    var valorb  = $("#valorboton").val();

      
              if(valorb<2){

               $('#boton_agregar').prop('disabled', false);

                 } else if(valorb>=2){

                    $('#boton_agregar').prop('disabled', true);
                 }

          

             }

// Eliminar Pregunta
function eliminarseleccion(id_pregunta) {
    var conf = confirm("Estas seguro de eliminar este tema");
    if (conf == true) {
        // Eliminar pregunta con el método ajax POST
        $.post("../controladores/funcionesProfesorphp/seleccionprofesorphp/eliminarseleccion.php", {id_pregunta: id_pregunta}, function (data, status) {
            // Volver a cargar la tabla de encuestas
            mostrarseleccion();
             validarboton();
        });
    }
}


