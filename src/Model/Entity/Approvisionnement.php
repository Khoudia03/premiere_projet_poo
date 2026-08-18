<?php

class Approvisionnement
{
    public string $refBl;
    public DateTime $dateAppro;
    public Fournisseur $fournisseur;
    public StatutAppro $statutAppro;
    public Utilisateur $utilisateur;
    public array $lignesAppro = [];

    public function __construct(string $refBl,DateTime $dateAppro,Fournisseur $fournisseur,StatutAppro $statutAppro,Utilisateur $utilisateur)
    {
        $this->refBl = $refBl;
        $this->dateAppro = $dateAppro;
        $this->fournisseur = $fournisseur;
        $this->statutAppro = $statutAppro;
        $this->utilisateur = $utilisateur;
    }

    public function ajouterLigneAppro(LigneAppro $ligne): void
    {
        $this->lignesAppro[] = $ligne;
    }
}