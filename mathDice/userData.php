<?php
	require_once 'login.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Math dice Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">     
    <meta name="Pantalla login de Math dice" content="">
    <meta name="author" content="Emilio Heras">
    <link rel="icon" href="../../favicon.ico">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    
    <link rel="stylesheet" href="./css/style.css" type="text/css" />
    <!--<script type="text/javascript" src="./js/jsFunctions.js"></script>--> 
    
  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="login.php" method="post">
        <h2 class="form-signin-heading"><span class='glyphicon glyphicon-user'></span> nuevos datos</h2>
        <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">Nombre:</span>
            <input type="text" name="newname" id="newname" class="form-control" value=<?php echo $player->getName();?> required autofocus>
            <input type="hidden" name="newdata"/>
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Apellido:</span>
            <input type="text" name="newlastname" id="newlastname" value= <?php echo $player->getLastName();?> class="form-control" required>
          </div>          
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Edad:</span>
            <input type="text" name="newage" id="newage" value= <?php echo $player->getAge();?> class="form-control" required>
          </div>          
        </div>
        <div class="form-group"> 
            <button class="btn btn-lg btn-primary btn-block" type="submit">Actualizar datos</button>
        </div>
      </form>

      <div class="row">
      <div class="col-xs-12">
        <h1 style="font-size: 8em;">math dice</h1>
        <h4>datos del jugador</h4>
      </div>
    </div>

    </div> <!-- /container -->


    <!-- Latest compiled and minified JavaScript -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  
  </body>
</html>