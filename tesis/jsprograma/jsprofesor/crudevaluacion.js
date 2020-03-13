// Cargar modal de boostrap para agregar nueva pregunta
// Usaremos el "shorter method"
$(function() {
	$("#boton_agregar").click(function() {
		$("#modal_agregar").modal("show");
	});    
});


function llamarmodal(id_evaluacion) {
    // Mostrar encuestas con el método ajax POST
        $("#modal_agregar2").modal("show");
        $("#idevaluacion").val(id_evaluacion);
   
}

var id_usuario = $("#id_usuario").val();

// Mostrar encuestas
function mostrarPreguntas() {
    // Mostrar encuestas con el método ajax POST
    $.post("../controladores/funcionesProfesorphp/evaluacionprofesorphp/mostrarevaluacion.php", {
    
    }, function(data, status) {
        $("#tabla_preguntas").html(data);
    });
}

// Mostrar encuestas al cargar la página
$(function() {
    mostrarPreguntas(); // Llamando a la función
});

// Agregar nueva pregunta
function agregarPregunta() {
    // Obtener los valores de los inputs


    var id_usuario 		= $("#id_usuario").val();
    var titulo      	 	= $("#titulo").val();
     var grado             = $("#grado").val();

    
   

    // Agregar encuesta con el método ajax POST
    $.post("../controladores/funcionesProfesorphp/evaluacionprofesorphp/agregarevaluacion.php",
        {
        	id_usuario 		: id_usuario,
            titulo           : titulo,
            grado            : grado,
          
        },
        function (data, status) {
            // Cerrar el modal
            $("#modal_agregar").modal("hide");
            // Mostrar las encuestas nuevamente
            mostrarPreguntas();            
            // Limpiar campos del modal
            $("#titulo").val("");
            
        }
    ) ;
}

function agregarPreguntadoble() {
    // Obtener los valores de los inputs


    var id_usuario       = $("#id_usuario").val();
    var titulo           = $("#titulo1").val();
    var grado             = $("#grado").val();
     var id_evaluacion   = $("#idevaluacion").val();

    
   

    // Agregar encuesta con el método ajax POST
    $.post("../controladores/funcionesProfesorphp/evaluacionprofesorphp/duplicarevaluacion.php",
        {
            id_usuario       : id_usuario,
            titulo           : titulo,
            grado            : grado,
            id_evaluacion    : id_evaluacion,
          
        },
        function (data, status) {
            // Cerrar el modal
            $("#modal_agregar2").modal("hide");
            // Mostrar las encuestas nuevamente
            mostrarPreguntas();            
            // Limpiar campos del modal
            $("#titulo").val("");
            
        }
    ) ;
}

// Eliminar Pregunta
function eliminarPregunta(id_evaluacion) {
    var conf = confirm("Estas seguro de eliminar la Evaluacion");
    if (conf == true) {
        // Eliminar pregunta con el método ajax POST
        $.post("../controladores/funcionesProfesorphp/evaluacionprofesorphp/eliminarevaluacion.php", {id_evaluacion: id_evaluacion}, function (data, status) {
            // Volver a cargar la tabla de encuestas
            mostrarPreguntas();
        });
    }
}



function obtenerDetallesPregunta(id_evaluacion) {
    // Agregar id_pregunta al campo oculto
    $("#hidden_id_pregunta").val(id_evaluacion);

    $.post("../controladores/funcionesProfesorphp/evaluacionprofesorphp/mostrarDetallesevaluacion.php", {id_evaluacion: id_evaluacion}, function (data, status) {
        // PARSE json data
        var pregunta = JSON.parse(data);
        // Asignamos valores del encuesta al modal
        $("#modificar_titulo").val(pregunta.tituloevaluacion);
        
        
    });
    // Abrir modal de modificar
    $("#modal_modificar").modal("show");
}

// Funcion modificarDetallesPregunta del modal modificar pregunta
function modificarDetallesPregunta() {
    // Obtener valores
    var titulo      = $("#modificar_titulo").val();
    var id_pregunta = $("#hidden_id_pregunta").val();
   

    // Modificar detalles consultando al servidor usando ajax
    $.post("../controladores/funcionesProfesorphp/evaluacionprofesorphp/modificarDetallesevaluacion.php",
        {
            id_pregunta : id_pregunta,
            titulo      : titulo
           
        },
        function (data, status) {
            // Ocultar el modal utilizando jQuery
            $("#modal_modificar").modal("hide");
            // Volver a cargar la tabla pregunta         
            var id_pregunta = $("#id_pregunta").val();
            
            mostrarPreguntas();
        }
    ) ;
}


// Publicar encuesta
function publicarEncuesta(id_evaluacion) {
    var conf = confirm("Estas seguro de publicar la Evaluacion");
    if (conf == true) {
        // Publicar encuesta con el método ajax POST
        $.post("../controladores/funcionesProfesorphp/evaluacionprofesorphp/publicarevaluacion.php", {id_evaluacion: id_evaluacion}, function (data, status) {
            // Volver a cargar la tabla de encuestas
            mostrarPreguntas();
        });
    }
}

// Finalizar encuesta
function finalizarEncuesta(id_evaluacion) {
    var conf = confirm("Estas seguro de finalizar la Evaluacion");
    if (conf == true) {
        // Publicar encuesta con el método ajax POST
        $.post("../controladores/funcionesProfesorphp/evaluacionprofesorphp/finalizarevaluacion.php", {id_evaluacion: id_evaluacion}, function (data, status) {
            // Volver a cargar la tabla de encuestas
            mostrarPreguntas();
        });
    }
}