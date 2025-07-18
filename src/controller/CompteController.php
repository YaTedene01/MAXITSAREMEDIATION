<?php
namespace App\controller;
use App\core\abstract\AbstractController;
use App\core\App;
use App\service\CompteService;

class CompteController extends AbstractController{
    private  CompteService $compteService;
    public function __construct(){

            parent::__construct();
            $this->compteService=App::getDependencie('compteservice');
            
        }
        // public function solde($idUser){
        // $comptes = $this->compteService->getCompte($idUser);
        
        // var_dump($comptes);die;

        // $this->render('compte/compte.html.php', [
        //    'solde',
        // ]);
        

    //  }

    public function index(){
    }
    public function create(){
        $this->render('compte/compte.html.php');
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
    