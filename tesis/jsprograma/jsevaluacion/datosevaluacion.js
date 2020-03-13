


  $(function() {
crearmatrizevaluacion();
});

 

     var todasopciones;

function crearmatrizevaluacion(){

  var  tamm = $("#tamma").val(); 
  var num = parseInt(tamm);

  //alert(num);

      todasopciones  = new Array(num);
   
}


  function crearmatris1( id ){

   var posicion    = $("#actual").val();
   var tipop =$("#tipop").val();
   var valor = "";



   var nuevo = {"id":id , "tipo":tipop,"valor":valor };

       todasopciones [posicion-1]=nuevo;

  }



  function crearmatris2( id , valor){

   var posicion    = $("#actual").val();

     var tipop =$("#tipop").val();

    var nuevo = {"id":id ,"tipo":tipop, "valor":valor};

       todasopciones [posicion-1]=nuevo;

  }




  function enviardatos(){

    var  arrayev = {"data":todasopciones};

 var arrayevalucion = JSON.stringify(arrayev); 


      return arrayevalucion;



  }





function guardardatos(){

     var json = enviardatos();

     ajaxenviar("../controladores/funcionesevaluacionphp/estudiantephp/evaluacion.php", {"json":json}).done(function(info){
    
    if(info== 1){

       alertify.confirm('Evaluacion ', 'Evaluacion  Exitosa', function(){ alertify.success('Evaluacion Exitosa') }
                , function(){ alertify.error('Cerrar')});


    } else if(info == 0){

       alertify.confirm('Evaluacion ', 'Evaluacion no Exitosa', function(){ alertify.success('Evaluacion Exitosa') }
                , function(){ alertify.error('Cerrar')});


    }  
         
     });
       return false;


}


 function  ajaxenviar (url,data){

   var ajaxx = $.ajax({

     "method":"POST",
     "url":url,
     "data":data
   })
   return ajaxx;
 }














