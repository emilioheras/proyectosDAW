<?php    
    require_once './lib/player.php';
    require_once './lib/connectionDB.php';
    session_start();
    //Creamos un objeto de bd (Crea la conexión).
    $connec = new ConnectionDB();
    
  /*Cada vez que incluyamos este código, se validará si hay una sesión iniciada.
  	Si no hay sesión iniciada nos redirige al formulario inicial de registro de jugador.*/
   if(!isset($_SESSION['player']) && isset($_POST['login'])){ 
        
        if (isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['age'])) {
            
            if ($connec->checkConnection() === 'ok'){
                $player = new Player($_POST['name'], $_POST['lastname'], $_POST['age']);        
                $_SESSION['player'] = $player;
                $connec->checkPlayer($player->getName(), $player->getLastName(), $player->getAge());
            }else{
                //$_SESSION['errorDB'] = "error";
                $_SESSION['errorDB'] = $connec;
                header('location: index.php');
            }
            
	    }else{
	       //Si los datos del formulario no están completos volvemos al formulario inicial de login.
	       header('location: index.php');
	    }
    }
     
    //Esto sucede cuando venimos del formulario de modificación de datos del usuario.
    if(isset($_POST['newdata'])) {
        
        if(isset($_POST['newname']) && isset($_POST['newlastname']) && isset($_POST['newage'])){
            
             //Extraemos el jugador de la sesión y seteamos los nuevos datos.
	         $player = $_SESSION['player'];
	         //Actualizamos la bd con los nuevos datos del jugador.
	         $connec->modifyDataPlayer($player->getName(), $player->getLastName(), $_POST['newname'], $_POST['newlastname'], $_POST['newage']);
	         $player->setName($_POST['newname']);
	         $player->setLastName($_POST['newlastname']);
	         $player->setAge($_POST['newage']);
	         //Sustituimos los datos de la sesión por los nuevos.
	         $_SESSION['player'] = $player;
	         
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


