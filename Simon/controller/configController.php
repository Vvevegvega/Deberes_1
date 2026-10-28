<?php
    require_once "../model/configModel.php";
    
    function getNumColores(){
        return (int) get_archivo_configuracion_simon()['num_colores'];
    }

    function getNumBotones(){
        return (int) get_archivo_configuracion_simon()['num_circulos'];
    }
    
    function update_simon_config_controller($numBotones, $numColores){
        if($numBotones > 0 && $numBotones <= 8
        && $numColores > 0 && $numColores <= 8){
            update_simon_config($numBotones, $numColores);
        }
    }
?>