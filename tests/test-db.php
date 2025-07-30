<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/app/config/env.php';

try {
    $pdo = new PDO(DSN, DB_USER, DB_PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_TIMEOUT => 5
    ]);
    
    echo "Database connection successful!\n";
    
    // Test query
    $stmt = $pdo->query('SELECT current_timestamp');
    $result = $stmt->fetch();
    echo "Server time: " . $result['current_timestamp'] . "\n";
    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "\n";
    echo "DSN used: " . DSN . "\n";
    exit(1);
}