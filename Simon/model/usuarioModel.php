<?php
    require_once 'conexion.php'; // Obtenemos la conexión $pdo
    
    function buscar_usuario_por_username($userName){
        $pdo = open_conection();
        if(!empty(trim($userName))){
            try {
                $sql = "SELECT Nombre, Clave, Rol
                    FROM usuarios
                    WHERE nombre = :userName";

                $stmt = $pdo->prepare($sql);
                $stmt->execute([':userName' => $userName]);
                
                return $stmt->fetch();

            } catch (PDOException $e) {
                error_log("Error en SELECT: " . $e->getMessage());
                echo "No se pudo obtener el usuario.";
            } finally {
                $stmt = null; // Liberamos el cursor
                $pdo = null; // Cerramos la conexión
            }
        }
    }

    function insertar_nuevo_jugador($username, $passHash, $rol){
        $pdo = open_conection();
        try {
            $sql = "INSERT INTO usuarios (Nombre, Clave, Rol)
                    VALUES (:username, :passHash, :rol)";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':username' => $username, 
                ':passHash' => $passHash,
                ':rol' => $rol    
            ]);

        } catch (PDOException $e) {
            error_log("Error en Insert: " . $e->getMessage());
            echo "No se pudo insertal el usuario.";
        } finally {
            $stmt = null; // Liberamos el cursor
            $pdo = null; // Cerramos la conexión
        }
    }

    function get_codigo_usuario($userName){
        $pdo = open_conection();
        if(!empty(trim($userName))){
            try {
                $sql = "SELECT Codigo
                    FROM usuarios
                    WHERE nombre = :userName";

                $stmt = $pdo->prepare($sql);
                $stmt->execute([':userName' => $userName]);
                
                return $stmt->fetch();

            } catch (PDOException $e) {
                error_log("Error en SELECT: " . $e->getMessage());
                echo "No se pudo obtener el usuario.";
            } finally {
                $stmt = null; // Liberamos el cursor
                $pdo = null; // Cerramos la conexión
            }
        }
    }
    
?>