<?php
namespace App\repository;

use App\core\abstract\AbstractRepository;
use App\entity\Transaction;

class TransactionRepository extends AbstractRepository{
        private static ?TransactionRepository $instance=null;

    
    private $table='Transaction';
    private function __construct(){
        parent::__construct();
    }
    public static function getInstance(){
        if(is_null (self::$instance)){
           self::$instance=new self();

        }
        return self::$instance;

    }

    public function getTransaction($idCompte){
        $sql="SELECT * FROM $this->table WHERE idcompte = :idCompte   ORDER BY id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue('idCompte', $idCompte);
        $stmt->execute();

        $resultat = [];

        while($data = $stmt->fetch(\PDO::FETCH_ASSOC)){
          
            $resultat[] = Transaction::toObject($data);
                      
        }
        
     

      

        if(!$resultat)
            return null;
return $resultat;
        // $resultat = [];

    //         foreach($transactions as $transaction){
    //             var_dump(Transaction::toObject($transaction));
    //             die;
    //          $resultat[] = Transaction::toObject($transaction);
    //         }
    //              print_r($resultat);

    // die;
    //                 return $resultat;

        // return Transaction::toObject($transaction);

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