<?php
    require_once 'conexion.php'; // Obtenemos la conexión $pdo

    function insertar_jugada($codigousu, $acierto){
        $pdo = open_conection();
        try {
            $sql = "INSERT INTO jugadas (codigousu, acierto)
                    VALUES (:codigousu, :acierto)";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':codigousu' => $codigousu, 
                ':acierto' => $acierto 
            ]);

        } catch (PDOException $e) {
            error_log("Error en Insert: " . $e->getMessage());
            echo "No se pudo insertal el usuario.";
        } finally {
            $stmt = null; // Liberamos el cursor
            $pdo = null; // Cerramos la conexión
        }
    }
    
    function get_jugadas(){
        $pdo = open_conection();
        try {
            $sql = "SELECT 
                        usuarios.Codigo,
                        usuarios.Nombre,
                        SUM(jugadas.acierto) AS Aciertos
                    FROM usuarios
                    LEFT JOIN jugadas 
                        ON jugadas.codigousu = usuarios.codigo
                    WHERE usuarios.Rol = 0
                    GROUP BY usuarios.Codigo, usuarios.Nombre;";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("Error en Insert: " . $e->getMessage());
            echo "No se pudo insertal el usuario.";
        } finally {
            $stmt = null; // Liberamos el cursor
            $pdo = null; // Cerramos la conexión
        }
    }

    function get_max_victorias(){
        $pdo = open_conection();
        try {
            $sql = "SELECT
                        SUM(jugadas.acierto) AS Aciertos
                    FROM
                        usuarios
                        LEFT JOIN jugadas ON jugadas.codigousu = usuarios.codigo
                    WHERE
                        usuarios.Rol = 0
                    GROUP BY
                        usuarios.Codigo,
                        usuarios.Nombre
                    ORDER BY Aciertos DESC
                    LIMIT 1";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetch();

        } catch (PDOException $e) {
            error_log("Error en Insert: " . $e->getMessage());
            echo "No se pudo insertal el usuario.";
        } finally {
            $stmt = null; // Liberamos el cursor
            $pdo = null; // Cerramos la conexión
        }
    }
?>