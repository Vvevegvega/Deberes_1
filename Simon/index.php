<?php
    //Para la parte de sesion, lo del simon
    //Formulario con el numero de circulos entre 4 y 8, los 
    //Por defecto, si yo elijo 5 colores, luego pulso 5 colores para elegir los colores a elegir
    //El usuario elije los colores pulsando x cantidad de veces en diferentes colores
    //Todos los botones de color estan siempre visibles
    //pinta los circulos
    session_start();
    $_SESSION['usuario'] = "Iván";

    require("pintar-circulos.php");

    $numBotones = 4;
    $numColores = 4;
    $ErrMsg = "";
    $solucion;
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
        <h1> Hola <?php echo $_SESSION['usuario']; ?>, Simon dice...</h1>
        
        <!-- Aqui creamos y coloreamos botones y los circulos -->
        <?php 
        if($_SERVER["REQUEST_METHOD"] === 'POST'){
            if(($_POST["numBotones"] >= 4 && $_POST["numBotones"] <= 8) 
                        && $_POST["numColores"] >= 4 && $_POST["numColores"] <= 8){
                        global $solucion;
                        
                        $numColores = $_POST["numColores"];
                        $numBotones = $_POST["numBotones"];

                        $solucion = generar_colores($_POST["numBotones"],$_POST["numColores"]);
                        $_SESSION['solucion'] = $solucion;
                        $_SESSION['numColores'] = $numColores;
                        pintar_circulos($solucion); 
                            
                        //Esto se siente un poco guarrada
                        echo "<br><form method=POST action=inicio.php>
                                <input type=submit value=Empezar>
                            </form><br>";
                    }else{
                        $ErrMsg = "El numero de botones debe estar comprendido entre 4 y 8 y el número de colores entre 4 y 8";
                    }
        }
        ?>

        <form method="POST" action="">
            Numero de botones: <input type="number" name="numBotones" value = <?php echo $numBotones; ?> >
            <br>
            Numero de colores: <input type="number" name="numColores" value = <?php echo $numColores; ?> >
            <br>
            <input type="submit">
        </form>
        <span style="color.red"><?php echo $ErrMsg; ?></span>
    </main>

</body>
</html>