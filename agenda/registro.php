<?php
    require_once './modelo.php';
    $_errMsg = "";

    if($_SERVER["REQUEST_METHOD"] === 'POST'){
        if(isset($_POST) && isset($_POST['nombre_usuario'])){
           
            if(!buscar_usuario_por_username($_POST['nombre_usuario'])){
                insertar_nuevo_usuario(
                    $_POST['nombre_usuario'], 
                    password_hash($_POST['pass_usuario'], PASSWORD_DEFAULT),
                    0
                );
                
                header("Location: ./index.php");
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
    <title>Agenda - registro</title>
</head>
<body>
    <h1>Agenda de contactos</h1>
    <h2>Registro</h2>
    <form method='POST' action=''>
        Nombre de usuario <input type='text' name="nombre_usuario" required>
        <br>
        Contraseña <input type='password' name="pass_usuario" required>
        <br>
        <input type='submit' value='Crear cuenta'>
    </form>
    <br>
    <form method='POST' action="./index.php">
        <input type='submit' value='Iniciar sesión'>
    </form>
    <span style="color:red"> <?= $_errMsg ?> <span>
</body>
</html>