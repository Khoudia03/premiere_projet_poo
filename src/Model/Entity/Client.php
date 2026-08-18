<?php

namespace App\Model\Entity;

class Client
{
    public int $id;
    public string $nom;
    public string $prenom;
    public ?string $email;
    public ?string $tel;
    private float $limiteCredit;
    private array $commandes = [];

    public function __construct(int $id,string $nom,string $prenom,?string $email,?string $tel,float $limiteCredit) 
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->tel = $tel;
        $this->limiteCredit = $limiteCredit;
    }

    public function getLimiteCredit(): float { return $this->limiteCredit; }

    public function setLimiteCredit(float $limiteCredit): void
    {
        if ($limiteCredit >= 0) 
        {
            $this->limiteCredit = $limiteCredit;
        }
    }

    public function getCommandes(): array
    {
        return $this->commandes;
    }

    public function ajouterCommande(Commande $commande): void
    {
        $this->commandes[] = $commande;
    }
}