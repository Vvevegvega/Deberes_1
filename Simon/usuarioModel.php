<?php
    require_once 'conexion.php'; // Obtenemos la conexión $pdo

    function buscar_usuario_por_username($userName){
        global $pdo;
        if(!empty(trim($userName))){
            try {
                // 1. Preparar la consulta con marcador nominal :notaMin
                $sql = "SELECT Nombre, Clave, Rol
                    FROM usuarios
                    WHERE nombre = :userName";

                $stmt = $pdo->prepare($sql);

                // 2. Ejecutar pasando los valores en un array asociativo
                $stmt->execute([':userName' => $userName]);
                
                return $stmt->fetch();

            } catch (PDOException $e) {
                error_log("Error en SELECT: " . $e->getMessage());
                echo "No se pudieron obtener los alumnos.";
            } finally {
                $stmt = null; // Liberamos el cursor
                $pdo = null; // Cerramos la conexión
            }
        }
    }

        

    //TODO
    function insertar_nuevo_jugador($username, $passHash){
        global $pdo;
        try {
            // 1. Preparar la consulta con marcador nominal :notaMin
            $sql = "SELECT u.nombre as nombre, c.nombre as contacto, c.email, c.telefono 
                FROM usuarios u
                LEFT JOIN contactos c 
                ON u.codigo = c.codusuario";

            $stmt = $pdo->prepare($sql);

            // 2. Ejecutar pasando los valores en un array asociativo
            $stmt->execute();

        } catch (PDOException $e) {
            error_log("Error en SELECT: " . $e->getMessage());
            echo "No se pudieron obtener los alumnos.";
        } finally {
            $stmt = null; // Liberamos el cursor
            $pdo = null; // Cerramos la conexión
        }
    }
    
?>