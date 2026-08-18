<?php

class Dette
{
    public int $id;
    private float $montantInitial;
    private float $montantRestant;
    public DateTime $dateCreation;
    public ?DateTime $dateEcheance;
    private string $statut;
    private Commande $commande;
    private array $reglements = [];

    public function __construct(int $id,float $montantInitial,float $montantRestant,DateTime $dateCreation,?DateTime $dateEcheance,string $statut,Commande $commande) 
    {
        $this->id = $id;
        $this->montantInitial = $montantInitial;
        $this->montantRestant = $montantRestant;
        $this->dateCreation = $dateCreation;
        $this->dateEcheance = $dateEcheance;
        $this->statut = $statut;
        $this->commande = $commande;
    }

    public function getMontantInitial(): float
    {
        return $this->montantInitial;
    }

    public function setMontantInitial(float $montant): void
    {
        if ($montant >= 0) 
        {
            $this->montantInitial = $montant;
        }
    }

    public function getMontantRestant(): float
    {
        return $this->montantRestant;
    }

    public function setMontantRestant(float $montant): void
    {
        if ($montant >= 0 && $montant <= $this->montantInitial) 
        {
            $this->montantRestant = $montant;
        }
    }

    public function getStatut(): string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): void
    {
        if ($statut === 'Solde' || $statut === 'Non solde') 
        {
            $this->statut = $statut;
        }
    }

    public function getReglements(): array
    {
        return $this->reglements;
    }

    public function ajouterReglement(Reglement $reglement): void
    {
        $this->reglements[] = $reglement;
    }

    public function rembourser(float $montant): void
    {
        if ($montant <= 0) 
        {
            throw new Exception("Le montant doit être positif.");
        }

        if ($montant > $this->montantRestant) {
            throw new Exception("Le remboursement dépasse la dette.");
        }

        $this->montantRestant -= $montant;

        if ($this->montantRestant == 0) {
            $this->statut = 'Solde';
        }
    }
}