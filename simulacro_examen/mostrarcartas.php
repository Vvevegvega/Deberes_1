<?php
    session_start();
    require_once "generar_jugadas.php";

    if(!isset($_SESSION['solucion'])){
        //  Se genera de una combinación de 6 cartas aleatoria en parejas de 2 que se recordará a lo largo de la jugada.
        $solucion = generar_combinacion(generar_jugada_nueva());
        $_SESSION['solucion'] = $solucion;

        // El número de CARTAS LEVANTADAS estará a 0 o vació.
        $_SESSION['cartas_levantadas'] = 0;

        // Todas las cartas boca abajo (en negro).
        $jugada = generar_jugada_nueva();
        $_SESSION['jugada'] = $jugada;
    }

    if($_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST['botonVoltear'])){
        $voltear = generar_jugada_nueva()[$_POST['botonVoltear']] = $_SERVER[$_POST['botonVoltear']];
        $_SERVER["jugada"]
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emparejar cartas</title>
</head>
<body>
    <main>
        <h1>Emparejar cartas</h1>
        <h1> Bienvenid@ <?= $_SESSION['nombreDelUsuario'] ?>, encuentre las parejas.</h1>

        <h2>Cartas levantadas: <?php echo $_SESSION['cartas_levantadas'];?> </h2> 

        <!-- Generar los botones-->
        <?php
            echo "<form method=POST action=\"\" >";
            for($i=0 ; $i<count($_SESSION['jugada']) ; $i++){
                echo "<button type=submit value=".$i." name=botonVoltear style=margin:3px> Levantar la carta ".$i."</button>";
            }
            echo "</form>";
        ?>

        <form>
            <h2>Pareja:</h2>
            <input type="number" value= 0>
            <input type="number" value= 0>
            <input type="submit" value="Comprobar">
        </form>

        <?php
            pintar_cartas($_SESSION['jugada']); 
        ?>
    </main>

</body>
</html>