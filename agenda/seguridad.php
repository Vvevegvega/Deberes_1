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

    function chk_acceso_agenda_usuarios(){
        chck_usuario_logeado();
        if(!isset($_SESSION['emojis_elegidos'])){
            header("Location: ./index.php");
            die;
        }
    }

    function chk_acceso_agregar_usuarios(){
        chck_usuario_logeado();
        if(!isset($_SESSION['emojis_elegidos']) 
            || !isset($_SESSION['valores_contactos'])){
            header("Location: ./index.php");
            die;
        }
    }
    
?>