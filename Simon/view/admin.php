<?php
    session_start();
    require_once "../controller/configController.php";

    //Zona de valores por defecto y leer valores de la cookie y de session
    $ErrMsg = "";
    $numColores = getNumColores();
    $numBotones = getNumBotones();

    $colorFondo = isset($_COOKIE['colorFondo'])? $_COOKIE['colorFondo']
    : "lightgrey";

    //Comprobaciones una vez se pulsa el boton
    if($_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST["numBotones"])){
        //Ajustes de la partida metidas en sesion
        if(($_POST["numBotones"] >= 4 && $_POST["numBotones"] <= 8) 
            && $_POST["numColores"] >= 4 && $_POST["numColores"] <= 8){
            update_simon_config_controller($_POST['numBotones'], $_POST['numColores']);
                $numColores = getNumColores();
                $numBotones = getNumBotones();
        }else{
            $ErrMsg = "El numero de botones y colores debe estar comprendido entre 4 y 8";
        }
    }
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
        <h1> Hola <?= $_SESSION['usuario'] ?>, bienvenido al panel de administración del Simón</h1>
        <form method="POST" action="">
            Numero de botones: <input type="number" name="numBotones" value=<?= $numBotones ?> >
            <br>
            Numero de colores: <input type="number" name="numColores" value=<?= $numColores ?> >
            <br>
            <input type="submit">
        </form>
        <span style="color.red"><?= $ErrMsg ?></span>
    </main>

</body>
</html>