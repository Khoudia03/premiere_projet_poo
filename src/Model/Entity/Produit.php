<?php

class Produit {
    private int $id;
    private string $libelle;
    private float $prix_vente;
    private int $stock_initial;

    public function getId(): ?int
    {
        return $this->id;
    }
}