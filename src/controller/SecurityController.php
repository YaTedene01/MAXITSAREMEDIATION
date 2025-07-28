<?php
namespace App\controller;

use App\core\App;
use App\core\Session;
use App\core\Validator;
use App\service\UserService;
use App\core\abstract\AbstractController;

class SecurityController extends AbstractController{
    private  UserService $userService;

    public function __construct(UserService $userService, Session $session){
        parent::__construct($session);
        $this->userService = $userService;
        $this->layout='layout/securitylayout.html.php';
    } 

  
    public function login () {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('location:/');
            return;
        }
        
        $login = $_POST['login'] ?? '';
        $password = $_POST['password'] ?? '';
        
        // Validation
        $champ = [
            "login" => [
                "obligatoire" => 'obligatoire',
            ],
            "password" => [
                'obligatoire' => 'obligatoire'
            ]
        ];

        $data = [
            "login" => $login,
            "password" => $password
        ];

        Validator::valider($champ, $data);

        if (!Validator::isValide()) {
            $this->session->set('error', Validator::getError());
            header('location:/');
            return;
        }
        // Tentative de connexion
        $user = $this->userService->connexion($login, $password);
 
        
        if (!$user) {
            $this->session->set('error', ['login' => 'Login ou mot de passe incorrect']);
            header('location:/');
            return;
        }

        // Vérification du mot de passe
        if ($user->getPassword() !== $password) {

            $this->session->set('error', ['password' => 'Login ou mot de passe incorrect']);
            header('location:/');
            return;
        }

        // Connexion réussie
        $this->session->set('user', $user->toArray());
        header('location:/compte');
        exit;
    }
     public function inscription() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $nom = $_POST['nom'] ?? '';
                $prenom = $_POST['prenom'] ?? '';
                $numeroTelephone = $_POST['numeroTelephone'] ?? '';
                $photorecto = $_POST['photorecto'] ?? '';
                $photoverso = $_POST['photoverso'] ?? '';
                $numeroCarteIdentite = $_POST['numeroCarteIdentite'] ?? '';
                $login = $_POST['login'] ?? '';
                $password = $_POST['password'] ?? '';
                
                $this->userService->inscription(
                    $nom, $prenom, $numeroTelephone, 
                    $photorecto, $photoverso, $numeroCarteIdentite, 
                    $login, $password
                );
                
                $this->session->set('success', 'Inscription réussie ! Vous pouvez maintenant vous connecter.');
                header('Location:/');
                exit;
                
            } catch (\Exception $e) {
                $this->session->set('error', $e->getMessage());
                $this->render('login/inscription.html.php', [
                    'old' => $_POST,
                    'error' => $e->getMessage()
                ]);
                return;
            }
        }
        
        $this->render('login/inscription.html.php');
    }
   
    public function index(){

    }
    public function create(){
        $this->render('login/connexion.html.php');
    }
   public function show(){
       //$this->render('login/inscription.html.php');
   }
   public function update(){
   }
   public function destroy(){

    $this->session->destroy();
    header('location:/');
   }
   public function store(){
   }
   public function edit(){
   }
 }