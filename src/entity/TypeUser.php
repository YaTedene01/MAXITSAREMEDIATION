<?php
namespace App\Entity;
class TypeUser{
    private int $id;
    private string $libelle;
    private Array $user=[];

    public function __construct(int $id=0,string $libelle='')
    {
        $this->id = $id;
        $this->libelle = $libelle;
    }
    public function getId(): int{
        return $this->id;
    }
    public function setId(int $id): void{
        $this->id=$id;
    }
    public function getLibelle(): string
    {
        return $this->libelle;
    }
    public function setLibelle(string $libelle): void
    {
        $this->libelle = $libelle;
    }
    public function getUser(): Array
    {
        return $this->user;
    }
    public function addUser(array $user): void
    {
        $this->user[] = $user;
    }
    public static function toObject(array $data): static{
        $typeUser = new static(
            $data ['id'],
        $data ['libelle']
        );
        $typeUser->user = array_map(fn($user) => User::toObject($user), $data['user']);
        return $typeUser;
    }
    public function toArray(): array{
        return [
            'id'=>$this->getId(),
            'libelle' => $this->getLibelle(),
            'user' => array_map(fn($user) => $user->toArray(), $this->getUser()),
        ];
    }
}