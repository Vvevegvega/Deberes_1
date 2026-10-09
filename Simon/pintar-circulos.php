<?php
    $colores_validos = array(
        "yellow", 
        "lightblue", 
        "red", 
        "green", 
        "pink", 
        "orange",
        "violet",
        "grey");

    function generar_colores($numBotones, $numColores):array{
        global $colores_validos;
        $array_colores = [];

        for($i=0 ; $i < $numBotones ; $i++){
            array_push($array_colores, $colores_validos[rand(0, $numColores-1)]);
        }
        return $array_colores;
    }

    function pintar_circulos(array $colores){
        global $colores_validos;

        if(is_array($colores) 
            && count($colores) >= 4 
            && count($colores) <= 8){

            echo "<table><tr>";
            for($i=0 ; $i<count($colores) ; $i++){
                echo "<td>";
                    echo "<svg width=100 height=100>";
                    echo "<circle id=circulo_".$i." r=50 cx=50 cy=50 fill=".$colores[$i]." />";
                    echo "</svg>";
                echo "</td>";
            }
            echo "</tr></table><br>";
        }
    }
?>