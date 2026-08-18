<?php

namespace App\Model\Entity;


class Fournisseur
{
    public int $id;
    public string $nom;
    public ?string $email;
    public ?string $tel;
    public ?string $adresse;
    private array $approvisionnements = [];

    public function __construct(int $id,string $nom,?string $email,?string $tel,?string $adresse)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->tel = $tel;
        $this->adresse = $adresse;
    }

    public function getApprovisionnements(): array
    {
        return $this->approvisionnements;
    }

    public function ajouterApprovisionnement(Approvisionnement $appro): void
    {
        $this->approvisionnements[] = $appro;
    }
}