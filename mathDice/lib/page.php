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
				  <head>
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
			        <!-- Latest compiled and minified JavaScript -->
			        <link rel='stylesheet' href='./css/style.css' type='text/css' /> 
			      </head>
EOT;
	

		private $footer = <<<EOT
		<!-- Pie de página -->
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>		
		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
EOT;


		//Constructor.
		function __construct(){
			
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