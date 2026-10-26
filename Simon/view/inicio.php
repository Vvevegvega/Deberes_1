<?php
    session_start();
    require "../controller/pintar-circulos.php";

    //Comprobaciones una vez se pulsa el boton
        //Miramos si hay algun color puesto y en caso de haber creamos cookie
        if(isset($_POST['colorFondo'])){
            setcookie( "colorFondo", $_POST['colorFondo'], [
                    'expires' => time() + 300000,
            ]);
        }

        // Ajustes de la partida metidas en la base de datos
        // Tenemos que hacer un select y sacar tanto el numero de botones como el de colores
        $numColores = getNumColores();
        $numBotones = getNumBotones();

        $solucion = generar_colores($numBotones,$numColores);
        $_SESSION['solucion'] = $solucion;
        $_SESSION['pulsaciones'] = 0;
        $_SESSION['numColores'] = $numColores;
        $_SESSION['jugada'] = generar_jugada_nueva($numBotones);
    
    //Zona de valores por defecto y leer valores de la cookie y de session
    $ErrMsg = "";
    $colorFondo = isset($_COOKIE['colorFondo'])? $_COOKIE['colorFondo']
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
        <h1> Hola <?= $_SESSION['usuario'] ?>, Simon dice...</h1>
        
        <?php //Aqui creamos el boton del form para empezar y pintamos la solucion a memorizar
            pintar_circulos($_SESSION['solucion']); 
        ?>
        <br>
        <form method=POST action=juego.php>
            <input type=submit value=Empezar>
        </form>
        <form method="POST" action="">
            Color de fondo: <input type="text" name="colorFondo" value=<?= $colorFondo ?>>
            <br>
            <input type="submit" value="Volver a generar">
        </form>
        <span style="color.red"><?= $ErrMsg ?></span>
    </main>

</body>
</html>