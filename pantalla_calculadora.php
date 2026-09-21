<?php
  if (isset($_POST['firstNumber'])) {
    $firstNumber = $_POST['firstNumber']; 
    $secondNumber = $_POST['secondNumber']; 
    $operation = $_POST['operationList'];

    if(is_numeric($firstNumber) && is_numeric($secondNumber) && !is_null($operation)){ 
      $result = match($operation) { 
        '+'=> $firstNumber + $secondNumber, 
        '-'=> $firstNumber - $secondNumber, 
        'x'=> $firstNumber * $secondNumber, 
        '/'=> $firstNumber / $secondNumber, 
        default =>"Operacion invalida", 
      }; 
    }else{ 
      $result = "Valores no validos"; 
    }

    if(is_numeric($result)){ 
      echo $firstNumber ." ". $operation ." ". $secondNumber." = ". $result; 
      }else{ 
        echo $result; 
    } 
    exit;
  }
    
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <title>Calculadora</title>
  </head>

  <body class="fs-4">
    <div class="container mt-5">
      <form action="" class="border rounded p-3" method="POST">
        <div class="row">
          <div class="col-4">
            <label for="firstNumber">Primer Número:</label>
            <input
              type="number"
              id="firstNumber"
              name="firstNumber"
              class="form-control"
            />
          </div>

          <div class="col-4">
            <label for="secondNumber">Segundo Número:</label>
            <input
              type="number"
              id="secondNumber"
              name="secondNumber"
              class="form-control"
            />
          </div>

          <div class="col-4">
            <label for="operationList">Operación:</label>
            <input
              list="operations"
              id="operationList"
              name="operationList"
              class="form-control"
            />

            <datalist id="operations">
              <option value="+"></option>
              <option value="-"></option>
              <option value="x"></option>
              <option value="/"></option>
            </datalist>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col text-end">
            <input
              type="submit"
              value="Enviar"
              class="btn btn-primary btn-lg fs-4"
            />
          </div>
        </div>
      </form>
    </div>
  </body>
</html>