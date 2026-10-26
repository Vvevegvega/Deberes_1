<?php 
    require 'conexion.php'; // Obtenemos la conexión $pdo

    function get_archivo_configuracion_simon(){
        open_conection();
        global $pdo;

        try {
            $sql = "SELECT num_circulos, num_colores FROM configuracion LIMIT 1";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetch();

        } catch (PDOException $e) {
            error_log("Error en SELECT: " . $e->getMessage());
            echo "No se pudo obtener el usuario.";
        } finally {
            $stmt = null; // Liberamos el cursor
            $pdo = null; // Cerramos la conexión
        }
    }
?>