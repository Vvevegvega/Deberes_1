<?php
    session_start();
    require_once "../controller/jugadasController.php";

    $colorFondo = isset($_COOKIE['colorFondo'])
        ? $_COOKIE['colorFondo']
        : "lightgrey";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMÓN - Estadisticas</title>
</head>
<body style="background-color:<?= $colorFondo ?>">
    <main>
        <h1> SIMÓN -  Estadísticas globales</h1>
        <h2> <?= $_SESSION['usuario'] ?>, estas son las estadísticas</h2>
        
        <!-- Aqui creamos y coloreamos la tabla -->
        <table border=1>
        <tr>
            <th>Cód.</th>
            <th>Nombre</th>
            <th>Aciertos</th>
            <th>Gráfica</th>
        </tr>
        <?php 
            $jugadas = get_jugadas_controller();
            $max_victorias = get_max_victorias_controller();

            $barFullSize = 300;
            foreach($jugadas as $jugada){
                if($jugada['Nombre'] === $_SESSION['usuario']){
                    echo "<tr style=background-color:yellow>";
                }else{
                    echo "<tr>";
                }

                echo "<td>".$jugada['Codigo']."</td>";
                echo "<td>".$jugada['Nombre']."</td>";
                echo "<td>".$jugada['Aciertos']."</td>";

                $barSize = $barFullSize * ($jugada['Aciertos'] / $max_victorias);
                echo "<td>
                        <svg width=$barFullSize height=30>
                            <rect x=0 y=0 width=$barSize height=30 style=fill:green; />
                        </svg>
                    </td>";
                
                echo "</tr>";
            }
        ?>
        </table>
        <br>
        <form method=post action="inicio.php">
            <input type=submit value="Volver a jugar">
        </form>
        <form method=post action="../controller/logout.php">
            <input type=submit value="Cerrar Sessión">
        </form>
    </main>

</body>
</html>