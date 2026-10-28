<?php
    //TODO meter en base de datos la victoria o derrota
    session_start();
    require_once "../controller/pintar-circulos.php";

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
    <title>SIMÓN - Fallaste</title>
</head>
<body style="background-color:<?= $colorFondo ?>">
    <main>
        <h1>SIMÓN</h1>
        <h2> Fallaste, <?= $_SESSION['usuario'] ?>... ánimo con la proxima vez!</h2>
        
        <!-- Aqui creamos y coloreamos el intento y la solucion -->
        <?php 
            echo "<h2>La solución era:</h2>";
            pintar_circulos($_SESSION['solucion']);
            echo "<br>";

            echo "<h2>Tu respuesta es:</h2>";
            pintar_circulos($_SESSION['jugada']);
            echo "<br>";
        ?>
        <form method=post action="inicio.php">
            <input type=submit value="Volver a jugar">
        </form>
        <form method=post action="./estadisticas.php">
            <input type=submit value="Estadísticas">
        </form>
    </main>

</body>
</html>