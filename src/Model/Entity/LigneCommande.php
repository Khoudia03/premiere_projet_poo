<?php

class LigneCommande {
    private int $id;
    private int $qte_commande;
    private float $prix_reel;
    private Commande $commande_id;
    private Produit $produit_id;

    public function getId(): ?int
    {
        return $this->id;
    }
}