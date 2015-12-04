
<?php

	// Variable para establecer el idioma del menu.
	$language = "en";	
	
	// Array de los botones del menu superior.
	$menu = array('title' => array('es' => "Math Dice", 'en' => "Math Dice"),
                  'general'=> array('es' => "Inicio", 'en' => "Home"),
				  'game' => array('es' => 'Modo de juego', 'en' => 'Game mode', 
				                  'submenu' => array('mode1' => array('es' => "Modo normal", 'en' => "Normal mode"),
				 							 	                     'mode2' => array('es' => "Junior pro", 'en' => "Junior pro"),
				 							 	                     'mode3' => array('es' => "Junior", 'en' => "Junior"))),
				  'help' => array('es' => "Ayuda", 'en' => "Help",
				                  'submenu2' => array('mode1' => array('es' => "Instrucciones", 'en' => "Tutorial"),
				 							 	                      'mode2' => array('es' => "Escríbenos", 'en' => "Contact us"),
				 							 	                      'mode3' => array('es' => "Versión", 'en' => "Version"))));


	//Carga el botón desplegable de la barra de navegación de la pantalla del juego.
	function escribeSubmenu ($menu, $string1, $language){
         foreach ($menu as $va){
          						    		
          	if (isset($va[$string1])) {          	
          						    			
          		foreach ($va[$string1] as $v){ 

          				echo "<li><a href='#'>".$v[$language]."</a></li>";		    			
          		 }
          	}         
      	}
	}




/*function submenuJuegos ($menu, $string1, $language){
         foreach ($menu as $va){
          						    		
          	if (isset($va[$string1])) {          	
          						    			
          		foreach ($va[$string1] as $v){         		
          			
          			//Añadimos un onclick a los items del desplegable para poder cambiar el tipo de juego.
          			if($v[$language] === "Junior pro"){

          				echo '<li><a href="#" onclick = "cambiarJuego("pro")>'.$v[$language].'</a></li>';

          			}else if($v[$language] === "Junior"){

          				echo '<li><a href="#" onclick = "cambiarJuego("junior")>'.$v[$language].'</a></li>';

          			}else{
          				echo '<li><a href="#" onclick = "">'.$v[$language].'</a></li>';
          			}		    			
          		 }
          	}         
      	}
	}*/		
			
?>
