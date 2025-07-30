<?php
namespace App\Core;

use PDO;
use PDOException;

class Database {
    private static ?Database $instance = null;
    private ?PDO $pdo = null;
    
    private function __construct() {
        try {
            $this->pdo = new PDO(DSN, DB_USER, DB_PASSWORD, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $e) {
            throw new PDOException("Connection failed: " . $e->getMessage());
        }
    }
    
    public static function getInstance(): self {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getConnexion(): PDO {
        return $this->pdo;
    }
}