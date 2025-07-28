<?php
namespace App\controller;
use App\core\App;
use App\core\Session;
use App\service\CompteService;
use App\core\abstract\AbstractController;

class CompteController extends AbstractController{
    private  CompteService $compteService;
    public function __construct(CompteService $compteService, Session $session){
        parent::__construct($session);
            $this->compteService = $compteService;

            
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
    