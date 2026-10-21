  <?php

    $host = 'localhost';
    $dbname = 'agenda'
    $user = 'root';
    $password = '';

    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

    try{
        $pdo = new PDO($dsn, $user, $password);
        echo "conexcion a la base de datos realizada con exito";
    }catch(PDOException e){
        echo "Ha habido un problema con la conexion a base de datos";

    }

?>