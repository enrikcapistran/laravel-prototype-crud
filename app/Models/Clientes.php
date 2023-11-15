<?php

namespace App\Models;

class Clientes
{
    public ?int $id;
    public string $nombre;
    public float $credito;
    public float $deuda;
    public string $estado;
    public string $vigencia;

    public function __construct(?int $id, string $nombre, float $credito, float $deuda, string $estado, string $vigencia)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->credito = $credito;
        $this->deuda = $deuda;
        $this->estado = $estado;
        $this->vigencia = $vigencia;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getCredito(): float
    {
        return $this->credito;
    }

    public function getDeuda(): float
    {
        return $this->deuda;
    }

    public function getEstado(): string
    {
        return $this->estado;
    }

    public function getVigencia(): string
    {
        return $this->vigencia;
    }

}
