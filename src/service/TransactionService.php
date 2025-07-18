<?php
namespace App\service;

use App\core\App;
use App\entity\Transaction;
use App\repository\TransactionRepository;

class TransactionService{
    private static TransactionRepository $transactionRepository;
        private static ?TransactionService $instance=null;
        private  function __construct(){

        $this->transactionRepository = App::getDependencie("transactionrepository");
    }
    public static function getInstance(){
      if(is_null (self::$instance)){
           self::$instance=new self();

        }
        return self::$instance;
    }

    public function transaction($idCompte) {
        
       return $this?->transactionRepository->getTransaction($idCompte);
         
    }

}