<?php
namespace App\service;
use App\core\App;
use App\entity\User;
use App\repository\UserRepository;

class UserService{
    private UserRepository $userRepository ;
    private static ?UserService $instance=null;
    private  function __construct(){
      // $this->userRepository= UserRepository::getInstance();
     
      // var_dump(App::getDependencie("userrepository")); die;
      $this->userRepository = App::getDependencie("userrepository");
    }
    public static function getInstance(){
      if(is_null (self::$instance)){
           self::$instance=new self();

        }
        return self::$instance;
    }
    public function connexion($login,$password): User|null {
        
       return $this?->userRepository->selectByLogin($login);
         
    }
}