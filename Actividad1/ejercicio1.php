<?php

    $nombre = "Ivan";
    $fechaActual = date("d/m/Y H:i:s");

    echo "<h1>¡Bienvenido, $nombre!</h1>";
    echo "<p>La fecha y hora actuales son: $fechaActual</p>";

    /*1.1 
        La IA ha generado este codigo y funciona correctamente. 
        En el codigo fuente no aparecen las etiquetas php

        El servidor no recibe el codigo php, sino que en el servidor 
        se ejecuta el codigo php y lo que se envia al cliente es el 
        resultado de la ejecucion del codigo, luego el interprete del 
        navegador muestra el resultado por pantalla

        En este caso hay un poco de html porque el echo envia etiquetas html
    */

    /*1.2
        La IA ha usado la marca standar echo en lugar de la corta

        Segun el manual de php 8, <?= ?> no es lo mismo que <? ?> la 
        segunda opcion es la forma corta y no siempre suele estar activada y
        se recomienda usar las etiquetas estandar <?php ?> y <?= ?> para que el codigo 
        sea mas portable y compatible

        Equivale  a <?php echo X ?>

        y refactoizado seria:
    */
?>
    <?= "<h1>¡Bienvenido, $nombre!</h1>" ?>
    <?= "<p>La fecha y hora actuales son: $fechaActual</p>" ?>

<?php

    $entero = 200;
    $cadena = "200";

    if ($entero === $cadena) {
        echo "Son iguales";
    } else {
        echo "No son iguales";
    }

    var_dump($entero);
    var_dump($cadena);

    /*1.3
        La ia no ha tenido ningun problema y directamentente me ha dicho que 
        hay que tener cuidado con el tipado dentro de php y que suele ser 
        mejor usar ===

        El tema es que dentro de php usa un tipado dinamico, es decir, las 
        variables no tienen un tipo fijo sino que dependen del dato que guarden dentro.

        Esto significa que es comodo de usar pero hay que tener muy claro con que tipos estamos
        tratando y hcer comprobaciones de tipo cuando sea necesario.
    */
?>

