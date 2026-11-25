<?php
    session_start();
    require_once './seguridad.php';
    chk_acceso_agregar_usuarios();

    require_once './modelo.php';

    $_errMsg = '';

    if(insertar_contactos(
        buscar_usuario_por_username($_SESSION['usuario'])['codigo'], 
        $_SESSION['valores_contactos'], 
        $_SESSION['emojis_elegidos']))
    {
        $grabados = $_SESSION['numero_contactos_grabar'];
        $emojisLote = implode('', $_SESSION['emojis_elegidos']);
    }else{
        $_errMsg = "Hubo un problema al añadir los contactos, se ha deshecho la transacción.";
    }

    unset($_SESSION['valores_contactos'], 
    $_SESSION['numero_contactos_grabar'], 
    $_SESSION['emojis_elegidos']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - Grabado</title>
</head>
<body>
    <h1>Agenda de contactos</h1>
    <p>Usuario: <strong><?php echo($_SESSION['usuario']); ?></strong></p>

    <?php if ($_errMsg !== ''){
            echo("<p style=color:red>" . $_errMsg . "</p>");
        }else{
            echo("<p>Se han grabado ".$grabados." contactos en tu agenda". $emojisLote."</p>");
            echo("<p>Tu agenda tiene ahora ". get_numero_contactos($_SESSION['usuario'])." contactos.</p>");
        }
    ?>
    <p>
        <a href="./inicio.php">Grabar más contactos</a> | 
        <a href="./totales.php">Ver totales</a> | 
        <a href="./salir.php">Cerrar sesión</a>
    </p>
</body>
</html>