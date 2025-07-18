<?php

include 'config.php';

class DBConection{

public function conectar(){
    try {
        // Crear una nueva conexión PDO
        $pdo = new PDO("mysql:host=" .DBHOST. ";dbname=" .DBNAME. ";charset=utf8", DBUSER, DBPASS);
        // Configurar el modo de error de PDO para excepciones
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
        //echo "Conexión exitosa a la base de datos.";
    } catch (PDOException $e) {
        // Manejo de errores
        echo "Error en la conexión: " . $e->getMessage();
    }
}
}
?>
