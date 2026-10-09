<?php
    session_start();
    //Para la parte de sesion, lo del simon
    //Formulario con el numero de circulos entre 4 y 8, los 
    //Por defecto, si yo elijo 5 colores, luego pulso 5 colores para elegir los colores a elegir
    //El usuario elije los colores pulsando x cantidad de veces en diferentes colores
    //Todos los botones de color estan siempre visibles
    //pinta los circulos

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
            if(isset($_SESSION['solucion'])){
                pintar_circulos($_SESSION['solucion']);
                pintar_circulos_apagados(count($_SESSION['solucion'])); 
            
                global $colores_hex, $colores_esp;
                for($i = 0 ; $i<$_SESSION['numColores'] ; $i++){
                    echo "<button style=background-color:".$colores_hex[$i]." >".$colores_esp[$i]."</button>";
                }
            }
        ?>
    </main>

</body>
</html>