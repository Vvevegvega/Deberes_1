<?php
    session_start();

    require("pintar-circulos.php");

    setcookie( "numCirculos", 7, [
        'expires' => time() + 300000,
        'path' => '/',
        'domain' => 'localhost',
        'secure' => false,
        'httponly' => true,
        'samesite' => 'Lax'
    ]);

    $numColores = 4;
    $ErrMsg = "";

    /* TODO
        Primera pantalla del simon donde tenemos la aga donde ponemos el numero de circulos y el numero de colores, inicialmente valor 4
        Vamos a meter una cookie de sesion para que, en lugar de fijarlo a 4, vamos a crear una cookie donde se guarde el valor elegido por el usuario
        Meter un nuevo campo al form "numero de circulos cookie" con un boton cambiar
    */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <h1>Simon dice...</h1>
        
        <!-- Aqui creamos y coloreamos botones y los circulos -->
        <?php 
        if($_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST["numBotones"])){
            if(($_POST["numBotones"] >= 4 && $_POST["numBotones"] <= 8) 
                && $_POST["numColores"] >= 4 && $_POST["numColores"] <= 8){

                $_SESSION['usuario'] = $_POST['usuario'];
                setcookie( "colorFondo", $_POST['colorFondo'], [
                    'expires' => time() + 300000,
                ]);

                $numColores = $_POST["numColores"];
                $numBotones = $_POST["numBotones"];

                $solucion = generar_colores($_POST["numBotones"],$_POST["numColores"]);
                $_SESSION['solucion'] = $solucion;
                $_SESSION['pulsaciones'] = 0;
                $_SESSION['numColores'] = $numColores;
                $_SESSION['jugada'] = generar_jugada_nueva($_POST["numBotones"]);
                pintar_circulos($solucion); 

                echo "<br>
                        <form method=POST action=inicio.php>
                            <input type=submit value=Empezar>
                        </form>
                        <br>";
            }else{
                $ErrMsg = "El numero de botones debe estar comprendido entre 4 y 8 y el número de colores entre 4 y 8";
            }
        }
        ?>

        <form method="POST" action="">
            Nombre: <input type="text" name="usuario">
            <br>
            Numero de botones: <input type="number" name="numBotones" value = <?php echo $_COOKIE['numCirculos']; ?> >
            <br>
            Numero de colores: <input type="number" name="numColores" value = <?php echo $numColores; ?> >
            <br>
            Color de fondo: <input type="text" name="colorFondo">
            <br>
            <input type="submit">
        </form>
        <span style="color.red"><?php echo $ErrMsg; ?></span>
    </main>

</body>
</html>