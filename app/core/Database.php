<?php
namespace App\Core;

use PDO;
use PDOException;

class Database {
    private ?PDO $pdo = null;
    private static ?Database $instance = null;
    
    private function __construct() {
        try {
            $dsn = $_ENV['DSN'] ?? "pgsql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'] . ";port=" . $_ENV['DB_PORT'];
            $username = $_ENV['DB_USER'];
            $password = $_ENV['DB_PASSWORD'];
            
            $this->pdo = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $e) {
            throw new \Exception("Connection failed: " . $e->getMessage());
        }
    }
    
    public static function getInstance(): Database {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getConnexion(): PDO {
        return $this->pdo;
    }
}