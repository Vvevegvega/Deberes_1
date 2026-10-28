<?php
    require_once "../model/jugadasModel.php";
    require_once "../model/usuarioModel.php";

    function insertar_jugada_controller($usuario, $valorAcierto){
        $codusuario = get_codigo_usuario($usuario)['Codigo'];
        var_dump($codusuario);
        if(isset($codusuario)){
            insertar_jugada($codusuario, $valorAcierto);
        }else{
        }
    }

    function get_jugadas_controller(){
        return get_jugadas();
    }

?>