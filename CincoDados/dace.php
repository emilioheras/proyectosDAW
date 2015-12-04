<?php
    
    //La función devuelve un número aleatorio entre el 1 y el 6.
    function generarNumAleatorio(){
        
        $numeroAleatorio = rand(1, 6);
        return $numeroAleatorio;
    }
    
    //Creamos los seis dados.
    function crear6Dados(){
        
        for($i=1; $i<=6; $i++){
            
            echo "<div class='col-xs-5 col-sm-4 col-md-2 dice'><img src='img/Dice-".$i.".png' class='img-responsive dice'></img></div>";
            
          }
    }

?>