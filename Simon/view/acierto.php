<?php
    session_start();
    require_once "../controller/pintar-circulos.php";

    $colorFondo = isset($_COOKIE['colorFondo'])
        ? $_COOKIE['colorFondo']
        : "lightgrey";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMÓN - Acertaste</title>
</head>
<body style="background-color:<?= $colorFondo ?>">
    <main>
        <h1>SIMÓN</h1>
        <h2> Enhorabuena, <?= $_SESSION['usuario'] ?>, acertaste!</h2>
        
        <!-- Aqui creamos y coloreamos el intento y la solucion -->
        <?php 
            pintar_circulos($_SESSION['solucion']);
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