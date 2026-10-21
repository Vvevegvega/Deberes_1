<?php
    session_start();
    require("pintar-circulos.php");

    $usuario = isset($_SESSION['usuario'])
        ?$_SESSION['usuario']
        :"usuario";

    $colorFondo = isset($_COOKIE['colorFondo'])
        ? $_COOKIE['colorFondo']
        : "lightgrey";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:<?= $colorFondo ?>">
    <main>
        <h1> Hola <?= $usuario ?>, Simon dice...</h1>
        
        <!-- Aqui creamos y coloreamos el intento y la solucion -->
        <?php 
            echo "<h2>La solución era:</h2>";
            pintar_circulos($_SESSION['solucion']);
            echo "<br>";

            echo "<h2>Tu respuesta es:</h2>";
            pintar_circulos($_SESSION['jugada']);
            echo "<br>";

            if(sonIguales($_SESSION['solucion'], $_SESSION['jugada'])){
                echo "<h3>Ganaste</h3>";
            }else{
                echo "<h3>Perdiste</h3>";
            }
        ?>
        <form method=post action="inicio.php">
            <input type=submit value="Volver a jugar">
        </form>
    </main>

</body>
</html>