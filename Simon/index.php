<?php
<<<<<<< HEAD
    require_once 'usuarioModel.php';
=======
    $_usuario = "pepe";
    $_contra = password_hash("abc", PASSWORD_DEFAULT);
>>>>>>> acd5b5bbbe211c21e8833b0db083949f633708c5
    $_errMsg = "";

    if($_SERVER["REQUEST_METHOD"] === 'POST'){
        if(isset($_POST) && isset($_POST['nombreUsuario'])){
            //Check si ya existen en la base de datos
<<<<<<< HEAD
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
=======
            //TODO

            //Check si coinciden usuario con contraseña
            if($_POST['nombreUsuario'] === $_usuario 
            && password_verify($_POST['passUsuario'], $_contra)){
                //Meter los valores correspondientes en sesion
                header("Location: ./inicio.php");
                die;
            }else{
                $_errMsg = "Credenciales incorrectas: ". password_hash($_POST['passUsuario'], PASSWORD_DEFAULT);
>>>>>>> acd5b5bbbe211c21e8833b0db083949f633708c5
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