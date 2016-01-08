<?php
  	require_once 'dace.php';
  	require_once './lib/page.php';

  	$pageGame = new Page();
  	echo $pageGame->getHeaderGame();
	require_once 'login.php';
	require_once 'operations.php';
?>

  <body onload="showModalWindow()">
  	
	<?php
		//Barra superior de navegación.
		$pageGame->getNavBar();
		//Formulario modal oculto para modificar los datos del jugador (botón perfil).
		$pageGame->getNewDataForm();
	?>
	  	
	<!-- Contenedor global de dados y botones -->
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
			<div id="pantalla">
				<h1> Operaciones:</h1>
				<h1 id="operaciones"></h1>
			</div>
			<!-- Formulario oculto de valores de dados y operaciones -->
			<form action="play.php" method="post">
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
				<input type='hidden' name='result'/>
				<!-- Botón math dice -->  
				<button type="submit" id="mathdice" class="btn btn-block btn-lg btn-info btn-large">math dice</button>
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

	<?php
		//Pie de página.
		echo $pageGame->getFooter();
	?>
</body>
</html>