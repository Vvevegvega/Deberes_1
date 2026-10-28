<?php
    require_once '../model/usuarioModel.php';
    $_errMsg = "";

    if($_SERVER["REQUEST_METHOD"] === 'POST'){
        if(isset($_POST) && isset($_POST['nombreUsuario'])){
            //Check si ya existen en la base de datos
            if(!buscar_usuario_por_username($_POST['nombreUsuario'])){
                // Aqui les meto el valor de jugador por defecto, 
                // ya si eso crearemos una pantalla para añadir admins
                insertar_nuevo_jugador(
                    $_POST['nombreUsuario'], 
                    password_hash($_POST['passUsuario'], PASSWORD_DEFAULT),
                    0
                );
                
                header("Location: ../");
                die;
            }else{
                $_errMsg = "El usuario ya existe en la base de datos";
            }  
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMÓN - Registro</title>
</head>
<body>
    <h1>SIMÓN</h1>
    <h2>Crear una nueva cuenta</h2>
    <form method='POST' action=''>
        Nombre de usuario <input type='text' name="nombreUsuario" required>
        <br>
        Contraseña <input type='password' name="passUsuario" required>
        <br>
        <input type='submit' value='Crear cuenta'>
    </form>
    <br>
    <form method='POST' action="../">
        <input type='submit' value='Iniciar sesión'>
    </form>
    <span style="color:red"> <?= $_errMsg ?> <span>
</body>
</html>