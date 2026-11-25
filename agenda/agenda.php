<?php
    session_start();
    require 'seguridad.php';
    chk_acceso_agenda_usuarios();

    require 'funciones.php';

    $emojis  =  $_SESSION['emojis_elegidos'];
    $valores = []; 
    $errores = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        for ($i = 0; $i < count($emojis); $i++) {
            $valores[$i] = [
                'nombre'    => $_POST['nombre_' . $i]    ?? '',
                'apellidos' => $_POST['apellidos_' . $i] ?? '',
                'telefono'  => $_POST['telefono_' . $i]  ?? '',
                'email'     => $_POST['email_' . $i]     ?? ''
            ];
            $errores[$i] = validarContacto($valores[$i]);
        }
        $datos_validos = true;
        for ($i = 0; $i < count($errores); $i++) {
            if (count($errores[$i]) !== 0) {
                $datos_validos = false;
            }
        }

        if($datos_validos){
            $_SESSION['valores_contactos'] = $valores;
            header("Location: ./grabado.php");
            die;
        }

    }else{
        for ($i = 0; $i < count($emojis); $i++) {
            $valores[$i] = [
                'nombre'    =>  '',
                'apellidos' =>  '',
                'telefono'  =>  '',
                'email'     =>  ''
            ];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>
    <h1>Agenda de contactos</h1>
    <p>Usuario: <strong><?php echo($_SESSION['usuario']); ?></strong></p>

    <form method='POST' action="">
        <?php for ($i = 0; $i < count($emojis); $i++) {
                echo (pintarFormularioContacto(
                    $i,
                    $emojis[$i],
                    $valores[$i] ?? [],
                    $errores[$i] ?? []
                ));
            }
        ?>

        <button type="submit">Grabar contactos</button>
    </form>
</body>
</html>