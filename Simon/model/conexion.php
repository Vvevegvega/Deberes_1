<?php
  function open_conection(): PDO{
    $host = 'localhost';
    $dbname = 'dbsimon_ivan';
    $user = 'root';
    $password = "";

    // 1. Cadena DSN (Data Source Name)
    $dsn = "mysql:host=$host;port=3307;dbname=$dbname;charset=utf8mb4";
    // En mi casa intente cambiar el puerto del mysql al 3307 como en clase pero no consegui
    // Hacer que me funcionara, asi que cambiare la dsn a mano como workaround
    //$dsn = "mysql:host=$host;port=3306;dbname=$dbname;charset=utf8mb4";

    // 2. Opciones de configuración
    $opciones = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Ante cualquier fallo lanza una excepción
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Devuelve por defecto arrays asociativos
    ];

    $pdo = null; // Inicializamos la variable para el bloque finally
    try {
        $pdo = new PDO($dsn, $user, $password, $opciones);
        echo "<script>console.log('Conexión establecida correctamente.');</script>";
        return $pdo;
    } catch (PDOException $e) {
        // Registramos el detalle técnico en el log del servidor (oculto al visitante)
        error_log("Error de conexión PDO: " . $e->getMessage());
        echo "<p style='color:red;'>".$e->getMessage()."</p>";
    } finally {
    // El bloque finally se ejecuta SIEMPRE para cerrar recursos
    // (En un script real cerramos al finalizar todas las consultas)
    }
  }

?>