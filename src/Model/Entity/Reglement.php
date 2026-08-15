<?php

class Reglement {
    private int $id;
    private DateTime $date;
    private float $montant;
    private Commande $commande_id;

    public function getId(): ?int
    {
        return $this->id;
    }
}