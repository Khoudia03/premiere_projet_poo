<?php

class Commande
{
    public int $id;
    public DateTime $dateCommande;
    private float $montantInitial;
    private float $avance;
    public Client $client;
    public ModePaiement $modePaiement;
    public Utilisateur $utilisateur;
    public array $lignesCommande = [];
    public ?Dette $dette = null;
    public array $reglements = [];

    public function __construct( int $id, DateTime $dateCommande, float $montantInitial, float $avance, Client $client, ModePaiement $modePaiement, Utilisateur $utilisateur)
    {
        $this->id = $id;
        $this->dateCommande = $dateCommande;
        $this->montantInitial = $montantInitial;
        $this->avance = $avance;
        $this->client = $client;
        $this->modePaiement = $modePaiement;
        $this->utilisateur = $utilisateur;
    }

    public function getMontantInitial(): float
    {
        return $this->montantInitial;
    }

    public function setMontantInitial(float $montant): void
    {
        if ($montant > 0) 
        {
            $this->montantInitial = $montant;
        }
    }

    public function getAvance(): float
    {
        return $this->avance;
    }

    public function setAvance(float $avance): void
    {
        if ($avance >= 0 && $avance <= $this->montantInitial)
        {
            $this->avance = $avance;
        }
    }
}