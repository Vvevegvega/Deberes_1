<?php  

    $array_cartas = array(
        "imagenes/boca_abajo.jpg",
        "imagenes/copas_02.jpg",
        "imagenes/copas_03.jpg",
        "imagenes/copas_05.jpg"
    );

    function generar_combinacion($array_cartas):array{
        for($i=1 ; $i < 4 ; $i++){
            $carta = $i;
            do{
                $posicion = rand(0, 5);
            }while($array_cartas[$posicion] != 0);
            $array_cartas[$posicion] = $carta;

            do{
                $posicion = rand(0, 5);
            }while($array_cartas[$posicion] != 0);
            $array_cartas[$posicion] = $carta;
        }
        return $array_cartas;
    }

    function pintar_cartas(){
        global $array_cartas;

        echo "<table><tr>";
        for($i=0 ; $i<count($colores) ; $i++){
            echo "<td>";
                echo "<div>";
                echo "<img ref= ". $_SERVER['jugada'][$i] .">";
                echo "</div>";
            echo "</td>";
        }
        echo "</tr></table><br>";
    }

    function generar_jugada_nueva():array{
        $intento = [];
        for($i=0 ; $i<6 ; $i++){
            array_push($intento, 0);
        }
        return $intento;
    }
?>