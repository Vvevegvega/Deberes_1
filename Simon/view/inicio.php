<?php
    session_start();
    require_once "../controller/pintar-circulos.php";
    require_once "../controller/configController.php";

    //Miramos si hay algun color puesto y en caso de haber creamos cookie
    if(isset($_POST['colorFondo']) && !empty(trim($_POST['colorFondo']))){
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
<body style="background-color:<?= $colorFondo ?>">
    <main>
        <h1>SIMÓN</h1>
        <h2> Hola <?= $_SESSION['usuario'] ?>, memorice la combinación.</h2>
        
        <?php //Aqui creamos el boton del form para empezar y pintamos la solucion a memorizar
            pintar_circulos($_SESSION['solucion']); 
            echo "Número de botones: ". $numBotones;
            echo "<br>";
            echo "Número de colores: ". $numColores;
            echo "<br>";
        ?>
        <br>
        <form method=POST action=jugar.php>
            <input type=submit value=Empezar>
        </form>
        <form method="POST" action="">
            <input type="submit" value="Volver a generar" name=Submit>
            <br><br>
            Color de fondo: <input type="text" name="colorFondo" >
        </form>
        <span style="color.red"><?= $ErrMsg ?></span>
    </main>

</body>
</html>