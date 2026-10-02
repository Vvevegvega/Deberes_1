<?php
    declare(strict_types=1);

    function calcularPromedio(array $numeros): float {
        $promedio = 0;
        foreach($numeros as $numero){
            $promedio += $numero;
        }

        return $promedio/count($numeros);
    } 

    function modificarNotas(array &$notas, float $puntos):void{
        foreach($notas as &$nota){
            $nota += $puntos;
        }
    }

    function printArray(array $array){
        foreach($array as $element){
            echo $element;
            echo "<br>";
        }
        echo "<br>";
            
    }