<?php
    function chk_acceso_inicio_agenda(){
        chck_usuario_logeado();

        if((int) $_SESSION['rolUsuario'] === 1){
            header("Location: ./admin.php");
            die;
        }
    }

    function chk_acceso_panel_config(){
        chck_usuario_logeado();

        if((int) $_SESSION['rolUsuario'] === 0){
            header("Location: ./inicio.php");
            die;
        }
    }

    function chck_usuario_logeado(){
        if(!isset($_SESSION['usuario'])){
            header("Location: ./index.php");
            die;
        }
    }
?>