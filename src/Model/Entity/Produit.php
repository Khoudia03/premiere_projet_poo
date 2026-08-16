<?php

namespace App\Model\Entity;

class Produit {
    private int $id;
    private string $libelle;
    private float $prix_vente;
    private int $stock_initial;

    public function __construct(int $id, string $libelle, float $prix_vente, int $stock_initial)
    {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->prix_vente = $prix_vente;
        $this->stock_initial = $stock_initial;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): string
    {
        return $this->libelle;
    }

    public function getPrixVente(): float
    {
        return $this->prix_vente;
    }

    public function getStockInitial(): int
    {
        return $this->stock_initial;
    }
}