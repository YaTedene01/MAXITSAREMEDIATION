<?php
namespace App\Core;

use PDO;

class Database{
    
    private static ?Database $instance= null;
    private string $host;
    private string $port;
    private string $dbname;
    private string $user;
    private string $pwd;
    private string $dsn;


    private PDO $pdo;
    private function __construct()
    {

        // $this->host='localhost';
        // $this->port='5432';
        // $this->dbname='MAXITSAREMEDIATION';
        // $this->user='yatedene';
        // $this->pwd='faye0000';
        // $this->dsn="pgsql:host='$this->host';port=$this->port;dbname=$this->dbname";
        $this->user=DB_USER;
        $this->pwd=DB_PASSWORD;
        $this->dsn=DSN;

    }
    
    public static function getInstance(){
        if (is_null(self::$instance)){
            self::$instance=new self();
        }
        return self::$instance;
    }
   public function getConnexion() {
    
    try {
    $this->pdo= new PDO($this->dsn,$this->user,$this->pwd);
       
    } catch (\Throwable $th) {
       
    }
    return $this->pdo;
   }

 }