<?php
    require_once './conexion.php';
    require_once './modelo.php';
    require_once './seguridad.php';

    session_start();
    chk_acceso_panel_config();

    $_errMsg="";
    $usuarios = get_all_usuarios();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - Admin</title>
</head>
<body>
    <h1>Panel de administracion</h1>
    <p>Conectado como XXX | <a href="./salir.php">Cerrar sesión</a></p>

    <form>
        Contactos por lote (3-8): 
        <input type="number"> 5 <?php //valor  antiguo ?>
        <br>
        Emojis disponibles (4-10): 
        <input type="number"> 10 <?php //valor  antiguo ?> 
        <br>
        Máx. contactos por usuario (10-100): 
        <input type="number"> 50 <?php //valor  antiguo ?>
        <br><br>
        <input type="submit" value="Guardar configuración">
        <br>
        <span style="color:red"> <?= $_errMsg ?> <span>
    </form>
    <br><br>
    <table style="color:black;border:solid black 1px">
        <tr>
            <th>Cód</th>
            <th>Nombre</th>
            <th>Rol</th>
            <th>Contactos</th>
        </tr>
        <?php
            foreach($usuarios as $usuario){
                echo("<tr>");
                echo("<td>".$usuario['codigo']."</td>");
                echo("<td>".$usuario['nombre']."</td>");
                echo("<td>".$usuario['rol']."</td>");
                echo("<td>".$usuario['numero_contactos']."</td>");
                echo("</tr>");
            }
        ?>
    </table>
</body>
</html>