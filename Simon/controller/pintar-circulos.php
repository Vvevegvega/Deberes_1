<?php
    $colores_hex = array(
        "#1a66ffff", 
        "#ff1a1aff", 
        "#1aff4fff", 
        "#ffff1aff", 
        "#ff721aff", 
        "#ff1a9cff", 
        "#a01affff", 
        "#8d8d8dff", 
    );
    $colores_esp = array(
        "Azul", 
        "Rojo", 
        "Verde", 
        "Amarillo", 
        "Naranja", 
        "Rosa",
        "Morado",
        "Gris"
    );

    /**
     * Metodo que toma un numero de botones a generar usando un numero 
     * de colores especificos.
     * @returns un nuevo array con tantos elementos como numcolores
     * relleno de colores aleatorios de $colores_hex
     */
    function generar_colores($numBotones, $numColores):array{
        global $colores_hex;
        $array_colores = [];

        for($i=0 ; $i < $numBotones ; $i++){
            array_push($array_colores, $colores_hex[rand(0, $numColores-1)]);
        }
        return $array_colores;
    }

    /**
     * Metodo que obtiene un array con codigos de colores html y genera por pantalla
     * el codigo svg para representar circulos con los colores especificados en el
     * array de entrada.
     */
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

    /**
     * Metodo que toma un numero de circulos para generar un nuevo intento del
     * usuario sin empezar (es decir, con todos los colores a "black")
     * @returns un array con la longitud especificada con todos los valores = "black"
     */
    function generar_jugada_nueva($numCirculos):array{
        $intento = [];
        for($i=0 ; $i<$numCirculos ; $i++){
            array_push($intento,"black");
        }
        return $intento;
    }

    /**
     * Metodo que compara dos arrays elemento a elemento para comprobar si son
     * iguales entre si.
     * @returns false si el numero de elementos difiere o algun elemento en la misma 
     * posicion difiere
     * @returns true en caso de que sean iguales en longitud y elementos
     */
    function sonIguales($array1, $array2){
        if(count($array1) !== count($array2)) return false;

        for($i = 0 ; $i<count($array1) ; $i++){
            if($array1[$i] !== $array2[$i]){
                return false;
            }
        }
        return true;
    }

?>