<?php
    require("funciones.php");

    $numeros = array(1,2,3,4);

    echo printArray($numeros);
    echo calcularPromedio($numeros);
    echo("<br><br>");

    echo modificarNotas($numeros, 3);
    echo printArray($numeros);

    try{
        $letras = array("a","b","c");
        echo printArray($letras);
    }catch(Exception $e){
        echo $e->getMessage();
    }
