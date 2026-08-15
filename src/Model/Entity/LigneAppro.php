<?php

class LigneAppro {
    private int $id;
    private int $qte_appro;
    private int $qte_recu;
    private float $prix_reel;
    private Approvisionnement $appro_id;
    private Produit $produit_id;

    public function getId(): ?int
    {
        return $this->id;
    }
}