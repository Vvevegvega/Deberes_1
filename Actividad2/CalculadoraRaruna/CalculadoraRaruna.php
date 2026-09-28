<?php
    /*
    Un recuadro de form con 
        Texto: cuantos numeros quiere sumar
        Recuadro para meter numero
        boton: Adelante
    Al pulsar boton:
        Te sale otro form donde se vean varios recuadros tantos como numeros puse, cada uno con un label y una caja para meter el texto
        n1 caja
        n2 caja
        n3 caja
                Boton sumar
    */

    function generarPanelesDeSuma(){
        $cajas = $_POST["numeroDeCajas"];

        for($i = 1 ; $i <= $cajas ; $i++){
            echo "<label for=\"caja" . $i . "\">n" . $i . "</label>";
            echo "<input id=\"caja". $i . "\"
                    name=\"numeros[]\"
                    type=\"number\"
            >";
            echo "<br>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <div>
    <form id="numerosASumar" method="POST" action="./mostrarResultado.php">
        <?php generarPanelesDeSuma(); ?>
        <input type="submit"/>
    </form>
    </div>
</body>
</html>