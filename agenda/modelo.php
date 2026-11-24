<?php
    require_once './conexion.php';
    
    function buscar_usuario_por_username($userName){
        $pdo = open_conection();
        if(!empty(trim($userName))){
            try {
                $sql = "SELECT nombre, clave, rol
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

    function get_all_usuarios(){
        $pdo = open_conection();

        try {
            $sql = "SELECT 
                u.codigo,
                u.nombre,
                u.rol,
                COUNT(c.id) AS numero_contactos
            FROM usuarios u
            LEFT JOIN contactos c ON u.codigo = c.codigousu
            GROUP BY u.codigo, u.nombre";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("Error en SELECT: " . $e->getMessage());
        } finally {
            $stmt = null; // Liberamos el cursor
            $pdo = null; // Cerramos la conexión
        }
    }

    function get_configuracion(){
        $pdo = open_conection();
        try {
            $sql = "SELECT nombre, clave, rol
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

    function insertar_nuevo_usuario($username, $passHash, $rol){
        $pdo = open_conection();
        try {
            $sql = "INSERT INTO usuarios (nombre, clave, rol)
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