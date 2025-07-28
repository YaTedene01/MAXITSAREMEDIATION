<?php
namespace App\service;
use App\core\App;
use App\core\Singleton;
use App\entity\User;
use App\repository\UserRepository;

class UserService extends Singleton{
    private UserRepository $userRepository ;
    private static ?UserService $instance=null;
    public function __construct(UserRepository $userRepository ){
      // $this->userRepository= UserRepository::getInstance();
     
      // var_dump(App::getDependencie("userrepository")); die;
      // $this->userRepository = App::getDependencie("userrepository");
      $this->userRepository = $userRepository;
    }

    public function connexion($login,$password): User|null {
        
       return $this?->userRepository->selectByLogin($login);
         
    }
    public function inscription($nom="", $prenom="", $numeroTelephone="", $photorecto="", $photoverso="", $numeroCarteIdentite="",$login="", $password=""){
        return $this->userRepository->insertUser($nom, $prenom, $numeroTelephone, $photorecto, $photoverso, $numeroCarteIdentite, $login, $password);
    }
}