<?php
  session_start();
  require_once './lib/connectionDB.php';
  //Si quisieramos volver al formulario inicial con una sesión iniciada, nos redirige al juego.
  if(isset($_SESSION['player'])){  
	     header('location: play.php');
		}
	
  require_once './lib/page.php';
  $pageIndex = new Page();
  echo $pageIndex->getHeaderIndex();
      //Si la sesión tiene valor de error de conexión, mostraremos una ventana modal con info.
      if(isset($_SESSION['errorDB'])){
        $connec = new ConnectionDB();
        $connec->checkConnection();
        $connec->showMessage('connect', null);
        //destruimos la sesión para limpiar todo.
        session_destroy();
		  }
?>
  <body onload="showModalWindow()">
    <div class="container">
      <form class="form-signin" action="play.php" method="post" style="visibility='hidden';">
        <h2 class="form-signin-heading"><span class='glyphicon glyphicon-user'></span> Introduce tus datos</h2>
        <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">Nombre:</span>
            <input type="text" name="name" id="name" class="form-control" required autofocus>
            <input type="hidden" name="login">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Apellido:</span>
            <input type="text" name="lastname" id="lastname" class="form-control" required>
          </div>          
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Edad:</span>
            <input type="text" name="age" id="age" class="form-control" required>
          </div>          
        </div>
        <div class="form-group"> 
            <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesión</button>
        </div>
      </form>
      
      <div class="row">
        <div class="col-xs-12">
          <h1 style="font-size: 8em;">math dice</h1>
          <h4>el juego de dados</h4>
        </div>
      </div>
    </div> <!-- /container -->    
    <?php
      echo $pageIndex->getFooter();
    ?>
  </body>
</html>
