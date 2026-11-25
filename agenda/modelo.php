<?php
    require_once './conexion.php';
    
    function buscar_usuario_por_username($userName){
        $pdo = open_conection();
        if(!empty(trim($userName))){
            try {
                $sql = "SELECT codigo, nombre, clave, rol
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

    function get_numero_contactos($usuario){
        $pdo = open_conection();
        try {
            $sql = "SELECT COUNT(*) FROM contactos WHERE codigousu = :usuario";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([':usuario' => $usuario]);

            return (int) $stmt->fetchColumn();

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
            $sql = "SELECT max_lote, num_emojis, max_contactos
                FROM configuracion
                WHERE id = 1";

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

    function actualizar_config($lote, $emojis, $contactos){
        $pdo = open_conection();
        try {
            $sql = "UPDATE configuracion
                SET max_lote = :lote,
                    num_emojis = :emojis,
                    max_contactos = :contactos
                WHERE id = 1";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':lote'      => $lote,
                ':emojis'    => $emojis,
                ':contactos' => $contactos
            ]);

        } catch (PDOException $e) {
            error_log("Error en SELECT: " . $e->getMessage());
            echo "No se pudo actualizar la configuracion.";
        } finally {
            $stmt = null; // Liberamos el cursor
            $pdo = null; // Cerramos la conexión
        }
    }

    function get_num_total_contactos(){
        $pdo = open_conection();
        try {
            $sql = "SELECT COUNT(*) 
            AS total_contactos 
            FROM contactos";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            
            return (int) $stmt->fetchColumn();

        } catch (PDOException $e) {
            error_log("Error en SELECT: " . $e->getMessage());
        } finally {
            $stmt = null; // Liberamos el cursor
            $pdo = null; // Cerramos la conexión
        }
    }

    function get_all_contactos_guardados(){
        $pdo = open_conection();
        try {
            $sql = "SELECT 
                u.codigo,
                u.nombre,
                COUNT(c.id)  AS numero_contactos,
                MAX(c.fecha) AS ultimo_contacto
            FROM usuarios u
            LEFT JOIN contactos c ON u.codigo = c.codigousu
            GROUP BY u.codigo, u.nombre
            ORDER BY numero_contactos DESC";

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

    function insertar_contactos($codigousu, $contactos, $emojis){
        $pdo = open_conection();
        $success = true;
        try {
            $pdo->beginTransaction();

            $sql = 'INSERT INTO contactos (codigousu, nombre, apellidos, telefono, email, emoji, fecha)
                    VALUES (:codigousu, :nombre, :apellidos, :telefono, :email, :emoji, NOW())';
            $stmt = $pdo->prepare($sql);

            for ($i = 0; $i < count($contactos); $i++) {
                $stmt->execute([
                    ':codigousu' => $codigousu,
                    ':nombre'    => $contactos[$i]['nombre'],
                    ':apellidos'    => $contactos[$i]['apellidos'],
                    ':telefono'    => $contactos[$i]['telefono'],
                    ':email'    => $contactos[$i]['email'],
                    ':emoji'     => $emojis[$i],
                ]);
            }

            $pdo->commit();

        } catch (PDOException $e) {
            if ($pdo->inTransaction()) {
                $pdo->rollBack();
            };
            $success = false;
            
        }finally {
            $stmt = null; // Liberamos el cursor
            $pdo = null; // Cerramos la conexión
            return $success;
        }
    }
    
?>