<?php
    session_start();
    require_once './seguridad.php';
    chk_acceso_inicio_agenda();

    require_once './modelo.php';
    require_once './funciones.php';

    if($_SERVER["REQUEST_METHOD"] === 'POST' 
    && (isset($_POST['btn_grabar']) || isset($_POST['btn_incrementar']))){

        if(isset($_POST['btn_grabar'])){
            header("Location: ./agenda.php");
            die;
        }
        if(isset($_POST['btn_incrementar'])){
            if($_SESSION['numero_contactos_grabar'] == $_SESSION['max_emojis']
            || $_SESSION['numero_contactos'] == $_SESSION['max_contactos']){
                header("Location: ./agenda.php");
                            die;
            }else{
                $_SESSION['numero_contactos_grabar'] = $_SESSION['numero_contactos_grabar'] + 1;
                $_SESSION['emojis_elegidos'][] 
                = emojiAleatorio(emojisDisponibles($_SESSION['max_emojis']));
            }
        }
    }else{
        $_SESSION['max_emojis'] = get_configuracion()['num_emojis'];

        $_SESSION['max_contactos'] = get_configuracion()['max_contactos'];
        $_SESSION['numero_contactos'] = get_numero_contactos($_SESSION['usuario']);        
        $_SESSION['numero_contactos_grabar'] = 1;

        $_SESSION['emojis_elegidos'] = [];
        $_SESSION['emojis_elegidos'][] 
                = emojiAleatorio(emojisDisponibles($_SESSION['max_emojis']));
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - inicio</title>
</head>
<body>
    <h1>Agenda de contactos</h1>
    <p>Usuario: <strong><?php echo($_SESSION['usuario']); ?></strong> - Contactos a grabar:<?php echo($_SESSION['numero_contactos_grabar']);?></p>
    <div><?php foreach($_SESSION['emojis_elegidos'] as $emoji) echo($emoji); ?></div>
    <form method='POST' action=''>
        <input type='submit' name="btn_incrementar" value="incrementar">
        <br>
        <input type='submit' name="btn_grabar" value='Grabar'>
    </form>
</body>
</html>