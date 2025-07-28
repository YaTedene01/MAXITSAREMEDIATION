<?php
namespace App\Entity;
use App\Entity\TypeUser;
class User{
    private int $id;
    private string $nom;
    private string $prenom;
    private string $numeroCarteIdentite;
    private Array $numeroTelephone=[];
    private ?TypeUser $typeUser = null;
    private Array $compte=[];
    private string $photorecto;
    private string $photoverso;
    private string $login;
    private string $password;
    public function __construct(int $id=0,string $nom='',string $prenom='',string $numeroCarteIdentite='',string $photorecto="",string $photoverso="",string $login='',string $password='')
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->numeroCarteIdentite = $numeroCarteIdentite;
        // $this->typeUser = new TypeUser();
        $this->photorecto = $photorecto;
        $this->photoverso = $photoverso;
        $this->login = $login;
        $this->password = $password;
     }
        public function getId(): int{ 
        return $this->id;
        }
        public function setId(int $id): void{
            $this->id = $id;
        }
        public function getNom(): string{
            return $this->nom;
        }
        public function setNom(string $nom): void{
            $this->nom = $nom;
        }
        public function getPrenom(): string{
            return $this->prenom;
        }
        public function setPrenom(string $prenom): void{
            $this->prenom = $prenom;
        }
        public function getNumeroCarteIdentite(): string{
            return $this->numeroCarteIdentite;
        }
        public function setNumeroCarteIdentite(string $numeroCarteIdentite): void{
            $this->numeroCarteIdentite = $numeroCarteIdentite;
         }
            public function getNumeroTelephone(): Array{
            return $this->numeroTelephone;
        }
        public function addNumeroTelephone(Array $numeroTelephone):void{
            $this->numeroTelephone = $numeroTelephone;
        }
        
        public function getTypeUser(): TypeUser{
            return $this->typeUser;
        }
        public function setTypeUser(TypeUser $typeUser): void{
            $this->typeUser = $typeUser;
        }
        public function getCompte(): Array{
            return $this->compte;
        }
        public function addCompte(Array $compte): void{
            $this->compte = $compte;
        }
        public function getPhotorecto(): string{
            return $this->photorecto;
        }
        public function setPhotorecto(string $photorecto): void{
            $this->photorecto = $photorecto;
        }
        public function getPhotoverso(): string{
            return $this->photoverso;
         }
            public function setPhotoverso(string $photoverso): void{
            $this->photoverso = $photoverso;
        }
        public function getLogin(): string{
            return $this->login;
        }
        public function setLogin(string $login): void{
            $this->login = $login;
        }
        public function getPassword(): string{
            return $this->password;
        }
        public function setPassword(string $password): void{
            $this->password = $password;
        }
        public static function toObject(array $data): static{
           
            $user = new self(
                $data['id'],
                $data['nom'],
                $data['prenom'],
                $data['numerocarteidentite'],
                $data['numerotelephone'],
                $data['photorecto'],
                $data['photoverso'],
                $data['password'],
                
        

        
            );
            //  var_dump($data);
            // die;
            // $user->typeUser = TypeUser::toObject($data['typeUser']);
            // $user->compte = array_map(fn($comptes) => Compte::toObject($comptes), $data['compte']);
            return $user;
        }
        public function toArray(): array{
            return [
                'id' => $this->id,
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'numeroCarteIdentite' => $this->numeroCarteIdentite,
                'typeUser' => $this->typeUser ? $this->typeUser->toArray() : null,
                'compte' => array_map(fn($comptes) => $comptes->toArray(), $this->compte),
                'photorecto' => $this->photorecto,
                'photoverso' => $this->photoverso,
                'login' => $this->login,
                'password' => $this->password,
            ];
        }
    
}
