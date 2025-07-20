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
    public function solde($iduser)
    {

        // Vérifie si l'utilisateur est connecté
        $user = $this->session->get('user');
        if (!$user) {
            header('location:/');
            exit();
        }

        // Récupérer le solde via le service
        $solde = $this->compteService->getSolde((int)$user['id']);
        

        // Passer les données à la vue
        $this->render('compte/compte.html.php', [
            'user'  => $user,
            'solde' => $solde

        ]);

    }
    


    

    public function index(){
    }
    public function create(){
        $this->render('compte/compte.html.php');
    }
    public function show(){
        $this->render('transaction/transaction.html.php');

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
    