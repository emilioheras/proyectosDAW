<?php    
	require_once 'login.php';	 
	require_once 'functions.php';
  	require_once 'dace.php';
  	require_once './lib/page.php';
    
  	$pageGame = new Page();
  	echo $pageGame->getHeaderGame();

?>
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
                	<li><a href='#' onclick = ''>Normal</a></li>
                	<li><a href='#' onclick = 'cambiarJuego("junior")'>Junior</a></li>
                  	<li><a href='#' onclick = 'cambiarJuego("pro")'>Junior pro</a></li>
                </ul>
              </li>
			   <!--Segundo menú desplegable-->
               <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $menu['help'][$language];?>
                <span class="caret"></span></a>
                <ul class="dropdown-menu">

          			<?php
          				escribeSubmenu ($menu, 'submenu2', $language);
          			?> 
          			
                </ul>
              </li>
            </ul>
            <!--Botones del extremo derecho superior-->
            <ul class="nav navbar-nav navbar-right">
            <li><a href="userData.php"><span class="glyphicon glyphicon-user"></span><strong> Perfil</strong></a></li>


				<li class="dropdown">
	                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo "<strong> Hola ".$player->getName()."</strong>"?>
	                <span class="caret"></span></a>
		                <ul class="dropdown-menu">
			                <li><a href='#'><?php echo "<strong>Apellido: ".$player->getLastName()."</strong>"?></a></li>
			              	<li><a href='#'><?php echo "<strong>Edad: ".$player->getAge()."</strong>"?></a></li>
		                </ul>
              	</li>



              <li><a href="#"><span class="glyphicon glyphicon-thumbs-up"></span><?php echo "<strong> Puntos: ".$player->getScore()."</strong>"?></a></li>
              
            </ul>
          </div>
        </div>
     </nav>
     </div>	<!-- navbar -->
	  	
	<!-- Contenedor global -->
    <div class="container"> 
    	<!-- Texto que muestra el tipo de juego según la edad del usuario -->
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-muted" id="rotulo">math dice junior +</h1>			
			</div>
		</div>
	
	<!-- Dados -->
	<div class="row">
		<!-- Dodecaedro -->
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class='col-md-4 dodec'>
					<!--<img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">-->
					<img src='img/dodec-<?php $dodecaedro=generarNumAleatorio('dodecaedro'); echo $dodecaedro; ?>.png'></img>
				</div>
				<div class="col-md-4">
				</div>
			</div>

			<!-- Dados 3 caras -->
			<div class="row">
				<div class="col-md-3">
				</div>					
				<div class='col-md-3 img'>
					<img src='img/Dice3-<?php $dado1=generarNumAleatorio('dace3'); echo $dado1; ?>.png' id='dado1' onclick='pulsarDado("dado1", <?=$dado1;?>)'>
				</div>
				<div class='col-md-3 img'>
						<img src='img/Dice3-<?php $dado2=generarNumAleatorio('dace3'); echo $dado2; ?>.png' id='dado2' onclick='pulsarDado("dado2", <?=$dado2;?>)'>
				</div>			
				<div class="col-md-3">
				</div>
			</div>

			<!-- Dados 6 caras -->
			<div class="row">
				<div class='col-md-4 img'>
					<img src='img/Dice-<?php $dado3=generarNumAleatorio('dace6'); echo $dado3; ?>.png' id='dado3' onclick='pulsarDado("dado3", <?=$dado3;?>)'>
				</div>
				<div class='col-md-4 img'>
					<img src='img/Dice-<?php $dado4=generarNumAleatorio('dace6'); echo $dado4; ?>.png' id='dado4' onclick='pulsarDado("dado4", <?=$dado4;?>)'>
				</div>
				<div class='col-md-4 img'>
					<img src='img/Dice-<?php $dado5=generarNumAleatorio('dace6'); echo $dado5; ?>.png' id='dado5' onclick='pulsarDado("dado5", <?=$dado5;?>)'>
				</div>
			</div>
		</div>
	
		<!-- Pantalla operaciones y resultados -->
		<div class="col-md-4 marcador">
			<div class="jumbotron" style="height: 25em;">
				<h2>Operaciones</h2>
				<br><br>
				<p id="operaciones"></p>
				<!--<p>
					<a class="btn btn-primary btn-large" href="#">Learn more</a>
				</p>-->
			</div>
			<!-- Formulario oculto de valores de dados y operaciones -->
			<form action="showResult.php" method="post">
				<input type="hidden" name="dado1" id="campoDado1"><!--Nos sirve para comparar y validar el valor del dado-->
				<input type="hidden" name="operacion1" id="operacion1"><!--Nos sirve para comparar y validar el valor de la operación-->
				<input type="hidden" name="dado2" id="campoDado2">
				<input type="hidden" name="operacion2" id="operacion2">
				<input type="hidden" name="dado3" id="campoDado3">
				<input type="hidden" name="operacion3" id="operacion3">
				<input type="hidden" name="dado4" id="campoDado4">
				<input type="hidden" name="operacion4" id="operacion4">
				<input type="hidden" name="dado5" id="campoDado5">
				<input type="hidden" name="dodecaedro" id="dodecaedro" value="<?php echo $dodecaedro ?>">
				<!-- Botón math dice -->  
				<button type="submit" id="mathdice" class="btn btn-block btn-lg btn-info">math dice</button>
			</form>			
		</div>
	</div>



	<!-- Botones de operaciones -->
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3 operation por">
					<span class="pushbutton" id= "multiplicar" onclick="pulsarOperador('multiplicar', '*')"><a href="#"><img src="./img/multi.png"></a></span>
				</div>
				<div class="col-md-3 operation mas">
					<span class="pushbutton" id= "sumar" onclick="pulsarOperador('sumar', '+')"><a href="#"><img src="./img/mas.png"></a></span>
				</div>
				<div class="col-md-3 operation men">
					<span class="pushbutton" id= "restar" onclick="pulsarOperador('restar', '-')"><a href="#"><img src="./img/menos.png"></a></span>
				</div>
				<div class="col-md-3 operation divi">
					<span class="pushbutton" id= "dividir" onclick="pulsarOperador('dividir', '/')"><a href="#"><img src="./img/divi.png"></a></span>
				</div>
			</div>
		</div>
	</div>
</div>

 	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>		
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
  
</html>