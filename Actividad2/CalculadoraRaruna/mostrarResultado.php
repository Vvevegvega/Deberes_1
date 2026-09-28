<?php

    $resultado = 0;
    foreach($_POST["numeros"] as $number){
        $resultado += $number;
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
        <p>El resultado de la suma es: <?= $resultado ?></p>
    </div>
</body>
</html>