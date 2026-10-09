<?php
    $colores_hex = array(
        "#1a66ffff", 
        "#ff1a1aff", 
        "#1aff4fff", 
        "#ffff1aff", 
        "#ff721aff", 
        "#ff1a9cff", 
        "#a01affff", 
        "#8d8d8dff", );
    
    $colores_esp = array(
        "Azul", 
        "Rojo", 
        "Verde", 
        "Amarillo", 
        "Naranja", 
        "Rosa",
        "Morado",
        "Gris");

    function generar_colores($numBotones, $numColores):array{
        global $colores_hex;
        $array_colores = [];

        for($i=0 ; $i < $numBotones ; $i++){
            array_push($array_colores, $colores_hex[rand(0, $numColores-1)]);
        }
        return $array_colores;
    }

    function pintar_circulos(array $colores){
        if(is_array($colores) 
            && count($colores) >= 4 
            && count($colores) <= 8){

            echo "<table><tr>";
            for($i=0 ; $i<count($colores) ; $i++){
                echo "<td>";
                    echo "<svg width=100 height=100>";
                    echo "<circle id=circulo_".$i." r=50 cx=50 cy=50 fill=" .$colores[$i]. " />";
                    echo "</svg>";
                echo "</td>";
            }
            echo "</tr></table><br>";
        }
    }

    function pintar_circulos_apagados($numCirculos){
        $allblack = [];
        for($i=0 ; $i<$numCirculos ; $i++){
                array_push($allblack,"black");
            }
        pintar_circulos($allblack);
    }
?>