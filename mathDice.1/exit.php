<?php
    //Símplemente destruiremos la sesión y volveremos a la pantalla de login.
    session_start();
    session_destroy();
    header('location: index.php');
?>