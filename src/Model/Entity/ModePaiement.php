<?php

class ModePaiement
{
    public int $id;
    private string $mode;
    public array $commandes = [];
    public array $reglements = [];

    public function __construct(int $id, string $mode)
    {
        $this->id = $id;
        $this->mode = $mode;
    }


    public function getMode(): string
    {
        return $this->mode;
    }

    public function setMode(string $mode): void
    {
        if($mode == 'Orange Money' || $mode == 'Wave' || $mode == 'Cash')
        {
            $this->mode = $mode;
        }
    }

    public function getCommandes(): array
    {
        return $this->commandes;
    }

    public function ajouterCommande(Commande $commande): void
    {
        $this->commandes[] = $commande;
    }

    public function getReglements(): array
    {
        return $this->reglements;
    }

    public function ajouterReglement(Reglement $reglement): void
    {
        $this->reglements[] = $reglement;
    }
}