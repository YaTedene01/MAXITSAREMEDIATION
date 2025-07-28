<?php
namespace App\service;

use App\core\App;
use App\core\Singleton;
use App\entity\Transaction;
use App\repository\TransactionRepository;

class TransactionService extends Singleton {
        private  static TransactionRepository $transactionRepository;
        private static ?TransactionService $instance = null;

        public function __construct(TransactionRepository $transactionRepository) {
            $this->transactionRepository = $transactionRepository ;
        }

        // public static function getInstance() {
        //     if (is_null(self::$instance)) {
        //         self::$instance = new self();
        //     }
        //     return self::$instance;
        // }
    
    public function transaction($idCompte) {
        
       return $this?->transactionRepository->getTransaction($idCompte);
         
    }

}