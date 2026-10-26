<?php
    session_start();

    //Comprobaciones una vez se pulsa el boton
    if($_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST["numBotones"])){
        //Añadir nombre de usuario a la sesion
        if(!empty(trim($_POST['usuario']))){
            $_SESSION['usuario'] = $_POST['usuario'];
        }

        //Miramos si hay algun color puesto y en caso de haber creamos cookie
        if(isset($_POST['colorFondo'])){
            setcookie( "colorFondo", $_POST['colorFondo'], [
                    'expires' => time() + 300000,
            ]);
        }

        //Ajustes de la partida metidas en sesion
        if(($_POST["numBotones"] >= 4 && $_POST["numBotones"] <= 8) 
            && $_POST["numColores"] >= 4 && $_POST["numColores"] <= 8){

            $numColores = $_POST["numColores"];
            $numBotones = $_POST["numBotones"];

            $solucion = generar_colores($_POST["numBotones"],$_POST["numColores"]);
            $_SESSION['solucion'] = $solucion;
            $_SESSION['pulsaciones'] = 0;
            $_SESSION['numColores'] = $numColores;
            $_SESSION['jugada'] = generar_jugada_nueva($_POST["numBotones"]);
        }
    }

    //Zona de valores por defecto y leer valores de la cookie y de session
    $numColores = 4;
    $ErrMsg = "";

    $colorFondo = isset($_COOKIE['colorFondo'])? $_COOKIE['colorFondo']
    : "lightgrey";

    $usuario = isset($_SESSION['usuario'])
    ? $_SESSION['usuario']
    : "usuario";

    $numCirculos = isset($_COOKIE['numCirculos'])
    ? $_COOKIE['numCirculos']
    : 4;
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
        <h1> Hola <?= $usuario ?>, bienvenido al panel de administración del Simón</h1>
        <form method="POST" action="">
            Numero de botones: <input type="number" name="numBotones" value = <?= $numCirculos ?> >
            <br>
            Numero de colores: <input type="number" name="numColores" value = <?= $numColores ?> >
            <br>
            <input type="submit">
        </form>
        <span style="color.red"><?= $ErrMsg ?></span>
    </main>

</body>
</html>