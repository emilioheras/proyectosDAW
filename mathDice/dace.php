<?php
    
    /*La función devuelve un número aleatorio del 1 al 12 para el dodecaedro, 
    del 1 al 6 para dados 6 caras, y del 1 al 3 para los de tres caras.
    El número nos servirá para escoger la imagen que se mostrará de los dados.*/
    function generarNumAleatorio($dace){
        
        if ($dace === "dace6") {

            $numeroAleatorio = rand(1, 6);
            

        } else if ($dace === "dace3") {
            
            $numeroAleatorio = rand(1, 3);

        } else if ($dace === "dodecaedro") {
            
            $numeroAleatorio = rand(1, 12);

        }
        return $numeroAleatorio;        
    }    

?>