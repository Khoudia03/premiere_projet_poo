<?php

class StatutAppro {
    public int $id;
    private string $nom;

    public function getNom(): ?int
    {
        return $this->nom;
    }
    public function setNom(string $nom): void 
    {
        if($nom == 'RECEPTIONNE' || $nom == 'EN ATTENTE' || $nom == 'EN COURS')
        {
            $this->nom = $nom;
        }
    }
}