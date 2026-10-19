<?php
    session_start();
    //Simon meterle que puecon las cookies de sesion se cambie el color de fondo de la app

    if($_SERVER["REQUEST_METHOD"] === 'POST' 
        && isset($_POST['colorFondo'])){
        setcookie( "colorFondo", $_POST['colorFondo'], [
                'expires' => time() + 300000,
        ]);
    }

    $colorFondo = isset($_COOKIE['colorFondo'])
        ? $_COOKIE['colorFondo']
        : "lightgrey";

    require("pintar-circulos.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style=background-color:". <php $colorFondo?>.">
    <main>
        <h1> Hola <?php echo $_SESSION['usuario']; ?>, Simon dice...</h1>
        <!-- Aqui creamos y coloreamos botones y los circulos -->
        <?php 
            if($_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST['botonColor'])){
                if($_SESSION['pulsaciones'] < count($_SESSION['jugada'])){
                    $_SESSION['jugada'][$_SESSION['pulsaciones']] = $_POST['botonColor'];
                    $_SESSION['pulsaciones'] = $_SESSION['pulsaciones']+1;
                }
                if($_SESSION['pulsaciones'] == count($_SESSION['jugada'])){
                    //Se acaba el juego
                    header("Location: /26_27_DWES_Ivan/Deberes_1/Simon/finJuego.php");
                    die();
                }
            }

            if(isset($_SESSION['solucion'])){
                pintar_circulos($_SESSION['jugada']);
            
                global $colores_hex, $colores_esp;
                echo "<form method=POST action=\"\" >";
                
                for($i = 0 ; $i<$_SESSION['numColores'] ; $i++){
                    //Que el boton cambie el array intento y que ya se printee todo normal
                    echo "<button type=submit value=".$colores_hex[$i]." name=botonColor style=margin:3px;background-color:".$colores_hex[$i]." >".$colores_esp[$i]."</button>";
                }
                echo "</form>";
            }
        ?>
    </main>

</body>
</html>