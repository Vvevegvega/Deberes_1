<?php
    //A
    header('Content-Type: text/html; charset=utf-8');

    //D
    const IVA = 0.21;
    const PRECIO_HORA = 13;

    //B
    $modulos = ["DWES" => 60, "DWEC" => 50, "DIW" => 40, "DAW" => 30, "EIE" => 20];

    //C
    echo '<table border="1">'; 
        echo '<tr>'; 
            echo '<th>Modulo</th>'; 
            echo '<th>Horas</th>'; 
            echo '<th>Coste</th>'; 
        echo '</tr>';
        
        foreach(array_keys($modulos) as $modulo){
            echo '<tr>';
                echo '<td>' . $modulo . '</td>';
                echo '<td>' . $modulos[$modulo] . '</td>';
                echo '<td>' . $modulos[$modulo] * PRECIO_HORA * IVA . '€</td>';
            echo '</tr>';
        }
    echo "</table><br>";

    //F
    $variableGlobal = 10;
    function variablesGlobalesVSLocales(){
        global $variableGlobal;

        $variableLocal = 5;

        echo "Esto es dentro de la funcion: ";
        echo $variableGlobal + $variableLocal;
    }

    echo "Esto es fuera de la funcion: ";
    echo $variableGlobal + $variableLocal;

    echo "<br><br>";
    variablesGlobalesVSLocales();
?>

