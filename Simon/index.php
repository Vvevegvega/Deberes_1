<?php
    require_once './model/usuarioModel.php';
    $_errMsg = "";

    if($_SERVER["REQUEST_METHOD"] === 'POST'){
        if(isset($_POST) && isset($_POST['nombreUsuario'])){
            //Check si ya existen en la base de datos
            $usuario = buscar_usuario_por_username($_POST['nombreUsuario']);

            if($usuario !==  false 
            && $usuario['Nombre'] === $_POST['nombreUsuario']
            && password_verify($_POST['passUsuario'], $usuario['Clave'])){
                
                //Meter los valores correspondientes en sesion
                session_start();
                $_SESSION['usuario'] = $usuario['Nombre'];
                $_SESSION['rolUsuario'] = $usuario['Rol'];

                switch($usuario['Rol']){
                    case 0: //Jugador
                        header("Location: ./view/inicio.php");
                        die;
                        break;
                    case 1: //Admin
                        header("Location: ./view/admin.php");
                        die;
                        break;
                    default:
                        //Pantalla de error a lo mejor?
                        die;
                        break;
                }
            }else{
                $_errMsg = "Credenciales incorrectas";
            }  
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simon - Inicio de sesion</title>
</head>
<body>
    <h1><a href="./">Simon dice</a></h1>
    <h2>Inicio de sesion</h2>
    <form method='POST' action=''>
        Nombre de usuario <input type='text' name="nombreUsuario" required>
        <br>
        Contraseña <input type='password' name="passUsuario" required>
        <br>
        <input type='submit' value='Iniciar sesión'>
    </form>
    <span style="color:red"> <?= $_errMsg ?> <span>
    <br>
    <a href="./view/registro.php">Crear una cuenta nueva</a>
</body>
</html>