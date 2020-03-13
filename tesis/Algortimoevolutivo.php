<?php 
      include("modelo/funcs/conexion.php") ; 

        include("modelo/funcs/crudrespoder.php") ; 
  

 

    

       $id_usuario=35;

       $id_evaluacion=1;


        $algoritmoiaa =algoritmoia($id_usuario,$id_evaluacion);

        echo "si puede " .$algoritmoiaa;



     function algoritmoia($id_usuario,$id_evaluacion){

      $poblacion = array();

    
      $fitness =0 ;

      $resultado=0;



       
      $poblacion = poblacion ($id_evaluacion,$id_usuario);

       $fitness = calcularfitness ($poblacion);



     if($fitness < 15 ) {
        
        $fitness =iterciones($id_evaluacion,$id_usuario);
         
        echo "ingreso";
        $resultado=1;
     }else {

      $resultado=0;
     }



     return $resultado;
   
     }

          

         function poblacion ($id_evaluacion,$id_usuario) {



     $vector = array(); 

            $verctorcarecterizar  = vectorcaracterizar($id_usuario,$id_evaluacion);
   
      
            while ($row=mysqli_fetch_array($verctorcarecterizar)) {
             

              $vectorstring  = $row['vectorevaluacion'];               
             
          }  



           $vector = explode(",", $vectorstring);


           return $vector;
         }






      function  iterciones ($id_evaluacion,$id_usuario){

      $poblacion = array();

      $nuevapoblacion =array();

      $nuevofitness =0 ;

       
      $poblacion = poblacion ($id_evaluacion,$id_usuario);

    

      
          while ($nuevofitness < 15 ) {
            
              if ($nuevapoblacion == null ) {
               
                  $nuevapoblacion  =mutacionocruce($poblacion) ;
                     
                     $nuevofitness = calcularfitness($nuevapoblacion );


              } else {

                    $nuevapoblacion  =mutacionocruce($nuevapoblacion) ;
                     
                     $nuevofitness = calcularfitness($nuevapoblacion );


                    }

          }


      
   return $nuevofitness; 



      }





      function mutacionocruce ($vector ){


      $fitness =0 ;

      $vectorcruce = array();

      $vectorhijocm = array();

      $vectormutacuion = array();

         $fitness =  calcularfitness ($vector);


         if ($fitness > 8 ){
          
            $vectorhijocm =  mutacion($vector);

         } else if($fitness <= 8){
        
          $vectorcruce= cruce();

          $vectormutacion = mutacion( $vectorcruce);
           
             $vectorhijocm= $vectormutacion;
            }

         return $vectorhijocm;
       
      }





          
     function  cruce  ( $vector ){
       $contar1 = 0;
     $contar2=0;
      $nuevovector=array();

     $vectorhijo=array();


    $tamano = count($vector);

      $dividir = $tamano/2;


    
     for ($i=0; $i < $dividir ; $i++) { 
       
          if($vector[$i] == 1){
           
             $contar1++;

          } 

     }
    

    for ($i=$dividir; $i < $tamano; $i++) { 

       if($vector[$i]==1){
          $contar2++;

       }
   
    }

 //   echo "contar uno = ".$contar1;
//echo "contar dos =".$contar2;
     

     if($contar1< $contar2 ){
       
       for ($i=0; $i < $dividir; $i++) { 
         
           if($vector[$i] == 1){
              

              $nuevovector[$i] =0 ;

           } else if ($vector[$i]==0) {

             $nuevovector[$i]=1;

           }
         }


            
          // var_dump($nuevovector);
          
          for ($i=0; $i < $tamano; $i++) { 
            
              if($i < $dividir){

                 $vectorhijo[$i] = $nuevovector[$i];  

              } else if ( $i > $dividir ) {
                    $vectorhijo[$i] = $vector[$i];  
              }
          }

         

       
     

     }else if($contar1>$contar2){
       
              for ($i=$dividir; $i < $tamano; $i++) { 
         
           if($vector[$i] == 1){
              

              $nuevovector[$i] =0 ;

           } else if ($vector[$i]==0) {

             $nuevovector[$i]=1;

           }
         }


            
          // var_dump($nuevovector);
          
          for ($i=0; $i < $tamano; $i++) { 
            
              if($i < $dividir){

                 $vectorhijo[$i] = $vector[$i];  

              } else if ( $i > $dividir ) {
                    $vectorhijo[$i] = $nuevovector[$i];  
              }
          }




     }
     

     print( "otro HIJO -----------------------------------------------------------------------");


     var_dump($vectorhijo) ;


       return $vectorhijo;

     }




      function mutacion ($vectorhijo){

          $acum =0;

        $tamhijo  = count($vectorhijo);

      
        for ($i=0; $i <$tamhijo ; $i++) { 
           
           if($vectorhijo[$i] == 0 && $acum < 2){
                $vectorhijo[$i] = 1;

                $acum++;

           }

        }
          echo "vector mutado -----------";


          var_dump($vectorhijo);

        return $vectorhijo;



      }



      function evaluacion ($vectorpadre,$vectorhijo){
         
         $tampadre  = count($vectorpadre);
         $tamahijo = count($vectorhijo);

         $vectorresultado = array();


         $fitnesspadre = 0;
          $fitnesshijo = 0;

         for ($i=0; $i <$tampadre ; $i++) { 
             
              $fitnesspadre += $vectorpadre[$i];

         }

         for ($i=0; $i <$tamahijo ; $i++) { 
             
              $fitnesshijo += $vectorhijo[$i];

         }


         if($fitnesspadre > $fitnesshijo){
           
           $vectorresultado=$vectorpadre;

         } else if ($fitnesspadre < $fitnesshijo)  {

          $vectorresultado=$vectorhijo;
         } else if ($fitnesspadre == $fitnesshijo) {
          $vectorresultado=$vectorpadre;
         }

          echo "vector resultado ";
         var_dump($vectorresultado);
       return $vectorresultado;

          

      }




      function calcularfitness ($vectorpadre){
        
         $tampadres  = count($vectorpadre);
           $fitnesspadre = 0;

              for ($i=0; $i <$tampadres ; $i++) { 
             
              $fitnesspadre += $vectorpadre[$i];

         }
           
           return $fitnesspadre;
      }



 ?>