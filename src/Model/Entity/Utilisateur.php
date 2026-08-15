<?php

class Utilisateur {
    private int $id;
    private string $nom;
    private string $email;
    private string $mot_passe;
    private string $adresse;
    private string $tel;
    private Role $role_id;

    public function getId(): ?int
    {
        return $this->id;
    }
}