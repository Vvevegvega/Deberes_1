<?php

    $nota = 8;

    /*3.1
        Se ha generado el codigo para asignar una nota textual a 
        una nota numerica
    */
    switch ($nota) {
        case 0:
        case 1:
        case 2:
        case 3:
        case 4:
            $resultado = "Insuficiente";
            break;

        case 5:
            $resultado = "Suficiente";
            break;

        case 6:
            $resultado = "Bien";
            break;

        case 7:
        case 8:
            $resultado = "Notable";
            break;

        case 9:
        case 10:
            $resultado = "Sobresaliente";
            break;

        default:
            $resultado = "Nota no válida. Introduce un número entero entre 0 y 10.";
            break;
    }

    /*3.2
        He refactoriazado el codigo para usar match y asigna el valor a una variable directamente

    */ 

    $resultado = match($nota){
        0,1,2,3,4 => "Insuficiente",
        5=> "Suficiente",
        6=> "Bien",
        7,8=> "Notable",
        9,10=> "Sobresaliente",
        default=> "Nota no válida";
    }

    /*3.3
        La nueva funcion match funciona usando comparacion fuerte === en lugar de debil == 
        por tanto hay que tenerlo en cuenta  al hora de usarlo, ya que si sacamos
        un campo de texto que contiene un numero y lo comparamos con un numero no sera igual
        mientras que con switch si lo seria. Habria que hacer un cast para comparar
        
        Otra cosa a tener en cuenta es que match devuelve un valor mientras que switch no devuelve nada.
        Si bien hay maneras de trucar un switch, match es mas limpio y compacto, permitiendo usarlo
        dentro de expresiones al comportarse como una funcion lambda.

        Cabe destacar que en un switch se pueden olvidar los break y hacer que aparecan errores en el
        programa, pero a su vez, la manera en que un switch permite agrupar casos permite una ejecucion parcial
        que no es posible dentro de un match.

        Match parece un acercamiento mucho mas directo y comodo a la hora de asignar valores, pero el switch
        seguira teniendo sus utilidades sobretodo en ambientes legacy donde a lo mejor no existe la expresion match
        o en casos muy especificos de utilizar la omision de breaks.
    */

?>