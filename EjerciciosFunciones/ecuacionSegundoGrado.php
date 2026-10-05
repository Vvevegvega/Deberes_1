<?php

    $a = "a";
    $b = "b";
    $c = "c";

    function solve($a, $b, $c){
        $delta = sqrt(($b*$b) - (4*$a*$c));
        
        //NO real solutions
        if($delta < 0){
            return false;
        }

        //Real solutions
        if( $delta == 0){
            //1 real solution 2 times
           return ($b*(-1) + $delta) / 2*$a;
        }else {
            //2 real solutions 1 time each
            $alpha = ($b*(-1) + $delta) / 2*$a;
            $beta = ($b*(-1) - $delta) / 2*$a;
            $soluciones = array("alpha" => $alpha, "beta"=> $beta);
            return $soluciones;
        }
    }

    $solution;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        global $solution;

        $a = $_POST["a"];
        $b = $_POST["b"];
        $c = $_POST["c"];

        $solution = solve($a, $b, $c);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>X Calculator</title>
</head>
<body> 
    <h1>Introduzca los coeficientes de su ecuación de segundo grado</h1>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
        A: <input type="number" name="a" value=0>
        <br>
        B: <input type="number" name="b" value=0>
        <br>
        C: <input type="number" name="c" value=0>
        <br><br>
        <input type="submit" value="Submit">
    </form>
    <br>
    <math display = "block">
        <mrow><mn>-<?php echo $b; ?>±</mn></mrow>
    </math>
    <br>
    <?php if(isset($solution)){
        if($solution === false){
            echo "There are no real solutions";
        }else{
            if(is_array($solution)){
                echo "There exists 2 roots: ";
                echo "<br><br>";
                echo "Alpha: ". $solution["alpha"];
                echo "<br>";
                echo "Beta: ". $solution["beta"];
            }else{
                echo "There exist 1 root repeated 2 times: " .$solution;
            }
        }
    }?>
</body>
</html>
    