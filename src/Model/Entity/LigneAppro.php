<?php

class LigneAppro
{
    public int $id;
    private int $qteAppro;
    private int $qteRecu;
    private float $prixReel;
    public Approvisionnement $approvisionnement;
    public Produit $produit;

    public function __construct(int $id,int $qteAppro,int $qteRecu,float $prixReel,Approvisionnement $approvisionnement,Produit $produit) 
    {
        $this->id = $id;
        $this->qteAppro = $qteAppro;
        $this->qteRecu = $qteRecu;
        $this->prixReel = $prixReel;
        $this->approvisionnement = $approvisionnement;
        $this->produit = $produit;
    }

    public function getQteAppro(): int { return $this->qteAppro; }

    public function setQteAppro(int $qte): void
    {
        if ($qte > 0) 
        {
            $this->qteAppro = $qte;
        }
    }

    public function getQteRecu(): int { return $this->qteRecu; }

    public function setQteRecu(int $qte): void
    {
        if ($qte >= 0) 
        {
            $this->qteRecu = $qte;
        }
    }

    public function getPrixReel(): float { return $this->prixReel; }

    public function setPrixReel(float $prix): void
    {
        if ($prix > 0) 
        {
            $this->prixReel = $prix;
        }
    }

    public function getApprovisionnement(): Approvisionnement
    {
        return $this->approvisionnement;
    }

    public function getProduit(): Produit
    {
        return $this->produit;
    }
}