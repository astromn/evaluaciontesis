// Cargar modal de boostrap para agregar nueva opción
// Usaremos el "shorter method"
$(function() {
	$("#boton_agregar").click(function() {
		$("#modal_agregar").modal("show");
	});
    validarboton();

});


var id_pregunta = $("#id_pregunta").val();
function actualizar() {
    location.reload();
}

// Mostrar encuestas
function mostrarOpciones(id_pregunta) {
    // Mostrar encuestas con el método ajax POST
    $.post("../controladores/funcionesProfesorphp/opcionesimagenprofesorphp/mostraropcionimagen.php", {
    	id_pregunta : id_pregunta
    }, function(data, status) {
        $("#tabla_opciones").html(data);
         validarboton();
    });
}

// Mostrar encuestas al cargar la página
$(function() {
    mostrarOpciones(id_pregunta);
     validarboton(); // Llamando a la función
});

// Agregar nueva opción
function  agregar_opcionimagen(){
    var parametros = new FormData($("#formulario-imagen")[0]);


    $.ajax({
       data:parametros,
       url:"../controladores/funcionesProfesorphp/opcionesimagenprofesorphp/agregaropcionimagen.php",
       type:"POST",
       contentType:false,
       processData:false ,
       beforesend:function(){
       },
       sucessss:function(response){
           
           alert(response);


       }
    });
actualizar() ;

    mostrarOpciones(id_pregunta);
   $("#modal_agregar").modal("hide");
            // Mostrar las encuestas nuevamente
          
            // Limpiar campos del modal
             validarboton();
            $("#titulo").val("");    



}


function validarboton() {

    var valorb  = $("#valorboton").val();

           

                 if(valorb<4){

                   $('#boton_agregar').prop('disabled', false);

                 } else if(valorb>=4){

                    $('#boton_agregar').prop('disabled', true);
                 }

    
   

             }



// Eliminar Opción
function eliminarOpcion(id_opcion) {
    var conf = confirm("Estas seguro de eliminar la Opción");
      

    if (conf == true) {
        // Eliminar pregunta con el método ajax POST
        $.post("../controladores/funcionesProfesorphp/opcionesimagenprofesorphp/eliminaropcionimagen.php", {id_opcion: id_opcion },
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