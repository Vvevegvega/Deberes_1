<?php
    session_start();
    require("pintar-circulos.php");

    //Miramos si hay alguna cookie y en caso de haber la creamos
    if($_SERVER["REQUEST_METHOD"] === 'POST' 
        && isset($_POST['colorFondo'])){
        setcookie( "colorFondo", $_POST['colorFondo'], [
                'expires' => time() + 300000,
        ]);
    }

    //Comprobaciones de la partida y la logica de pulsar botones y colorear
    if($_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST['botonColor'])){
        if($_SESSION['pulsaciones'] < count($_SESSION['jugada'])){
            $_SESSION['jugada'][$_SESSION['pulsaciones']] = $_POST['botonColor'];
            $_SESSION['pulsaciones'] = $_SESSION['pulsaciones']+1;
        }
        if($_SESSION['pulsaciones'] == count($_SESSION['jugada'])){
            //Se acaba el juego
            header("Location: ./finJuego.php");
            die();
        }
    }

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
        <?php // Pintar los colores y mostrar los botones de manera dinamica
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