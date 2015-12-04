
var pulsarOperadores = false;
var numDadosPulsados = 0;
//Número de veces que se pulsan los botones de operaciones.
var contadorOperaciones = 0;


 function cambiarJuego(tipo){
     
     var botonMul = document.getElementById("multiplicar");
     var botonDiv = document.getElementById("dividir");
     var rotulo = document.getElementById("rotulo");
     var contRotulo = rotulo.innerHTML;

    if (tipo === 'pro') {

    	botonMul.style.visibility = 'visible';
     	botonDiv.style.visibility = 'visible';
     	document.body.style.backgroundImage = 'url(./img/cuadrados.jpg)';
     	rotulo.innerHTML = "math dice junior +";

            
     }else if(tipo === 'junior') {

     	botonMul.style.visibility = 'hidden';
     	botonDiv.style.visibility = 'hidden';
     	document.body.style.backgroundImage = 'url(./img/junior3.jpg)';
        rotulo.innerHTML = "math dice junior";   
     }
 };


//Función que hace que se muestre el botón math dice cuando haya una operación disponible.
function mostrarBotonMath(){
	//Capturamos el botón math dice de resultados para hacerlo visible después.
	var botonMath = document.getElementById("mathdice");

	//Mostramos el botón mathdice si hemos pulsado dos dados
	if(numDadosPulsados === 2){
		botonMath.style.visibility = 'visible';
	}
}

//Función que se realiza cuando pulsamos un botón operador.
function pulsarOperador(elemento, valor){
	//Capturamos los botones de operaciones.
	var botonSum = document.getElementById("sumar");
	var botonRes = document.getElementById("restar");
	var botonMul = document.getElementById("multiplicar");
	var botonDiv = document.getElementById("dividir");
	//Capturamos el valor de la pantalla para modificarla cuando pulsemos un valor.
	var pantalla = document.getElementById("operaciones");
	var contPantalla = pantalla.innerHTML;

	if(pulsarOperadores && contadorOperaciones < 4){
		
		switch(elemento){

			case "sumar": case "restar": case "multiplicar": case "dividir":
				/*Los campos ocultos de operaciones se van rellenando de forma progresiva
				  dependiendo del número de pulsaciones en los botones de operadores.
				  De esta forma, obtenemos un array ordenado en la variable post*/
				if(contadorOperaciones === 0){
					var campoOp1 = document.getElementById("operacion1");
					campoOp1.value = valor;
				}else if(contadorOperaciones === 1){
					var campoOp2 = document.getElementById("operacion2");
					campoOp2.value = valor;
				}else if(contadorOperaciones === 2){
					var campoOp3 = document.getElementById("operacion3");
					campoOp3.value = valor;
				}else if(contadorOperaciones === 3){
					var campoOp4 = document.getElementById("operacion4");
					campoOp4.value = valor;
				}
				break;			
		};
		//Mostramos el operador pulsado en la pantalla.
		pantalla.innerHTML = contPantalla += valor;		
		pulsarOperadores = false;
		contadorOperaciones++;

	}	

};

//Función que se realiza cuando pulsamos un dado.
function pulsarDado(elemento, valor){
	//Capturamos los dados.
	var dado1 = document.getElementById("dado1");
	var dado2 = document.getElementById("dado2");
	var dado3 = document.getElementById("dado3");
	var dado4 = document.getElementById("dado4");
	var dado5 = document.getElementById("dado5");	
	//Capturamos el valor de la pantalla para modificarla cuando pulsemos un valor.
	var pantalla = document.getElementById("operaciones");
	var contPantalla = pantalla.innerHTML;
	

	if(!pulsarOperadores){

		switch(elemento){

			case "dado1": case "dado2": case "dado3": case "dado4": case "dado5":
				/*Los campos ocultos de dados se van rellenando de forma progresiva,
				  es decir, los valores se irán añadiendo en el mismo orden que hayamos 
				  pulsado los dados y de esta forma, obtenemos un array ordenado en la 
				  variable post para poder recorrerlo y obtener los datos en el mismo
				  orden de pulsación*/
				if(numDadosPulsados === 0){
					var campo1 = document.getElementById("campoDado1");
					campo1.value = valor;

				}else if(numDadosPulsados === 1){
					var campo2 = document.getElementById("campoDado2");
					campo2.value = valor;
				}else if(numDadosPulsados === 2){
					var campo3 = document.getElementById("campoDado3");
					campo3.value = valor;
				}else if(numDadosPulsados === 3){
					var campo4 = document.getElementById("campoDado4");
					campo4.value = valor;
				}else if(numDadosPulsados === 4){
					var campo5 = document.getElementById("campoDado5");
					campo5.value = valor;
				}			
				break;
		};

		//Mostramos el valor del dado en la pantalla de operaciones.		
		pantalla.innerHTML = contPantalla += valor;		
		pulsarOperadores = true;
		//aumentamos en número de dados pulsados para mostrar el botón math dice.
		numDadosPulsados ++;
		ocultarDado(elemento);
		mostrarBotonMath();	

	}

	function ocultarDado(dado){

		var dado1 = document.getElementById("dado1");
		var dado2 = document.getElementById("dado2");
		var dado3 = document.getElementById("dado3");
		var dado4 = document.getElementById("dado4");
		var dado5 = document.getElementById("dado5");

		switch(dado){
			case "dado1": 
				dado1.style.visibility = 'hidden';
				break;
			case "dado2":			
				dado2.style.visibility = 'hidden';
				break;
			case "dado3":			
				dado3.style.visibility = 'hidden';
				break;
			case "dado4":			
				dado4.style.visibility = 'hidden';
				break;
			case "dado5":			
				dado5.style.visibility = 'hidden';
				break;			
		}

	} 
};	