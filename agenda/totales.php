<?php
    session_start();
    require_once './seguridad.php';
    chck_usuario_logeado();

    require_once './modelo.php';
    require_once './funciones.php';
    
    $all_contactos = get_all_contactos_guardados();
    $total_contactos = get_num_total_contactos();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - totales</title>
</head>
<body>
    <h1>Agenda - totales</h1>
    <p><?php echo($_SESSION['usuario']);?>, estos son los contactos guardados:</p>
    <table border=1>
    <tr>
        <th>Cód</th>
        <th>Nombre</th>
        <th>Cont.</th>
        <th>%</th>
        <th>Último alta</th>
        <th>Gráfica</th>
    </tr>
    <?php
        $barFullSize = 300;
        foreach($all_contactos as $contacto){
            $porcentaje = ($contacto['numero_contactos'])/$total_contactos;
            if($contacto['nombre'] === $_SESSION['usuario']){
                echo("<tr style=background-color:lightyellow>");
            }else{
                echo("<tr>");
            }
    
            echo("<td>".$contacto['codigo']."</td>");
            echo("<td>".$contacto['nombre']."</td>");
            echo("<td>".$contacto['numero_contactos']."</td>");
            echo("<td>".($porcentaje*100)."%</td>");
            echo("<td>".$contacto['ultimo_contacto']."</td>");

            $barSize = $barFullSize * $porcentaje;
            echo("<td>
                    <svg width=$barFullSize height=30>
                        <rect x=0 y=0 width=$barSize height=30 style=fill:green; />
                    </svg>
                </td>");
            echo("</tr>");
        }
    ?>
    </table>
    <p><a href="./inicio.php">Grabar más contactos</a> | <a href="./salir.php">Cerrar sesión</a></p>
</body>
</html>