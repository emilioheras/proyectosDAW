<?php    
    require_once 'login.php';
    
    function finalizarJugada($string, $resultado, $dodecaedro){
        global $player;
        $resultadoCorrecto = false; // Si es false mostrará elementos color rojo, si es true, mostrará elementos verdes.
        $string .= " = ".$resultado;

        //Si la operación del usuario es correcta.
        if ($resultado <= $dodecaedro) {
            
            //Agregamos los puntos coseguidos al jugador.
            $player->setScore($resultado);

            $resultadoCorrecto = true;
           // echo "<h1>Enhorabuena ".$player->getName()."<span class='label label-success'> ¡¡Resultado correcto!!</span></h1>";
            echo "<h1>Enhorabuena ".$player->getName(). "<span class='label label-success'> ¡¡Resultado correcto!!</span></h1>";
            echo "<br><h2>La operación: ".$string." es correcta.</h2>";             

        } else {
            //Si el resultado es incorrecto, le restaremos la puntuación errónea al jugador.
            $player->setScore(-$resultado);
            //echo "<h1>Lo siento ".$player->getName()."<span class='label label-danger'> ¡¡Resultado incorrecto!!</span></h1>";
            echo "<h1>Lo siento <span class='label label-danger'> ¡¡Resultado incorrecto!!</span></h1>";
            echo "<br><h2>La operación: ".$string." es errónea.</h2>";
        }

        //Mostramos el color del botón (rojo/mal y verde/OK).
            if (!$resultadoCorrecto){
                
                echo ("<br><p><a class='btn btn-danger btn-lg' href='play.php' role='button'>Inténtalo otra vez</a></p>");
                
            }else{
                echo ("<br><p><a class='btn btn-success btn-lg' href='play.php' role='button'>Juega otra vez</a></p>");
            }
        

    }

    //Función que realiza la operación con los datos recibidos del formulario de los dados y muestra el resultado mediante un
    //componente de Bootstrap llamado jumbotron. Mostrará colores rojos si el usuario se ha equivocado y verdes si todo es correcto.
    function mensajeResultado(){
        
        $valorDodecaedro = 0;
        $valor1 = "";
        $operador = "";
        $valor2 = 0;
        $resultado = 0;        
        $stringOperacion = "";


        //Recorremos el array post para ir realizando las operaciones.
        foreach ($_POST as $key => $value) {
            //Si damos con un campo vacío o si es el valor del dodecedro, no hacemos nada.
            if ($key != 'dodecaedro' && $value != "") {
                //Vamos añadiendo los valores del array a un string para mostrarlo al usuario al final.
                $stringOperacion .= $value;

                switch ($value) {
                    case '+': case '-': case '*': case '/':
                        $operador = $value;
                        break;
                    
                    default:
                        
                        if ($valor1 === "") {

                            $valor1 = intval($value);

                        } else {
                            
                            $valor2 = intval($value);

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

                $valorDodecaedro = $value;
            }
        } //Fin del bucle.

        
        finalizarJugada($stringOperacion, $resultado, $valorDodecaedro);
    }
?>