<?php 
    //Variables:    is_null     is_string   strval

    //Funciones:    strlen      explode     implode

    //Arrays:       count       array_keys  asort(mantiene la asociacion) 

    function ordenar_texto_por_longitud_de_palabra($texto): string{
        if(is_null($texto)){
            return false;
        }

        if(!is_string($texto)){
            $texto = strval($texto);
        }

        $texto_array = explode(" ", str_replace(",", "", $texto));
        $array_longitudes = [];

        for($i=0 ; $i<count($texto_array) ; $i++){
            $array_longitudes += [$texto_array[$i] => strlen($texto_array[$i])];
        }

        asort($array_longitudes);

        return implode(" ", array_keys($array_longitudes));
    }

    $texto = "A ver que tal funciona esto, la verdad es que a veces no confio en php";
    $texto_ordenado = ordenar_texto_por_longitud_de_palabra($texto);

    echo $texto;
    echo "<br>";
    echo $texto_ordenado;