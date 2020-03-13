


$(function() {
	$("#boton_agregar").click(function() {
		$("#modal_agregar").modal("show");
	});
});


// Mostrar encuestas
function mostrarcontexto() {
    // Mostrar encuestas con el método ajax POST
    $.post("../controladores/funcionesProfesorphp/contextoprofesorphp/mostrarcontexto.php", {}, function(data, status) {
        $("#tabla_contexto").html(data);
    });

}

// Mostrar encuestas al cargar la página
$(function() {
    mostrarcontexto(); // Llamando a la función
});

// Agregar nueva pregunta
function actualizar() {
    location.reload();
}

function  agregar_contextos(){
    var parametros = new FormData($("#formulario-envia")[0]);
    $.ajax({
       data:parametros,
       url:"../controladores/funcionesProfesorphp/contextoprofesorphp/agregarcontexto.php",
       type:"POST",
       contentType:false,
       processData:false ,
       beforesend:function(){
       },
       sucessss:function(response){
           
           alert(response);


       }
    });
    actualizar();

    $(mostrarcontexto()); // Llamando a la función
    
   $("#modal_agregar").modal("hide");
            
            $("#titulo").val("");      



}



// Eliminar Pregunta
function eliminarcontexto(id_contexto) {
    var conf = confirm("Estas seguro de eliminar la contexto");
    if (conf == true) {
        // Eliminar pregunta con el método ajax POST
        $.post("../controladores/funcionesProfesorphp/contextoprofesorphp/eliminarcontexto.php", {id_contexto: id_contexto}, function (data, status) {
            // Volver a cargar la tabla de encuestas
            mostrarcontexto();
        });
    }
}

function obtenerDetallescontexto(id_contexto) {
    // Agregar id_opcion al campo oculto
    $("#hidden_id_opcion").val(id_contexto);

    $.post("../controladores/funcionesProfesorphp/contextoprofesorphp/mostrardetallescontexto.php", {id_contexto: id_contexto  },
     function (data, status) {
        // PARSE json data
        var opcion = JSON.parse(data);
        // Asignamos valores de la opción al modal
        $("#modificar_titulo").val(opcion.titulocontexto);
         $("#modificar_descripcion").val(opcion.descripcion);
    });
    // Abrir modal de modificar
    $("#modal_modificar").modal("show");
}


function modificarDetallescontexto() {
    // Obtener valores
    var titulo      = $("#modificar_titulo").val();
    var id_contexto = $("#hidden_id_opcion").val();
    var descripcion = $("#modificar_descripcion").val();
   

    // Modificar detalles consultando al servidor usando ajax
    $.post("../controladores/funcionesProfesorphp/contextoprofesorphp/modificardetallescontexto.php",
        {

            id_contexto : id_contexto,
            titulo      : titulo,
            descripcion : descripcion
          
        },
        function (data, status) {
            // Ocultar el modal utilizando jQuery
            $("#modal_modificar").modal("hide");
            // Volver a cargar la tabla productos
            mostrarcontexto();
        }
    ) ;
}