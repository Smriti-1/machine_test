<?php
namespace App;

use PDO;
use PDOException;

class ConnectionFactory {
    public static function createConnection() {
        $host = 'localhost';
        $db = 'contacts_db';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        try {
            $pdo = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
            return $pdo;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}
