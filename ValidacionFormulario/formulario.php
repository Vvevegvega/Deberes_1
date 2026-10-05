<?php

    require("funcion_validar_email.php");
    require("funcion_validar_url.php");

    $sexoErr = "";
    $emailErr = "";
    $websiteErr = "";
    $nameErr = "";

    $Err ="Los campos con astericos deben ser rellenados";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //Validar nombre REQUERIDO

        if (empty($_POST["nombre"])) {
            $nameErr = "El nombre es obligatorio";
        } else {
            if (!preg_match("/^[a-zA-Z ]*$/",$_POST["nombre"])) {
                $nameErr = "Únicamente se permiten letras y espacios";
            }
        }

        //Validar email REQUERIDO
        if (empty($_POST["email"])) {
            $emailErr = "El email es obligatorio";
        } else {
            if(!validar_email($_POST["email"])){
            $emailErr = "Email invalido";
            }
        }

        //validar url NO REQUERIDO
        if (!empty($_POST["website"])) {
            if(!validar_url($_POST["email"])){
                $websiteErr ="URL invalida";
            }
        }

        //validar genero REQUERIDO
        if(empty($_POST["sexo"])){
            $sexoErr = "Debe seleccionar sexo";
        }
    }

    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $website= isset($_POST["website"]) ? $_POST["website"] : "";
    $sexo= isset($_POST["sexo"]) ? $_POST["sexo"] : "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" >
    <title>Document</title>
</head>
<body>
    <h1>PHP ejemplo de validacion de formularios</h1>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <span class="error">* <?php echo $Err;?></span><br><br>

        Nombre: <input type="text" name="nombre" value="<?php echo $nombre;?>"/>
        <span class="error" style="<?php if(empty($nameErr)) echo "color:black"; else echo "color:red"; ?>">* <?php echo $nameErr;?></span><br><br>

        E-mail: <input type="text" name="email" value="<?php echo $email;?>">
        <span class="error" style="<?php if(empty($emailErr)) echo "color:black"; else echo "color:red"; ?>">* <?php echo $emailErr;?></span><br><br>

        Website: <input type="text" name="website" value="<?php echo $website;?>">
        <span class="error" style="<?php if(empty($websiteErr)) echo "color:black"; else echo "color:red"; ?>"> <?php echo $websiteErr;?></span><br><br>

        <input type="radio" name="sexo"
            <?php if (isset($sexo) && $sexo=="mujer") echo "checked";?>
            value="mujer"> Mujer
        <input type="radio" name="sexo"
            <?php if (isset($sexo) && $sexo=="hombre") echo "checked";?>
            value="hombre"> Hombre
        <input type="radio" name="sexo"
            <?php if (isset($sexo) && $sexo=="otro") echo "checked";?>
            value="otro"> Otro
        <span class="error" style="<?php if(empty($sexoErr)) echo "color:black"; else echo "color:red"; ?>">* <?php echo $sexoErr;?></span><br><br>

        <input type="submit" value="Submit">
    </form>

    <h1>Tu input</h1>
    <?php echo $nombre ?>
    <?php echo $email ?>
    <?php echo $website ?>
    <?php echo $sexo ?>
</body>
</html>