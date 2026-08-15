<?php

class ModePaiement {
    private int $id;
    private string $mode;

    public function getId(): ?int
    {
        return $this->id;
    }
}