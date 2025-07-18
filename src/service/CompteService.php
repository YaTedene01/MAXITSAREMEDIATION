<?php
namespace App\service;

use App\core\App;
use App\repository\CompteRepository;

class CompteService{
    private  static CompteRepository $compteRepository;
    private static ?CompteService $instance = null;
        private  function __construct(){

        $this->compteRepository = App::getDependencie('compterepository');
    }
    public static function getInstance(){
    if(self::$instance === null)
        self::$instance = new self();
        return self::$instance;
   }

    public function getCompte($idUser) {
        
       return $this?->compteRepository->getSolde($idUser);
         
    }


}