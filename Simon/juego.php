<?php
    session_start();
    require("pintar-circulos.php");

    //Comprobaciones de la partida y la logica de pulsar botones y colorear
    if($_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST['botonColor'])){
        //Si no se acabó, cambiamos el color del circulo de array intentos correspondiente
        if($_SESSION['pulsaciones'] < count($_SESSION['jugada'])){
            $_SESSION['jugada'][$_SESSION['pulsaciones']] = $_POST['botonColor'];
            $_SESSION['pulsaciones'] = $_SESSION['pulsaciones']+1;
        }

        //Si se acabó el juego, vamos al archivo de fin de juego
        //Se podria meter aqui la comprobacion de victoria o derrota y luego
        //redirigir al modulo correspondiente pero asi deberia estar bien de momento
        if($_SESSION['pulsaciones'] == count($_SESSION['jugada'])){
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
        <?php 
            if(isset($_SESSION['solucion'])){
                //Pintamos los circulos
                pintar_circulos($_SESSION['jugada']);
            
                //Pintamos los botones de colores de manera dinamica
                global $colores_hex, $colores_esp;
                echo "<form method=POST action=\"\" >";
                for($i = 0 ; $i<$_SESSION['numColores'] ; $i++){
                    echo "<button type=submit value=".$colores_hex[$i]." name=botonColor style=margin:3px;background-color:".$colores_hex[$i]." >".$colores_esp[$i]."</button>";
                }
                echo "</form>";
            }
        ?>
    </main>

</body>
</html>