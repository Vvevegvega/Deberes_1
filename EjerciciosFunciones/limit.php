<?php
    $arrayBase;
    $arrayLimitado;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        global $arrayBase;
        global $arrayLimitado;

        $arrayBase = parse_into_array($_POST["array"]);
        $arrayLimitado = limit_array($arrayBase, 5);
        
    }

    function parse_into_array(string $string):array{
        //Esto es increible
        return explode(" ", $string);
    }

    function limit_array(array $array, float $limit):array{
        $result = [];
        foreach($array as $element){
            if(is_numeric($element) && $element <= $limit){
                $result[] = $element;
            }
        }
        return $result;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Limites</title>
</head>
<body> 
    <h1>Array de limites</h1>
    <p>Introduzca los numeros separados por espacios en blanco</p>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
        Array: <input type="text" name="array">
        <input type="submit" value="Submit">
    </form>
    <?php
        if(isset($arrayBase)){
            echo "Array Base: ";
            foreach($arrayBase as $element){
                echo $element;
                echo " ";
            }
            echo "<br>";

            echo "Array con limite 5: ";
            foreach($arrayLimitado as $element){
                echo $element;
                echo " ";
            }
            echo "<br>";
        }
    ?>
</body>
</html>
    