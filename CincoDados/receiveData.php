<?php

    //Funci�n que muestra si los datos introducidos en el formulario de los dados son correctos y muestra el resultado mediante un
    //componente de Bootstrap llamado jumbotron. Mostrar� colores rojos si el usuario se ha equivocado y verdes si todo es correcto.
    function mensajeResultado(){
        
        $resultadoCorrecto = false; // Si es false mostrar� elementos color rojo, si es true, mostrar� elementos verdes.
        
             // Validamos que los campos no est�n vac�os.
             if($_POST['dado1'] === "" || $_POST['dado2'] === ""){
                 
                echo utf8_decode("<h1>Upss...   <span class='label label-danger'>��ERROR!!</span></h1>");
                echo utf8_decode("<br><br><p>Se te olvid� rellenar alguno de los campos. Deber�as volver atras y completar correctamente el formulario.</p>");
                
            // Validamos con los campos hidden que los datos que introduce el user sean correctos.
            }elseif($_POST['dado1'] != $_POST['hidDado1'] || $_POST['dado2'] != $_POST['hidDado2']){
                echo utf8_decode("<h1>Upss...   <span class='label label-danger'>��ERROR!!</span></h1>");
                echo utf8_decode("<br><br><p>El valor del primer dado es ".$_POST['hidDado1']." y has ingresado ".$_POST['dado1']."</p>");
                echo utf8_decode("<p>El valor del segundo dado es ".$_POST['hidDado2']." y has ingresado ".$_POST['dado2']."</p>");
                
            }else{
                $resultadoCorrecto = true;
                echo utf8_decode("<h1>Enhorabuena     <span class='label label-success'>��Resultado correcto!!</span></h1>");
                
                if($_POST['operacion'] === 'suma'){
                    
                    $resultado = intval($_POST['hidDado1']) + intval($_POST['hidDado2']);
                    echo "<br><h2>".$_POST['hidDado1']." + ".$_POST['hidDado2']." = ".$resultado."</h2>";
                }else{
                    $resultado = intval($_POST['hidDado1']) - intval($_POST['hidDado2']);
                    echo "<br><h2>".$_POST['hidDado1']." - ".$_POST['hidDado2']." = ".$resultado."<h2>";
                }
            }
            
            if (!$resultadoCorrecto){
                
                echo utf8_decode("<br><p><a class='btn btn-danger btn-lg' href='index.php' role='button'>Int�ntalo otra vez</a></p>");
                
            }else{
                echo utf8_decode("<br><p><a class='btn btn-success btn-lg' href='index.php' role='button'>Juega otra vez</a></p>");
            }
    }
?>