<?php
namespace App\Entity;
use App\Entity\User;
use App\core\abstract\AbstractEntity;
class Compte extends AbstractEntity
{
    private int $id;
    private int $numero;
    private float $solde;
    private string $dateCreation;
    private TypeCompte $typeCompte;
    private User $user;
    private Array $transaction=[] ;
    public function __construct(int $id=0,int $numero=0,float $solde=0,string $dateCreation='' ,string $typeCompte = '')
    {
        $this->id = $id;
        $this->numero = $numero;
        $this->solde = $solde;
        $this->dateCreation = $dateCreation;
        // $this->typeCompte = $typeCompte;
        $this->user = new User();
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getNumero(): int
    {
        return $this->numero;   
    }
    public function setNumero(int $numero): void
    {
        $this->numero = $numero;
    }
    public function getSolde(): float
    {
        return $this->solde;
    }
    public function setSolde(float $solde): void
    {
        $this->solde = $solde;
    }
    public function getDateCreation(): string
    {
        return $this->dateCreation;
    }
    public function setDateCreation(string $dateCreation): void
    {
        $this->dateCreation = $dateCreation;
    }
    public function getTypeCompte(): TypeCompte
    {
        return $this->typeCompte;
    }
    public function setTypeCompte(TypeCompte $typeCompte): void
    {
        $this->typeCompte = $typeCompte;
    }
    public function getUser(): User
    {
        return $this->user;
    }
    public function setUser(User $user): void
    {
        $this->user = $user;
    }
    public function getTransaction(): Array
    {
        return $this->transaction;
    }
    public function addTransaction(Array $transaction): void
    {
        $this->transaction = $transaction;

    }
    public static function toObject($data): static{

        $compte = new static(
            $data['id'],
            $data['numero'],
            $data['solde'],
            $data['dateCreation'],
            $data['typeCompte'],
        );  
        
        $compte->user = User::toObject($data['user']);
        $compte->transaction = array_map(fn($trans) => Transaction::toObject($trans), $data['transaction']);
       return $compte;
    }
    public  function toArray(): array{
        return [
            'id' => $this->getId(),
            'numero' => $this->getNumero(),
            'solde' => $this->getSolde(),
            'dateCreation' => $this->getDateCreation(),
            'typeCompte' => $this->getTypeCompte(),
            'user'=>$this->user->toArray(),
            'transaction'=>array_map(fn($trans) => $trans->toArray(), $this->transaction),
        ];
    }

}
