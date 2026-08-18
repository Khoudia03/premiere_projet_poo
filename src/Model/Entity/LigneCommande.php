<?php

class LigneCommande
{
    public int $id;
    private int $qteCommande;
    private float $prixReel;
    public Commande $commande;
    public Produit $produit;

    public function __construct(int $id,int $qteCommande,float $prixReel,Commande $commande,Produit $produit)
    {
        $this->id = $id;
        $this->qteCommande = $qteCommande;
        $this->prixReel = $prixReel;
        $this->commande = $commande;
        $this->produit = $produit;
    }

    public function getQteCommande(): int { return $this->qteCommande; }

    public function setQteCommande(int $qte): void
    {
        if ($qte > 0) 
        {
            $this->qteCommande = $qte;
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
}