<?php
namespace  App\repository;
use App\core\abstract\AbstractRepository;
use App\entity\User;

class UserRepository extends AbstractRepository{
    private static ?UserRepository $instance=null;
    private $table = 'users';
    private function __construct(){
        parent::__construct();
    }
    public static function getInstance(){
        if(is_null (self::$instance)){
           self::$instance=new self();

        }
        return self::$instance;

    }
    
   public function selectByLogin($login):User|null {
    $sql = "SELECT * FROM  $this->table WHERE login = :login";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue('login', $login);
    $stmt->execute();

    $user = $stmt->fetch(\PDO::FETCH_ASSOC);
    if(!$user)
    return null;
    // var_dump($user);
    // die;
    return User::toObject($user);
}

    
     public function selectAll(){ 

     }
     public function insert(){

     }
     public function update(){

     }
     public function delete(){

     }
     public function selectById(){

     }
     public function selectBy(Array $filtre){

     }

}