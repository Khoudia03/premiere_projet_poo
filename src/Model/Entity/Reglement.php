<?php

class Reglement {
    public int $id;
    public DateTime $date;
    private float $montant;
    public Commande $commande_id;

    public function getMontant(): ?int
    {
        return $this->montant;
    }
    public function setMontant(float $montant): void 
    {
        if($montant >= 0)
        {
            $this->montant = $montant;
        }
    }
}