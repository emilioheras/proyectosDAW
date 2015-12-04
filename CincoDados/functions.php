<?php

    // Variable para establecer el idioma del menu.
	$language = "es";
	
	
    // Array de los botones del menu superior.
	$menu = array('title' => array('es' => "Math Dice", 'en' => "Math Dice"),
                  'general'=> array('es' => "Inicio", 'en' => "Home"),
				  'game' => array('es' => 'Modo de juego', 'en' => 'Game mode', 
				                  'submenu' => array('mode1' => array('es' => "Modo normal", 'en' => "Normal mode"),
				 							 	                     'mode2' => array('es' => "Modo pro", 'en' => "Pro mode"),
				 							 	                     'mode3' => array('es' => "Modo infantil", 'en' => "Kid mode"))),
				  'help' => array('es' => "Ayuda", 'en' => "Help",
				                  'submenu2' => array('mode1' => array('es' => "Instrucciones", 'en' => "Tutorial"),
				 							 	                      'mode2' => array('es' => "Escríbenos", 'en' => "Contact us"),
				 							 	                      'mode3' => array('es' => "Versión", 'en' => "Version"))));
				 							 	                      
				 							 	                      
				 							 	                      
	// Funciones:
	
	//La función construye un submenú dentro de un botón del menú superior de index.php.
	//Los parámetros $string1, $string2 son claves del array asociativo $menu.
	function escribeSubmenu ($menu, $string1, $string2, $language){
	  
	  foreach ($menu as $clave => $valor) {
          						    
      	if ($clave === $string1){
          						    	
         foreach ($valor as $cla => $va){
          						    		
          	if ($cla === $string2) {
          						    			
          		foreach ($va as $v){
          						    			
          		echo "<li><a href='#'>".$v [$language]."</a></li>";
          						    			
          		 }
          	}
          }
        }
      }
	}
	
	/*foreach ($menu['help']['submenu2'] as $value) {
							echo "<li><a href='#'>".$value [$language]."</a></li>"; 		
						}*/
?>