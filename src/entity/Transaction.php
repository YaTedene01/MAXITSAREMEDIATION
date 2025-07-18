<?php
namespace App\entity;
use App\entity\TypeTransaction;
use App\entity\StatutTransaction;
use App\entity\Compte;
class Transaction{
    private int $id;
    private string $dateTransaction;
    private float $montant;
    private string $typeTransaction;
    private ?Compte $compte;
    private string $statutTransaction;
    public function __construct(int $id=0,string $dateTransaction='',float $montant =0,string $typeTransaction = '' ,string $statutTransaction ='pas cool', ?Compte $compte = null)
    {
        $this->id = $id;
        $this->dateTransaction = $dateTransaction ;
        $this->montant = $montant;
        $this->typeTransaction = $typeTransaction;
        $this->statutTransaction = $statutTransaction;

        $this->compte = $compte ?? new Compte();
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;

   }
   public function getDateTransaction(): string
   {
       return $this->dateTransaction;
   }
   public function setDateTransaction(string $dateTransaction): void
    {
        $this->dateTransaction = $dateTransaction;
    }
    public function getMontant(): float
    {
        return $this->montant;
    }
    public function setMontant(float $montant): void
    {
        $this->montant = $montant;
    }
    public function getTypeTransaction(): string
    {
        return $this->typeTransaction;
    }
    public function setTypeTransaction(string $typeTransaction): void
    {
        $this->typeTransaction = $typeTransaction;
    }
    public function getCompte(): Compte
    {
        return $this->compte;
    }
    public function setCompte(Compte $compte): void
    {
        $this->compte = $compte;
    }
    public function getStatutTransaction(): string
    {
        return $this->statutTransaction;
    }
    public function setStatutTransaction(string $statutTransaction): void
    {
        $this->statutTransaction = $statutTransaction;
    }
   public static function toObject($data):static{

        
    //    $transaction=new self(
    //     $data['id'],
    //     dateTransaction: $data['datetransaction'],
    //             $data['montant'],

    //     // $data['montant']
    //     // $data['typeTransaction'],
    //     // $data['statutTransaction'],

    //    );
    // //    $transaction->compte = Compte::toObject($data['compte']);
    //    return $transaction;

    return new self(
    (int)$data['id'],
    $data['datetransaction'],
    $data['montant'],
    $data['typetransaction'],
    $data['statuttransaction'],
    

    
);
    }
    public function toArray(): array{
        return [
            'id' => $this->getId(),
            'dateTransaction' => $this->getDateTransaction(),
            'montant' => $this->getMontant(),
            'typeTransaction' => $this->getTypeTransaction(),
            'statutTransaction' => $this->getStatutTransaction(),
            'compte'=>$this->compte->toArray(),
        ];
    }

 }
    