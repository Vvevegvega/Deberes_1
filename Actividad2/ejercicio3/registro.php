<?php
    if(!isset($arrayAsociativo)){
        $arrayAsociativo = [];
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isValidInput()){
            global $arrayAsociativo; 
            array_push($arrayAsociativo,   
            array(
                'nombreCompleto' => $_POST['nombreCompleto'],
                'edad' => $_POST['edad'],
                'email' => $_POST['email'],
                'modulo' => $_POST['modulo'] 
            ));
            print_r($arrayAsociativo);
        }else{
        }
    }

    function isValidInput():bool{
        $result = true;
        
        if(filter_input(INPUT_POST, 
            'nombreCompleto', 
            FILTER_SANITIZE_SPECIAL_CHARS)){
            //Do something    

            $result = false;
        }

        if(filter_input(INPUT_POST, 
            'edad', 
            FILTER_SANITIZE_NUMBER_INT)){
            //Do something    
            
            $result = false;
        }

        if(filter_input(INPUT_POST, 
            'email', 
            FILTER_SANITIZE_EMAIL)){
            //Do something    
            
            $result = false;
        }

        if(filter_input(INPUT_POST, 
            'modulo', 
            FILTER_SANITIZE_EMAIL)){
            //Do something, puedo comprobar la lista de modulos de alguna manera?
            
            $result = false;
        }

        //Lo hago asi para, que pueda poner los warnings especificos en cada uno de los campos
        return $result;
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