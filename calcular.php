<?php
    $firstNumber = $_POST['firstNumber'];
    $secondNumber = $_POST['secondNumber'];
    $operation = $_POST['operationList'];

    

    if(is_numeric($firstNumber) && is_numeric($secondNumber) && !is_null($operation)){
        switch($operation) {
            case '+':
                $result = $firstNumber + $secondNumber;
                break;
            case '-':
                $result = $firstNumber - $secondNumber;
                break;
            case 'x':
                $result = $firstNumber * $secondNumber;
                break;
            case '/':
                $result = $firstNumber / $secondNumber;
                break;
            default:
                $result = "Operacion invalida";
        }
    }else{
        $result = "Valores no validos";
    }

    echo $result;
?>  