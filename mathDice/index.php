<?php
  require_once './lib/page.php';

  $pageIndex = new Page();
  echo $pageIndex->getHeaderIndex();
?>
  <body>
    <div class="container">
      <form class="form-signin" action="login.php" method="post">
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
