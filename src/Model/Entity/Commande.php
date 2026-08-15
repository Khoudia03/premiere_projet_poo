<?php

class Commande {
    private int $id;
    private DateTime $date_commande;
    private float $montant_initial;
    private float $avance;
    private Client $client_id;
    private ModePaiement $mode_paiement_id;
    private Utilisateur $utilisateur_id;

    public function getId(): ?int
    {
        return $this->id;
    }
}