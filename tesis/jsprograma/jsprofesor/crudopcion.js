// Cargar modal de boostrap para agregar nueva opción
// Usaremos el "shorter method"
$(function() {
	$("#boton_agregar").click(function() {
		$("#modal_agregar").modal("show");
	});

      validarboton();
});


var id_pregunta = $("#id_pregunta").val();


// Mostrar encuestas
function mostrarOpciones() {
    // Mostrar encuestas con el método ajax POST
    $.post("../controladores/funcionesProfesorphp/opcionesprofesorphp/mostrarOpciones.php", {
    	id_pregunta : id_pregunta
    }, function(data, status) {
        $("#tabla_opciones").html(data);
         validarboton();
             
    });

}


function validarboton() {

    var valorb  = $("#valorboton").val();

       var idtipo      = $("#id_tipo").val();


       if(idtipo==1){

                 if(valorb<4){

                   $('#boton_agregar').prop('disabled', false);

                 } else if(valorb>=4){

                    $('#boton_agregar').prop('disabled', true);
                 }

       } else if(idtipo==2 ){
 
                 if(valorb<1){

                   $('#boton_agregar').prop('disabled', false);

                 } else if(valorb>=1){

                    $('#boton_agregar').prop('disabled', true);
                 }
       }
   

             }


// Mostrar encuestas al cargar la página
$(function() {
    mostrarOpciones(); // Llamando a la función
});

// Agregar nueva opción
function agregarOpcion() {
    // Obtener los valores de los inputs
    var id_pregunta  = $("#id_pregunta").val();
    var valorr        = $("#valor").val();
    var txtfv        = $("#tipofv").val();
    var idtipo      = $("#id_tipo").val();
     var valorres      = $("#valorrespuesta").val();
    if (idtipo == 2 ){
          valor =0;
    }else {
    var valor =valorr
    }

    // Agregar opción con el método ajax POST
    $.post("../controladores/funcionesProfesorphp/opcionesprofesorphp/agregarOpcion.php",
        {
            id_pregunta       : id_pregunta,
            valor             : valor,
            txtfv             :txtfv,
            idtipo            :idtipo,
            valorres          :valorres

        },
        function (data, status) {
            // Cerrar el modal
            $("#modal_agregar").modal("hide");
            // Mostrar las encuestas nuevamente
            mostrarOpciones(id_pregunta);
            validarboton();
            // Limpiar campos del modal
            $("#valor").val("");
               
            actualizar();

        }
    ) ;
}

function actualizar() {
    location.reload();
}

// Eliminar Opción
function eliminarOpcion(id_opcion) {
    var conf = confirm("Estas seguro de eliminar la Opción");
        var idtipo      = $("#id_tipo").val();

    if (conf == true) {
        // Eliminar pregunta con el método ajax POST
        $.post("../controladores/funcionesProfesorphp/opcionesprofesorphp/eliminarOpcion.php", {id_opcion: id_opcion, idtipo:idtipo },
         function (data, status) {
            // Volver a cargar la tabla de encuestas
            mostrarOpciones(id_pregunta);
              validarboton();
        });
    }
}




function obtenerDetallesOpcion(id_opcion) {
    // Agregar id_opcion al campo oculto
    $("#hidden_id_opcion").val(id_opcion);

    $.post("../controladores/funcionesProfesorphp/opcionesprofesorphp/mostrarDetallesOpcion.php", {id_opcion: id_opcion  },
     function (data, status) {
        // PARSE json data
        var opcion = JSON.parse(data);
        // Asignamos valores de la opción al modal
        $("#modificar_valor").val(opcion.valor);
    });
    // Abrir modal de modificar
    $("#modal_modificar").modal("show");
}


// Funcion modificarDetallesOpcion del modal modificar opción
function modificarDetallesOpcion() {
    // Obtener valores
    var valor      = $("#modificar_valor").val();
    var id_opcion = $("#hidden_id_opcion").val();
    

    // Modificar detalles consultando al servidor usando ajax
    $.post("../controladores/funcionesProfesorphp/opcionesprofesorphp/modificarDetallesOpcion.php",
        {
            id_opcion : id_opcion,
            valor      : valor
        },
        function (data, status) {
            // Ocultar el modal utilizando jQuery
            $("#modal_modificar").modal("hide");
            // Volver a cargar la tabla opciones         
            var id_pregunta = $("#id_pregunta").val();
            mostrarOpciones(id_pregunta);
        }
    ) ;
}