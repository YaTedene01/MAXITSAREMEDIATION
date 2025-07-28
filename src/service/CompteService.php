<?php
namespace App\service;

use App\core\App;
use App\core\Singleton;
use App\repository\CompteRepository;

class CompteService extends Singleton{
    private  static CompteRepository $compteRepository;
    private static ?CompteService $instance = null;
        public  function __construct(CompteRepository $compteRepository){

        $this->compteRepository =$compteRepository ;
    }
//     public static function getInstance(){
//     if(self::$instance === null)
//         self::$instance = new self();
//         return self::$instance;
//    }

   public function getSolde(int $idUser): ?float
    {
        return $this->compteRepository->getSolde($idUser); 
    }

}