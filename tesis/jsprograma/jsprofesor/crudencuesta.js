$(function() {
	$("#boton_agregar").click(function() {
		$("#modal_agregar").modal("show");
	});
});

// Mostrar encuestas
function mostrarEncuestas() {
    // Mostrar encuestas con el método ajax POST
    $.post("../controladores/funcionesProfesorphp/encuestasprofesorphp/mostrarEncuestas.php", {}, function(data, status) {
        $("#tabla_encuestas").html(data);
    });
}

// Mostrar encuestas al cargar la página
$(function() {
    mostrarEncuestas(); // Llamando a la función
});

function actualizar() {
    location.reload();
}
// Agregar nueva encuesta
function agregarEncuesta() {
    // Obtener los valores de los inputs
    var id_usuario  = $("#hidden_id_usuario").val();
    var titulo      = $("#titulo").val(); 
    // Agregar encuesta con el método ajax POST
    $.post("../controladores/funcionesProfesorphp/encuestasprofesorphp/agregarEncuesta.php",
        {
            titulo      : titulo,          
            id_usuario  : id_usuario
        },
        function (data, status) {
            // Cerrar el modal
            $("#modal_agregar").modal("hide");
            // Mostrar las encuestas nuevamente
            mostrarEncuestas();
            // Limpiar campos del modal
            $("#titulo").val("");
             actualizar();
        }
    ) ;
}


// Eliminar encuesta
function eliminarEncuesta(id_encuesta) {
    var conf = confirm("Estas seguro de eliminar el tema ");
    if (conf == true) {
        // Eliminar encuesta con el método ajax POST
        $.post("../controladores/funcionesProfesorphp/encuestasprofesorphp/eliminarEncuesta.php", {id_encuesta: id_encuesta}, function (data, status) {
            // Volver a cargar la tabla de encuestas
            mostrarEncuestas();
        });
    }
}




function obtenerDetallesEncuesta(id_encuesta) {
    // Agregar id_encuesta al campo oculto
    $("#hidden_id_encuesta").val(id_encuesta);

    $.post("../controladores/funcionesProfesorphp/encuestasprofesorphp/mostrarDetallesEncuesta.php", {id_encuesta: id_encuesta}, function (data, status) {
        // PARSE json data
        var encuesta = JSON.parse(data);
        // Asignamos valores de la encuesta al modal
        $("#modificar_titulo").val(encuesta.tema);
       
    });
    // Abrir modal de modificar
    $("#modal_modificar").modal("show");
}

// Funcion modificarDetallesEncuesta del modal modificar producto
function modificarDetallesEncuesta() {
    // Obtener valores
    var titulo      = $("#modificar_titulo").val();
    var id_encuesta = $("#hidden_id_encuesta").val();
   

    // Modificar detalles consultando al servidor usando ajax
    $.post("../controladores/funcionesProfesorphp/encuestasprofesorphp/modificarDetallesEncuesta.php",
        {
            id_encuesta : id_encuesta,
            titulo      : titulo,
          
        },
        function (data, status) {
            // Ocultar el modal utilizando jQuery
            $("#modal_modificar").modal("hide");
            // Volver a cargar la tabla productos
            mostrarEncuestas();
        }
    ) ;
}

