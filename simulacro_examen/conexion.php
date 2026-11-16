<?php
// Crear conexión
    function getConection(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cartas";
        $port = 3307;
        
        $conn = new mysqli($servername, $username, $password, $dbname, $port);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        return $conn;
    }
?>
