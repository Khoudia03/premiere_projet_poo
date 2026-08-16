<?php

class ModePaiement {
    private int $id;
    private string $mode;

    public function __construct(int $id, string $mode)
    {
        $this->id = $id;
        $this->mode = $mode;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMode(): string
    {
        return $this->mode;
    }
}