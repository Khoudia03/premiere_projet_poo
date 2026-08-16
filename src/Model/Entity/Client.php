<?php

namespace App\Model\Entity;

class Client {
    private int $id;
    private string $nom;
    private string $prenom;
    private string $email;
    private string $tel;
    private float $limite_credit;

    public function __construct(int $id, string $nom, string $prenom, string $email, string $tel, float $limite_credit)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->tel = $tel;
        $this->limite_credit = $limite_credit;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getNomComplet(): string
    {
        return $this->prenom.' '.$this->nom;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getTel(): string
    {
        return $this->tel;
    }

    public function getLimiteCredit(): float
    {
        return $this->limite_credit;
    }
}