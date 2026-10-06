<?php

    require("matematicas.php");

    $a = "a";
    $b = "b";
    $c = "c";

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
    <!-- Jugando con el math -->
    <math>
        <mrow>
            <mi>x</mi>
            <mo>=</mo>
            <mfrac>
                <mrow>
                    <mo>−</mo>
                    <mi><?php echo $b ?></mi>
                    <mo>±</mo>
                    <msqrt>
                        <mrow>
                            <msup>
                                <mi><?php echo $b ?></mi>
                                <mn>2</mn>
                            </msup>
                            <mo>−</mo>
                            <mn>4</mn>
                            <mi><?php echo $a ?></mi>
                            <mi><?php echo $c ?></mi>
                        </mrow>
                    </msqrt>
                </mrow>
                <mrow>
                    <mn>2</mn>
                    <mi><?php echo $a ?></mi>
                </mrow>
            </mfrac>
        </mrow>
    </math>
    <br>
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
    