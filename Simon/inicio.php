<?php
    //Para la parte de sesion, lo del simon
    //Formulario con el numero de circulos entre 4 y 8, los 

    //Por defecto, si yo elijo 5 colores, luego pulso 5 colores para elegir los colores a elegir
    //El usuario elije los colores pulsando x cantidad de veces en diferentes colores

    //Todos los botones de color estan siempre visibles

    //pinta los circulos

    require("pintar-circulos.php");

    $numBotones = 4;
    $numColores = 4;
    $ErrMsg = "";

    if($_SERVER["REQUEST_METHOD"] === 'POST'){
        if(($_POST["numBotones"] >= 4 && $_POST["numBotones"] <= 8) 
            && $_POST["numColores"] >= 1 && $_POST["numColores"] <= 8){

            $numColores = $_POST["numColores"];
            $numBotones = $_POST["numBotones"];
            pintar_circulos(generar_colores($_POST["numBotones"],$_POST["numColores"])); 
        }else{
            $ErrMsg = "El numero de botones debe estar comprendido entre 4 y 8 y el número de colores entre 1 y 8";
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
<body>
    <main>
        <?php 
            if($_SERVER["REQUEST_METHOD"] === 'POST'){
                echo "<div id=simon_board name=simon_board>";
                    for($i=0 ; $i<$numColores; $i++){
                        echo "<button id=boton_".$i." style=background-color:".$colores_validos[$i]." />". $colores_validos[$i] ."</button>";
                    } 
                echo "</div>";
                echo "<br>";
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