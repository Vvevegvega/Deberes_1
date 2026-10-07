<?php
    //Para la parte de sesion, lo del simon
    //Formulario con el numero de circulos entre 4 y 8, los 

    //NO hace falta lo de los colores elejidos, vamos a ahcer que con 5 colores escoja los 5 primeros y asi mas facil

    //Por defecto, si yo elijo 5 colores, luego pulso 5 colores para elegir los colores a elegir
    //El usuario elije los colores pulsando x cantidad de veces en diferentes colores

    //Todos los botones de color estan siempre visibles

    //pinta los circulos

    $colores_validos = array(
        "yellow", 
        "blue", 
        "red", 
        "green", 
        "pink", 
        "orange",
        "purple",
        "grey");
    
    function generar_colores($numBotones):array{
        global $colores_validos;
        $array_colores = [];

        for($i=0 ; $i < $numBotones ; $i++){
            array_push($array_colores, $colores_validos[rand(0,$numBotones)]);
        }
        return $array_colores;
    }

    function pintar_circulos(array $colores){
        global $colores_validos;

        if(is_array($colores) 
            && count($colores) >= 4 
            && count($colores) <= 8){

            for($i=0 ; $i<count($colores) ; $i++){
                echo "<svg width=100 height=100>";
                echo "<circle id=circulo_".$i." r=50 cx=50 cy=50 fill=".$colores[$i]." />";
                echo "</svg>";
            }

        }else{
            //Si no se cumple alguna de las condiciones
        }
    }
    /*
    function pintar_circulos(array $colores){
        global $colores_validos;
        $dom = new DomDocument();
        $dom->validateOnParse = true;

        if(is_array($colores) 
            && count($colores) >= 4 
            && count($colores) <= 8){

            for($i=0 ; $i < count($colores) ; $i++){
                if(in_array($colores[$i], $colores_validos)){
                    ($dom->getElementById("circulo_".$i)) -> setAttribute("fill", $colores[$i]);
                }else{
                    ($dom->getElementById("circulo_".$i)) -> setAttribute("fill", "white");
                }
            }

        }else{
            //Si no se cumple alguna de las condiciones
        }
    }
    */
?>