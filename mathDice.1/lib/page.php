<?php	
	class Page{

private $headerGame = <<<EOT
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Math dice Juego</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="author" content="Emilio Heras DAW">
<link rel="icon" href="../../favicon.ico">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<!-- CSS Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<!-- my links -->
<link rel="stylesheet" href="./css/game.css" type="text/css"/>
<script type='text/javascript' src='./js/jsFunctions.js'></script>
</head>
EOT;

private $headerIndex = <<<EOT
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<title>Math dice</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">     
<meta name="Pantalla login de Math dice" content="">
<meta name="author" content="Emilio Heras">
<link rel="icon" href="../../favicon.ico">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<!-- CSS Bootstrap -->
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' integrity='sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7' crossorigin='anonymous'>
<!-- Optional theme -->
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css' integrity='sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r' crossorigin='anonymous'>
<link rel="stylesheet" href="./css/style.css" type="text/css"/>
<script type='text/javascript' src='./js/jsFunctions.js'></script>
</head
EOT;



private $footer = <<<EOT
<!-- Pie de página -->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
EOT;



		//Constructor.
		function __construct(){
			
		}
		
		public function getNavBar(){
			global $player;
			echo "<!--Menú superior especial para dispositivos móviles. El menú se minimizará a un solo botón-->
				  <div  class='container'>
					<nav class='navbar navbar-inverse'>
					<div>
					<div class='navbar-header'>
						<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span> 
						</button>
						<a class='navbar-brand' href='#'>Math Dice</a>
					</div>
					<div class='collapse navbar-collapse' id='myNavbar'>
					<!--Inicio de los botones del menú superior-->
            		<ul class='nav navbar-nav'>
              			<li class='active'><a href='exit.php'><span class='glyphicon glyphicon-log-out'></span> Salir del juego</a></li>
              			<!--Primer menú desplegable-->
              			<li class='dropdown'>
               			 <a class='dropdown-toggle' data-toggle='dropdown' href='#'>Modo de juego<span class='caret'></span></a>
			                <ul class='dropdown-menu'>
			                	<li><a href='#' onclick = ''>Normal</a></li>
			                	<li><a href='#' onclick = 'cambiarJuego(\"junior\")'>Junior</a></li>
			                  	<li><a href='#' onclick = 'cambiarJuego(\"pro\")'>Junior pro</a></li>
			                </ul>
	              		</li>
					   <!--Segundo menú desplegable-->
		               <li class='dropdown'>
		                <a class='dropdown-toggle' data-toggle='dropdown' href='#'>Ayuda
		                <span class='caret'></span></a>
		                <ul class='dropdown-menu'>
							<li><a href='#' onclick = ''>Instrucciones</a></li>
		                	<li><a href='#' onclick = ''>Escríbenos</a></li>
		                  	<li><a href='#' onclick = ''>Versión</a></li>
		                </ul>
		              </li>
		            </ul>
		            <!--Botones del extremo derecho superior-->
		            <ul class='nav navbar-nav navbar-right'>
			            <li><a href='#windowForm' data-toggle='modal'><span class='glyphicon glyphicon-user'></span><strong> Perfil</strong></a></li>
						<li class='dropdown'>
			                <a class='dropdown-toggle' data-toggle='dropdown' href='#'><strong> Hola ".$player->getName()."</strong>
			                <span class='caret'></span></a>
				                <ul class='dropdown-menu'>
					                <li><a href='#'><strong>Apellido: ".$player->getLastName()."</strong></a></li>
					              	<li><a href='#'><strong>Edad: ".$player->getAge()."</strong></a></li>
				                </ul>
		              	</li>
		              <li><a href='#'><span class='glyphicon glyphicon-thumbs-up'></span><?php echo '<strong> Puntos: <span class='badge'>".$player->getScore()."</span></strong></a></li>
		            </ul>
		          </div>
		        </div>
		     </nav>
		     </div>	<!-- navbar -->";
		}
		
		
		public function getNewDataForm(){
			global $player;
			echo "<!-- Formulario modal para la actualización de datos del usuario (botón Perfil del navBar) -->
				  <div class='modal fade' tabindex='-1' role='dialog' id='windowForm'>
                	  <div class='modal-dialog'>
                	    <div class='modal-content'>
                	      <div class='modal-header'>
                	        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                	        <h2 class='text-center'><img src='./img/User-Ico.png' class='img-circle'><br>Nuevos datos personales</h2>
                	      </div>
                	      <div class='modal-body'>
                	        	<form class='form-signin' action='play.php' method='post'>
							        <div class='form-group'>
							        <div class='input-group'>
							            <span class='input-group-addon'>Nombre:</span>
							            <input type='text' name='newname' id='newname' class='form-control' value=".$player->getName()." required autofocus>
							            <input type='hidden' name='newdata'/>
							          </div>
							        </div>
							        <div class='form-group'>
							          <div class='input-group'>
							            <span class='input-group-addon'>Apellido:</span>
							            <input type='text' name='newlastname' id='newlastname' value=".$player->getLastName()." class='form-control' required>
							          </div>          
							        </div>
							        <div class='form-group'>
							          <div class='input-group'>
							            <span class='input-group-addon'>Edad:</span>
							            <input type='text' name='newage' id='newage' value=".$player->getAge()." class='form-control' required>
							          </div>          
							        </div>
							        <div class='form-group'> 
							            <button class='btn btn-lg btn-info btn-block' type='submit'>Actualizar datos</button>
							        </div>
							    </form>
                	      </div>
                	    </div><!-- /.modal-content -->
                	  </div><!-- /.modal-dialog -->
                	</div><!-- /.modal -->";
		}
		
		
		public function getOperationResult($img, $phr, $tring, $button){
			   global $player, $dodecaedro;
			   echo "<div class='modal fade' tabindex='-1' role='dialog' id='showResult'>
                              <div class='modal-dialog'>
                                <div class='modal-content'>
                                  <div class='modal-header'>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                    <h2 class='text-center'><img src='./img/".$img.".png' class='img-circle'><br>¡¡".$phr." ".$player->getName()."!!</h2>
                                  </div>
                                  <div class='modal-body'>
                                    <h2>El valor del dodecaedro era: ".$dodecaedro.".</h2>
                                    <h2>".$string."</h2>
                                  </div>
                                  <div class='modal-footer'>
                                    <button type='button' class='btn btn-".$button."' data-dismiss='modal'>Jugar otra vez</button>         
                                </div>
                                </div><!-- /.modal-content -->
                              </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->";
		}



		//Getters & Setters.
		public function getHeaderGame(){
			return $this->headerGame;
		}

		public function getHeaderIndex(){
			return $this->headerIndex;
		}

		public function getFooter(){
			return $this->footer;
		}

		public function setHeaderGame($string){
			$this->headerGame = $string;
		}

		public function setHeaderIndex($string){
			$this->headerIndex = $string;
		}

		public function setFooter($string){
			$this->footer = $string; 
		}
	}
?>