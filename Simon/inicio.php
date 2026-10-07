<?php
    //Para la parte de sesion, lo del simon
    //Formulario con el numero de circulos entre 4 y 8, los 

    //Por defecto, si yo elijo 5 colores, luego pulso 5 colores para elegir los colores a elegir
    //El usuario elije los colores pulsando x cantidad de veces en diferentes colores

    //Todos los botones de color estan siempre visibles

    //pinta los circulos

    require("pintar-circulos.php");

    $numBotones = 4;
    $ErrMsg = "";

    if($_SERVER["REQUEST_METHOD"] === 'POST'){
        if($_POST["numBotones"] >= 4 && $_POST["numBotones"] <= 8){
            $numBotones =$_POST["numBotones"];
            pintar_circulos(generar_colores($_POST["numBotones"]));
        }else{
            $ErrMsg = "El numero debe estar comprendido entre 4 y 8";
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
    <form method="POST" action="">
        Numero de botones: <input type="text" name="numBotones" value = <?php echo $numBotones; ?> >
    <input type="submit">
    </form>
    <span style="color.red"><?php echo $ErrMsg; ?></span>
</body>
</html>