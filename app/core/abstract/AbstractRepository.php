<?php
namespace App\core\abstract;

use App\core\Database;
use App\core\Singleton;

abstract class AbstractRepository extends Singleton{
    protected $pdo;
    public function __construct(){
        $this->pdo = Database::getInstance()->getConnexion();
    }
    
    abstract public function selectAll();
    abstract public function insert();
    abstract public function update();
    abstract public function delete();
    abstract public function selectById();
    abstract public function selectBy(Array $filtre);






}