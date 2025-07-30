<?php
namespace App\Core;

use PDO;
use PDOException;

class Database {
    private ?PDO $pdo = null;
    private static ?Database $instance = null;
    
    private function __construct() {
        $maxRetries = 3;
        $retryDelay = 2;
        
        for ($i = 0; $i < $maxRetries; $i++) {
            try {
                $dsn = $_ENV['DSN'] ?? sprintf(
                    "pgsql:host=%s;dbname=%s;port=%s",
                    $_ENV['DB_HOST'],
                    $_ENV['DB_NAME'],
                    $_ENV['DB_PORT']
                );
                
                $this->pdo = new PDO(
                    $dsn,
                    $_ENV['DB_USER'],
                    $_ENV['DB_PASSWORD'],
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_TIMEOUT => 5
                    ]
                );
                
                // Test la connexion
                $this->pdo->query('SELECT 1');
                break;
                
            } catch (PDOException $e) {
                if ($i === $maxRetries - 1) {
                    throw new \Exception(sprintf(
                        "Impossible de se connecter à la base de données après %d tentatives. Erreur: %s",
                        $maxRetries,
                        $e->getMessage()
                    ));
                }
                sleep($retryDelay);
            }
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