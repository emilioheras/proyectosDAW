<?php    
    //Esta página mostrará el resultado de la operación  (formulario de los dados).
    require_once 'receiveData.php';
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
    <!--Las tres lineas siguentes incorporan Bootstrap al proyecto -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
    
    <div class="container">
        <!-- Elemento jumbotron para mostrar el resultado del formulario de los dados.-->
        <div class="jumbotron">
                <?php
                    mensajeResultado();                    
                ?>
        </div>
    </div>
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>   
</body>
</html>

