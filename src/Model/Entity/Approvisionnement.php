<?php

class Approvisionnement {
    private int $id;
    private string $ref_bl;
    private DateTime $date_appro;
    private Fournisseur $fournisseur_id;
    private StatutAppro $statut_appro_id;
    private Utilisateur $utilisateur_id;

    public function getId(): ?int
    {
        return $this->id;
    }
}