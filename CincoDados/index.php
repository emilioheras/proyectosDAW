<?php
  include "functions.php";
  include "dace.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Math Dice</title>
	<!--Las tres lineas siguentes incorporan Bootstrap al proyecto -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/myStyle.css" type="text/css" />
</head>
<body>
	
	 <!--Menú superior especial para dispositivos móviles. El menú se minimizará a un solo botón-->
	 <div  class="container">
     <nav class="navbar navbar-inverse">
        <div>
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span> 
            </button>
            <a class="navbar-brand" href="#"><?php echo $menu['title'][$language];?></a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
			    <!--Inicio de los botones del menú superior-->
            <ul class="nav navbar-nav">
              <li class="active"><a href="#"><?php echo $menu['general'][$language];?></a></li>
              <!--Primer menú desplegable-->
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $menu['game'][$language];?>
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  
          			<?php
          				escribeSubmenu ($menu, 'game', 'submenu', $language);
          		  ?> 
          		    
                </ul>
              </li>
			         <!--Segundo menú desplegable-->
               <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $menu['help'][$language];?>
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  
          			<?php
          				escribeSubmenu ($menu, 'help', 'submenu2', $language);
          			?> 
          			
                </ul>
              </li>
            </ul>
            <!--Botones del extremo derecho superior-->
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
          </div>
        </div>
     </nav>
     </div>

     <!-- Contenedor de dados y formulario -->
      <div class="container">
        <div class="row">
          
          <!-- Seis dados -->
          <?php
            crear6Dados();
          ?>
          
        </div>
        <div class="row">
          <!-- Dado aleatorio 1 -->
          <div class='col-sm-3 col-md-2 col-md-offset-2 dice'>
            <h3>Dado 1</h3>
            <img src='img/Dice-<?php $dado1=generarNumAleatorio(); echo $dado1; ?>.png' class='img-responsive dice'></img>
          </div>
          <!-- Dado aleatorio 2 -->
          <div class='col-sm-3 col-md-2 dice'>
            <h3>Dado 2</h3>
            <img src='img/Dice-<?php $dado2=generarNumAleatorio(); echo $dado2; ?>.png' class='img-responsive dice'></img>
          </div>
          
          <!-- Formulario de los dados -->
          <div class='col-xs-7 col-sm-3 col-sm-offset-1 col-md-2 col-md-offset-1'>
            <form action="showResult.php" method="post">
              <div class="form-group">
                <label for="dado1">Dado 1</label>
                <input type="text" class="form-control input-lg" name="dado1" maxlength = "1" placeholder="Valor dado 1">
                <input type="hidden" name="hidDado1" value="<?php echo $dado1 ?>"><!--Nos sirve para comparar y validar los datos del user-->
              </div>
              <div class="form-group">
                <label for="dado2">Dado2</label>
                <input type="text" class="form-control input-lg" name="dado2" maxlength = "1" placeholder="Valor dado 2">
                <input type="hidden" name="hidDado2" value="<?php echo $dado2 ?>"><!--Nos sirve para comparar y validar los datos del user-->
              </div>
              <div class="form-group">
              
              <label class="radio-inline">
                <input type="radio" name="operacion" id="suma" checked="checked"  value="suma"> Suma
              </label>
              <label class="radio-inline">
                <input type="radio" name="operacion" id="resta" value="resta"> Resta
              </label>
              
              </div>
              <button type="submit" class="btn btn-warning">Resultado</button>
            </form>
          </div>
        </div>
     </div>
    

     
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>