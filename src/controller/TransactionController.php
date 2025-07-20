<?php
namespace App\controller;
// echo dirname(__DIR__,2)

use App\core\abstract\AbstractController;
use App\core\App;
use App\service\TransactionService;

//require_once dirname(__DIR__,2).'/vendor/autoload.php';

class TransactionController extends AbstractController{
        private  TransactionService $transactionService;
        
        public function __construct(){
            parent::__construct();
            $this->transactionService=App::getDependencie('transactionservice');
            
        }
        
        public function derniertransaction($idCompte){
            $transactions = $this->transactionService->transaction($idCompte);
            $this->render('compte/compte.html.php', [
                'transactions' => $transactions,
        ]);
        

     }
    public function index(){
    }
    public function create(){
    }
    public function show(){
    }
    public function update(){
    }
    public function destroy(){
    }
    public function store(){
    }
    public function edit(){
    }

}