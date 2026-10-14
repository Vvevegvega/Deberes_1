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
            if($_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST['botonColor'])){
                if($_SESSION['pulsaciones'] < count($_SESSION['jugada'])){
                    $_SESSION['jugada'][$_SESSION['pulsaciones']] = $_POST['botonColor'];
                    $_SESSION['pulsaciones'] = $_SESSION['pulsaciones']+1;
                }
                if($_SESSION['pulsaciones'] == count($_SESSION['jugada'])){
                    //Se acaba el juego
                    //Esto creo que es un poco guarrada y lo suyo seria usar un ruter o algo asi yo creo
                    header("Location: /26_27_DWES_Ivan/Deberes_1/Simon/finJuego.php");
                }
            }

            if(isset($_SESSION['solucion'])){
                pintar_circulos($_SESSION['jugada']);
            
                global $colores_hex, $colores_esp;
                echo "<form method=POST action=\"\" >";
                for($i = 0 ; $i<$_SESSION['numColores'] ; $i++){
                    //Que el boton cambie el array intento y que ya se printee todo normal
                    echo "<button type=submit value=".$colores_hex[$i]." name=botonColor style=background-color:".$colores_hex[$i]." >".$colores_esp[$i]."</button>";
                }
                echo "</form>";
            }
        ?>
    </main>

</body>
</html>