<?php
    session_start();
    //Para la parte de sesion, lo del simon
    //Formulario con el numero de circulos entre 4 y 8, los 
    //Por defecto, si yo elijo 5 colores, luego pulso 5 colores para elegir los colores a elegir
    //El usuario elije los colores pulsando x cantidad de veces en diferentes colores
    //Todos los botones de color estan siempre visibles
    //pinta los circulos

    // pulsar amarillo => cambio el array jugada pintandolo del color del boton
    // aumento la posicion [pulsaciones]
    // vuelvo a pintar la jugada

    require("pintar-circulos.php");
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
            echo "<h2>Solucion:</h2>";
            pintar_circulos($_SESSION['solucion']);

            echo "<br>";

            echo "<h2>Tu respuesta:</h2>";
            pintar_circulos($_SESSION['jugada']);

            if(sonIguales($_SESSION['solucion'], $_SESSION['jugada'])){
                echo "Ganaste";
            }else{
                echo "Perdiste";
            }

            echo "<br>";
            echo "<form method=post action=\"index.php\">
                        <input type=submit value=\"Volver a jugar\" </input>
                </form>";
        ?>
    </main>

</body>
</html>