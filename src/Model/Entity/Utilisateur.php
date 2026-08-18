<?php

class Utilisateur
{
    public int $id;
    public string $nomComplet;
    public string $email;
    public string $motPasse;
    public ?string $adresse;
    public ?string $tel;
    public Role $role;
    public array $commandes = [];
    public array $approvisionnements = [];

    public function __construct(int $id,string $nomComplet,string $email,string $motPasse,?string $adresse,?string $tel,Role $role)
    {
        $this->id = $id;
        $this->nomComplet = $nomComplet;
        $this->email = $email;
        $this->motPasse = $motPasse;
        $this->adresse = $adresse;
        $this->tel = $tel;
        $this->role = $role;
    }

    public function getCommandes(): array
    {
        return $this->commandes;
    }

    public function ajouterCommande(Commande $commande): void
    {
        $this->commandes[] = $commande;
    }

    public function getApprovisionnements(): array
    {
        return $this->approvisionnements;
    }

    public function ajouterApprovisionnement(Approvisionnement $approvisionnement): void 
    {
        $this->approvisionnements[] = $approvisionnement;
    }
}