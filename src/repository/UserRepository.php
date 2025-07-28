<?php
namespace  App\repository;
use App\core\abstract\AbstractRepository;
use App\entity\User;

class UserRepository extends AbstractRepository{
    private static ?UserRepository $instance=null;
    private $table = 'users';
    protected function __construct() {
        $this->pdo = \App\core\Database::getInstance()->getConnexion();
    }
    // public static function getInstance(){
    //     if(is_null (self::$instance)){
    //        self::$instance=new self();

    //     }
    //     return self::$instance;
    // }
    
   public function selectByLogin($login):User|null {
    $sql = "SELECT * FROM  $this->table WHERE login = :login";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue('login', $login);
    $stmt->execute();

    $user = $stmt->fetch(\PDO::FETCH_ASSOC);
        // var_dump($user); die;

    if(!$user)
    return null;
    return User::toObject($user);
}
// public function insertUser($nom, $prenom, $numeroTelephone, $photorecto, $photoverso, $numeroCarteIdentite, $login, $password): ?array {
//     $pdo = $this->pdo;

//     $stmt = $pdo->prepare("INSERT INTO $this->table 
//         (nom, prenom, numeroTelephone, photorecto, photoverso, numeroCarteIdentite, login, password) 
//         VALUES 
//         (:nom, :prenom, :numeroTelephone, :photorecto, :photoverso, :numeroCarteIdentite, :login, :password)");
    
//     $stmt->execute([
//         ':nom' => $nom,
//         ':prenom' => $prenom,
//         ':numeroTelephone' => $numeroTelephone,
//         ':photorecto' => $photorecto,
//         ':photoverso' => $photoverso,
//         ':numeroCarteIdentite' => $numeroCarteIdentite,
//         ':login' => $login,
//         ':password' => $password
//     ]);

//     if ($stmt->rowCount() > 0) {
//         $lastId = $pdo->lastInsertId();

//         // Récupérer l'utilisateur inséré
//         $query = $pdo->prepare("SELECT * FROM $this->table WHERE id = :id");
//         $query->execute([':id' => $lastId]);
//         return $query->fetch(\PDO::FETCH_ASSOC);
//     }

//     return null;
// }
    
public function insertUser($nom, $prenom, $numeroTelephone, $photorecto, $photoverso, $numeroCarteIdentite, $login, $password): ?array {
    $pdo = $this->pdo;

    // Sécurité : hash du mot de passe
    $password = password_hash($password, PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO $this->table 
            (nom, prenom, numerotelephone, photorecto, photoverso, numerocarteidentite, login, password) 
            VALUES 
            (:nom, :prenom, :numerotelephone, :photorecto, :photoverso, :numerocarteidentite, :login, :password)");
        
        $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':numerotelephone' => $numeroTelephone,
            ':photorecto' => $photorecto,
            ':photoverso' => $photoverso,
            ':numerocarteidentite' => $numeroCarteIdentite,
            ':login' => $login,
            ':password' => $password
        ]);

        $lastId = $pdo->lastInsertId();
        
        

        if ($lastId) {
            $query = $pdo->prepare("SELECT * FROM $this->table WHERE id = :id");
            $query->execute([':id' => $lastId]);
            return $query->fetch(\PDO::FETCH_ASSOC);
        }

    } catch (\PDOException $e) {
        echo "Erreur lors de l'inscription : " . $e->getMessage();
        return null;
    }

    return null;
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