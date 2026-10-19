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
<body style="background-color:<?php echo $colorFondo; ?>">
    <main>
        <h1> Hola <?php echo $usuario; ?>, Simon dice...</h1>
        
        <!-- Aqui creamos y coloreamos botones y los circulos -->
        <?php 
            echo "<h2>Solucion:</h2>";
            pintar_circulos($_SESSION['solucion']);

            echo "<br>";

            echo "<h2>Tu respuesta:</h2>";
            pintar_circulos($_SESSION['jugada']);

            if(sonIguales($_SESSION['solucion'], $_SESSION['jugada'])){
                echo "Ganaste";
            }else{
                echo "Perdiste";
            }

            echo "<br>";
            echo "<form method=post action=\"index.php\">
                        <input type=submit value=\"Volver a jugar\" </input>
                </form>";
        ?>
    </main>

</body>
</html>