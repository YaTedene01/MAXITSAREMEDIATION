<?php
namespace App\repository;

use App\core\abstract\AbstractRepository;
use App\entity\Compte;

class CompteRepository extends AbstractRepository{
    private static ?CompteRepository $instance=null;
    private $table='Compte';
    private function __construct(){
        parent::__construct();
    }
    public static function getInstance(){
        if(is_null (self::$instance)){
           self::$instance=new self();

        }
        return self::$instance;

    } 
    public function getSolde($idUser){
        $sql="SELECT solde FROM $this->table WHERE iduser = :id AND TypeCompte = 'principal'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $idUser);
        $stmt->execute();

        $solde = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $solde;

     }
    public function selectAll(){ 

     }
     public function insert(){

     }
     public function update(){

     }
     public function delete(){

     }
     public function selectById(){

     }
     public function selectBy(Array $filtre){

     }
}