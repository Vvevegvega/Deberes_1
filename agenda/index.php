<?php
    require_once './conexion';
    require_once './modelo';

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

                //Encaminar a la pantalla correspondiente
                filtrar_acceso();
            }else{
                $_errMsg = "Credenciales incorrectas";
            }  
        }
    }
?>
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
    <form method='POST' action=''>
        Usuario
        <input type="text" id="txt_usuario">
        <br>
        Clave
        <input type="text" id="txt_clave">
        <br><br>
        <input type='submit' value='Entrar'>
        <input type='submit' value='Registrarse'>
    </form>
</body>
</html>