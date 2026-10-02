<?php

    $arrayAsociativo;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(true){
            $arrayAsociativo[] =  
            array => (
                'nombreCompleto' => $_POST['nombreCompleto'],
                'edad' => $_POST['edad'],
                'email' => $_POST['email'],
                'modulos' => $_POST['modulos'] 
            );
        }else{

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
    <form action="" method="POST">
        <label for="nombreCompleto">Nombre Completo:</label>
        <input type="text" name="nombreCompleto"/>
        <br>
        <label for=>Edad:</label>
        <input type="number" name="edad"/>
        <br>
        <label for=>Email:</label>
        <input type="email" name="email"/>
        <br>
        <label for=>Módulo formativo:</label>
        <input list="modulos" name="modulo"/>
        <br>
        <datalist id="modulos">
            <option value="DAW">
            <option value="DAM">
            <option value="Sistemas">
        </datalist>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>