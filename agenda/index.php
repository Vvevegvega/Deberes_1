<?php
    require_once './conexion.php';
    require_once './modelo.php';

    $_errMsg = "";

    if($_SERVER["REQUEST_METHOD"] === 'POST'){
        if(isset($_POST) && isset($_POST['nombre_usuario'])){
            //Check si ya existen en la base de datos
            $usuario = buscar_usuario_por_username($_POST['nombre_usuario']);

            if($usuario !==  false 
            && $usuario['nombre'] === $_POST['nombre_usuario']
            && password_verify($_POST['pass_usuario'], $usuario['clave'])){
                
                //Meter los valores correspondientes en sesion
                session_start();
                session_regenerate_id(true);
                $_SESSION['usuario'] = $usuario['nombre'];
                $_SESSION['rolUsuario'] = $usuario['rol'];

                //Encaminar a la pantalla correspondiente
                if($usuario['rol'] === 1){
                    header("./admin.php");
                    die;
                }else{
                    header("./inicio.php");
                    die;
                }
            }else{
                $_errMsg = "Credenciales incorrectas";
            }  
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>
    <h1>Agenda de contactos</h1>
    <h2>Inicio de sesión</h2>
    <form method='POST' action=''>
        Usuario <input type="text" name="nombre_usuario" required>
        <br>
        Clave <input type='password' name="pass_usuario" required>
        <br>
        <input type='submit' value='Entrar'>
    </form>
    <br>
    <form method='POST' action='./registro.php'>
        <input type='submit' value='Registrarse'>
    </form>
    <span style="color:red"> <?= $_errMsg ?> <span>
</body>
</html>