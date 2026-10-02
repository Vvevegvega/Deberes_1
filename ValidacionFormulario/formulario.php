<?php

    $sexoErr = "Se debe seleccionar sexo";
    $emailErr = "";
    $websiteErr = "";
    $Err ="";

    $nombre ="";
    $email ="";
    $website="";
    $sexo="";


    if (empty($_POST["name"])) {
        $nameErr = "El nombre es obligatorio";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Únicamente se permiten letras y espacios";
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
    <h1>PHP ejemplo de validacion de formularios</h1>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <span class="error">* <?php echo $Err;?></span><br><br>

        Nombre: <input type="text" name="nombre"/>
        <span class="error">* <?php echo $nameErr;?></span><br><br>

        E-mail: <input type="text" name="email" value="<?php echo $email;?>">
        <span class="error">* <?php echo $emailErr;?></span><br><br>

        Website: <input type="text" name="website" value="<?php echo $website;?>">
        <span class="error">* <?php echo $websiteErr;?></span><br><br>

        <input type="radio" name="sexo"
            <?php if (isset($sexo) && $sexo=="mujer") echo "checked";?>
            value="mujer"> Mujer
        <input type="radio" name="sexo"
            <?php if (isset($sexo) && $sexo=="hombre") echo "checked";?>
            value="hombre"> Hombre
        <span class="error">* <?php echo $sexoErr;?></span><br><br>

        <input type="submit" value="Submit">
    </form>

    <h1>Tu input</h1>
    <?php echo $nombre ?>
    <?php echo $email ?>
    <?php echo $website ?>
    <?php echo $sexo ?>
</body>
</html>