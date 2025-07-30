<?php
namespace App\Core;

use PDO;
use PDOException;

class Database {
    private static ?Database $instance = null;
    private ?PDO $pdo = null;
    
    private function __construct() {
        try {
            // Construct DSN manually to ensure proper formatting
            $dsn = sprintf(
                "pgsql:host=%s;port=%s;dbname=%s;sslmode=require",
                DB_HOST,
                DB_PORT,
                DB_NAME
            );

            $this->pdo = new PDO($dsn, DB_USER, DB_PASSWORD, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_TIMEOUT => 5
            ]);
            
            // Test the connection
            $this->pdo->query('SELECT 1');
            
        } catch (PDOException $e) {
            throw new PDOException("Connection failed: " . $e->getMessage() . 
                                 "\nDSN: " . $dsn . 
                                 "\nUser: " . DB_USER);
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