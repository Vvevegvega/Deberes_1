<?php
    function filtrar_acceso($es_admin_requerido = false){
        if(!isset($_SESSION['usuario'])){
            header("Location: index.php");
            die;
        }

        $rol = (int) $_SESSION['Rol'];

        switch($rol){
            case 0: //Jugador
                header("Location: ./view/inicio.php");
                die;
                break;
            case 1: //Admin
                header("Location: ./view/admin.php");
                die;
                break;
            default:
                //Pantalla de error a lo mejor?
                header("Location: ./index.php");
                die;
                break;
        }
}
?>