<?php
    session_start();
    require_once './seguridad.php';
    chk_acceso_panel_config();

    require_once './modelo.php';

    $_errMsg="";
    $usuarios = get_all_usuarios();
    $configuracion = get_configuracion();

    if($_SERVER["REQUEST_METHOD"] === 'POST'){
        //al menos uno tiene que estar para actualizar
        if(isset($_POST) 
            && ((isset($_POST['max_lote']) && $_POST['max_lote'] !== '') 
                || (isset($_POST['num_emojis']) && $_POST['num_emojis'] !== '') 
                || (isset($_POST['max_contactos']) && $_POST['max_contactos'] !== ''))){

            //Primero tomamos los valores por defecto
            $max_lote = $configuracion['max_lote'];
            $num_emojis= $configuracion['num_emojis'];
            $max_contactos = $configuracion['max_contactos'];
            $datos_validos = true;

            //Comprobamos que campos se van a actualizar y en caso de error, añadimos el dato al errmsg
            if(isset($_POST['max_lote']) && $_POST['max_lote'] !== ''){
                if($_POST['max_lote'] >= 3 && $_POST['max_lote'] <= 8){
                    $max_lote = $_POST['max_lote'];
                }else{
                    $_errMsg = $_errMsg . "El número de contactos por lote tiene que estar comprendido entre 3 y 8.\n";
                    $datos_validos = false;
                }
            }

            if(isset($_POST['num_emojis']) && $_POST['num_emojis'] !== ''){
                if($_POST['num_emojis'] >= 4 && $_POST['num_emojis'] <= 10){
                    $num_emojis = $_POST['num_emojis'];
                }else{
                    $_errMsg = $_errMsg . "El número de emojis tiene que estar comprendido entre 4 y 10.\n";
                    $datos_validos = false;
                }
            }

            if(isset($_POST['max_contactos']) && $_POST['max_contactos'] !== ''){
                if($_POST['max_contactos'] >= 10 && $_POST['max_contactos'] <= 100){
                    $max_contactos = $_POST['max_contactos'];
                }else{
                    $_errMsg = $_errMsg . "El número maximo de contactos tiene que estar comprendido entre 10 y 100.\n";
                    $datos_validos = false;
                }
            }

            if($datos_validos){
                actualizar_config($max_lote, $num_emojis, $max_contactos);
                $configuracion = get_configuracion();
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - Config</title>
</head>
<body>
    <h1>Panel de administracion</h1>
    <p>Conectado como <strong><?php echo($_SESSION['usuario']); ?></strong> | <a href="./salir.php">Cerrar sesión</a></p>

    <form method='POST' action="">
        Contactos por lote (3-8): 
        <input type="number" name="max_lote"> <?php echo($configuracion["max_lote"]); ?>
        <br>
        Emojis disponibles (4-10): 
        <input type="number" name="num_emojis"> <?php echo($configuracion["num_emojis"]); ?>
        <br>
        Máx. contactos por usuario (10-100): 
        <input type="number" name="max_contactos"> <?php echo($configuracion["max_contactos"]); ?>
        <br><br>
        <input type="submit" value="Guardar configuración">
        <br>
        <span style="color:red"> <?= $_errMsg ?> <span>
    </form>
    <br><br>
    <table border=1>
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