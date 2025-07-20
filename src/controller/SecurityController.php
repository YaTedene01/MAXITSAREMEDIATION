<?php
namespace App\controller;

use App\core\abstract\AbstractController;
use App\core\App;
use App\core\Validator;
use App\service\UserService;

class SecurityController extends AbstractController{
    private  UserService $userService;

    public function __construct(){
        parent::__construct();
        $this->layout='layout/securitylayout.html.php';
        $this->userService=App::getDependencie('userservice');
    } 

  
    public function login (){

        
        $login=$_POST['login'];
        $password=$_POST['password'];

        $champ=[
            "login"=>[
                "obligatoire"=>'obligatoire',
            ],
            "password"=>[
                'obligatoire'=>'obligatoire'
            ]
            
            ];

        $data = [
            "login" => $login,
            "password" => $password
        ];
            Validator::valider($champ , $data);

            //  var_dump(Validator::getError());

            if(Validator::isValide()){
           
            $user = $this->userService->connexion($login,$password);
            if($user&&
            $user->getPassword()===$password){

            $this->session->set('user',$user->toArray());

            $controller = new TransactionController();
            


            var_dump($controller->derniertransaction(1));

            header('location:/compte');
            }
            else{

                $this->session->set('error',Validator::getError());
                // var_dump($_SESSION['error']); die;
            // header('location:http://localhost:8001/');
                header('location:/');

            }
        
        }else{
             $this->session->set('error',Validator::getError());
                // var_dump($_SESSION['error']); die;
            // header('location:http://localhost:8001/');
            header('location:/');

        }
     }
          
   
    public function index(){

    }
    public function create(){
        $this->render('login/connexion.html.php');
        die();
    }
   public function show(){
        $this->render('login/inscription.html.php');
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