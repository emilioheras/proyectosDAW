<?php

    function finalizarJugada($string, $resultado, $dodecaedro){
        global $player, $connec, $pageGame;
            
            $string .= " = ".$resultado; //El string completo de la operación que mostraremos en el resumen.
            $imgHead = "";
            $modalBody = "";        
            $modalFooter = "";
    
            //Si la operación del usuario es correcta. Resultado nunca debe ser > el valor del dodecaedro.
            if ($resultado <= $dodecaedro) {
                
                //Agregamos los puntos coseguidos al jugador.
                $player->setScore($resultado);
                
                //Felicitaremos al jugador. Añadimos los datos al jumbotron.
               
                $imgHead = "ok";
                $modalBody = "Perfecto";
                $modalFooter = "success";
                
    
                //Si el resultado es error (resultado > valor del dodecaedro).
            } else {
                //Si el resultado es incorrecto, le restaremos la puntuación errónea al jugador y daremos el pésame..
                $player->setScore(-$resultado);
                $imgHead = "fail";
                $modalBody = "Lo siento";
                $modalFooter = "danger";
            }
            
            //Actualizamos los puntos del jugador en la bd.
            $connec->insertScore($player->getName(), $player->getLastName(), $player->getScore());
            
            $pageGame->getOperationResult($imgHead, $modalBody, $string, $modalFooter, $dodecaedro);
        }
    
        /*Función que realiza la operación con los datos recibidos del formulario de los dados y muestra el resultado mediante un
        jumbotron. Mostrará colores rojos si el usuario se ha equivocado y verdes si todo es correcto.*/
        function mensajeResultado(){
            
            if (isset($_POST['result'])){
            
                //Variables para ir haciendo las operaciones de forma progresiva. Solo se efectua la operación cuando valor2 no esté vacío.
                //Quiere decir que si valor2 contien un valor, obligatoriamente ya tendrán valor valor1 y operador (Ya tendríamos una operación pendiente)
                //Una vez realizada la operación, el resultado pasa a ser el valor1 y operador y valor2 pasan a estar vacío (libres para volver a llenarse).
                
                $valor1 = "";
                $operador = "";
                $valor2 = 0;
                $resultado = 0;
                $valorDodecaedro = 0;
                $stringOperacion = "";
        
        
                //Recorremos el array post para ir realizando las operaciones.
                foreach ($_POST as $key => $value) {
                    //Si damos con un campo vacío o si es el valor del dodecedro, nos saltamos el elemento del array.
                    //Buscamos extraer del array los valores de los dados y los operadores para ir haciendo las operaciones.
                    if ($key != 'dodecaedro' && $value != "") {
                        //Vamos añadiendo los valores del array a un string, para mostrar al final el resumen de la operación al usuario.
                        $stringOperacion .= $value;
        
                        switch ($value) {
                            //En cada iteración, vamos almacenando el valor del operador para ir haciendo las operaciones de forma progresiva..
                            case '+': case '-': case '*': case '/':
                                $operador = $value;
                                break;
                            //Si el valor obtenido del array no es un operador, será un número.
                            default:
                                //Al principio, valor1 estará vacío. Solo daremos valor a valor1 al iniciar el recorrido del bucle.
                                if ($valor1 === "") {
                                    
                                    $valor1 = intval($value);
                                //Damos valor a valor2. Querrá decir que ya tenemos una operación lista pra realizarse.
                                } else {
                                    //Solo daremos valor a valor2 cuando valor1 y operador ya tengan valor.
                                    $valor2 = intval($value);
                                    //Dependiendo el signo del operador, realizaremos la operación correspondiente que se almacena en resultado.
                                    //Hecha la operación pendiente, limpiamos operador y valor2 y el resultado lo pasamos a valor1.
                                    switch ($operador) {
                                        case '+':
                                            $resultado = $valor1 + $valor2;
                                            $valor1 = $resultado;
                                            break;
                                        case '-':
                                            $resultado = $valor1 - $valor2;
                                            $valor1 = $resultado;
                                            break;
                                        case '*':
                                            $resultado = $valor1 * $valor2;
                                            $valor1 = $resultado;
                                            break;
                                        case '/':
                                            $resultado = $valor1 / $valor2;
                                            $valor1 = $resultado;
                                            break;
                                    }//Fin del segundo switch.                            
                                } 
                                break;
                        }//Fin del primer switch.
                    //Si damos con el valor del dodecedro, lo guardamos para comparar al final.
                    }else if ($key === 'dodecaedro') {
                        //Almacenamos el valor del dodecaedro también para mostrarlo al final en el string de resumen de la operación. 
                        $valorDodecaedro = $value;
                    }
                } //Fin del bucle.
        
                
                finalizarJugada($stringOperacion, $resultado, $valorDodecaedro);
            }
      }
      
      mensajeResultado();
    

?>