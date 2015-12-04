<?php    
    require_once './lib/player.php';
    session_start();
    
  /*Cada vez que incluyamos este código, se validará si hay una sesión iniciada.
  	Si no hay sesión iniciada nos redirige al formulario inicial de registro de jugador.*/	

   if(!isset($_SESSION['player']) && isset($_POST['login'])){ 
        
        if (isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['age'])) {
            
            //Si los datos están completos, creamos la sesión y el objeto jugador.
            $player = new Player($_POST['name'], $_POST['lastname'], $_POST['age']);        
            $_SESSION['player'] = $player;
            header('location: play.php');
            
	    }else{
	       //Si los datos del formulario no están completos volvemos al formulario inicial de login.
	       header('location: index.php'); 
	    }
    }
     
    //Esto sucede cuando venimos del formulario de modificación de datos del usuario.
    if(isset($_POST['newdata'])) {
        
        if(isset($_POST['newname']) && isset($_POST['newlastname']) && isset($_POST['newage'])){
            
            //extraemos el jugador de la sesión y seteamos los nuevos datos.
	         $player = $_SESSION['player'];
	         $player->setName($_POST['newname']);
	         $player->setLastName($_POST['newlastname']);
	         $player->setAge($_POST['newage']);
	         //Sustituimos los datos de la sesión por los nuevos.
	         $_SESSION['player'] = $player;
	         //Volvemos al juego.
	         header('location: play.php');
            
	     }else{
	         //Si los datos del formulario no están completos volvemos al formulario de cambio de perfil.
	         header('location: userData.php');
	     }  
    }
    //Si no venimos de ningún formulario.
    //Obtenemos el objeto de la sesión siempre que lo necesitemos. 
    if(!isset($_SESSION['player'])) {    

	        header('location: index.php');      
    
		}else{

		  $player = $_SESSION['player'];

		}
?>


