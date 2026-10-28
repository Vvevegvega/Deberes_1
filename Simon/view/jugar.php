<?php
    session_start();
    require_once "../controller/pintar-circulos.php";
    require_once "../controller/jugadasController.php";

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
            if(sonIguales($_SESSION['jugada'], $_SESSION['solucion'])){
                insertar_jugada_controller($_SESSION['usuario'],1);
                header("Location: ./acierto.php");
                die();
            }else{
                insertar_jugada_controller($_SESSION['usuario'],0);
                header("Location: ./fallo.php");
                die();
            }
            
        }
    }

    $colorFondo = isset($_COOKIE['colorFondo'])
        ? $_COOKIE['colorFondo']
        : "lightgrey";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMÓN</title>
</head>
<body style="background-color:<?php echo $colorFondo; ?>">
    <main>
        <h1>SIMÓN</h1>
        <h2> Hola <?php echo $_SESSION['usuario']; ?>, pulsa los botones en el orden correspondiente</h2>
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