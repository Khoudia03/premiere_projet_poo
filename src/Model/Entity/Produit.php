<?php

namespace App\Model\Entity;

class Produit
{
    public int $id;
    public string $libelle;
    private float $prixVente;
    private int $stockInitial;
    private array $lignesCommande = [];
    private array $lignesAppro = [];

    public function __construct(int $id,string $libelle,float $prixVente,int $stockInitial) 
    {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->prixVente = $prixVente;
        $this->stockInitial = $stockInitial;
    }

    public function getPrixVente(): float { return $this->prixVente; }

    public function setPrixVente(float $prixVente): void
    {
        if ($prixVente > 0) 
        {
            $this->prixVente = $prixVente;
        }
    }

    public function getStockInitial(): int { return $this->stockInitial; }

    public function setStockInitial(int $stockInitial): void
    {
        if ($stockInitial > 0) 
        {
            $this->stockInitial = $stockInitial;
        }
    }

    public function getLignesCommande(): array
    {
        return $this->lignesCommande;
    }

    public function ajouterLigneCommande(LigneCommande $ligne): void
    {
        $this->lignesCommande[] = $ligne;
    }

    public function getLignesAppro(): array
    {
        return $this->lignesAppro;
    }

    public function ajouterLigneAppro(LigneAppro $ligne): void
    {
        $this->lignesAppro[] = $ligne;
    }
}