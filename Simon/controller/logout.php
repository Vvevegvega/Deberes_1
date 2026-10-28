<?php
    //Limpiar sesion y redirigir a la pagina de login
    session_start();
    session_destroy();
    header("Location: ../");
?>