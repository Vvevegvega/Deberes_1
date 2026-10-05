<?php
    $solution;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        global $solution;
        $solution = check_palindromo($_POST["texto"]);
    }

    function check_palindromo($texto){
        $texto = strtolower(str_replace(" ", "", $texto));
        $textoInvertido = strrev($texto);

        for($i = 0; $i< strlen($texto); $i++){
            if(!($texto[$i] === $textoInvertido[$i])){
                return false;
            }
        }
        return true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palindromator</title>
</head>
<body> 
    <h1>Comprobación de palíndromos</h1>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
        Texto: <input type="text" name="texto">
        <input type="submit" value="Submit">
    </form>
    <br>
    <?php if(isset($solution)){
        echo $_POST["texto"] . ": ";
        if($solution === true) echo "es palíndromo";
        else echo "no es palíndromo";
    }?>
</body>
</html>
    