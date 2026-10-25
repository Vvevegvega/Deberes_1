<?php
    require_once 'usuarioModel.php';
    $_errMsg = "";

    //TODO
    if($_SERVER["REQUEST_METHOD"] === 'POST'){
        if(isset($_POST) && isset($_POST['nombreUsuario'])){
            //Check si ya existen en la base de datos
            $usuario = buscar_usuario_por_username($_POST['nombreUsuario']);

            if($usuario !==  false 
            && $usuario['Nombre'] === $_POST['nombreUsuario']
            && $usuario['Clave'] === $_POST['passUsuario']){
                //Meter los valores correspondientes en sesion
                session_start();
                $_SESSION['usuario'] = $usuario['Nombre'];
                $_SESSION['rolUsuario'] = $usuario['Rol'];

                header("Location: ./inicio.php");
                die;
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
    <title>Document</title>
</head>
<body>
    <form method='POST' action=''>
        Nombre de usuario <input type='text' name="nombreUsuario">
        <br>
        Contraseña <input type='password' name="passUsuario">
        <br>
        <input type='submit' value='Iniciar sesión'>
    </form>
    <span style="color:red"> <?= $_errMsg ?> <span>
</body>
</html>