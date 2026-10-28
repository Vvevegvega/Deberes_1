<?php 
    require_once 'conexion.php'; // Obtenemos la conexión $pdo

    function get_archivo_configuracion_simon(){
        $pdo = open_conection();

        try {
            $sql = "SELECT num_circulos, num_colores FROM configuracion LIMIT 1";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetch();

        } catch (PDOException $e) {
            error_log("Error en SELECT: " . $e->getMessage());
            echo "No se pudo obtener la configuracion.";
        } finally {
            $stmt = null; // Liberamos el cursor
            $pdo = null; // Cerramos la conexión
        }
    }

    function update_simon_config($numBotones, $numColores){
        $pdo = open_conection();

        try {
            $sql = "UPDATE configuracion
                    SET num_circulos = :numBotones, num_colores = :numColores
                    WHERE clave_config = 1";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([':numBotones' => $numBotones, ':numColores' => $numColores]);
            
            return $stmt->fetch();

        } catch (PDOException $e) {
            error_log("Error en SELECT: " . $e->getMessage());
            echo "No se pudo insertar en la base de datos.";
        } finally {
            $stmt = null; // Liberamos el cursor
            $pdo = null; // Cerramos la conexión
        }
    }
?>