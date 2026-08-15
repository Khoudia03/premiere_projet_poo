<?php

class Fournisseur {
    private int $id;
    private string $nom;
    private string $email;
    private string $tel;
    private string $adresse;

    public function getId(): ?int
    {
        return $this->id;
    }
}