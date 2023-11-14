<?php

namespace App\Services;

use App\Models\Cliente;

class ClienteServiceEloquent
{
    protected $cliente;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function todo()
    {
        return $this->cliente->all();
    }

    public function buscar($id)
    {
        return $this->cliente->findOrFail($id);
    }

    public function crearClienteTemporal()
    {
        return new Cliente();
    }

    public function crear(array $data)
    {
        return $this->cliente->create($data);
    }

    public function actualizar($id, array $data)
    {
        
    dd($data); // Agrega esta línea para depurar
        $cliente = $this->cliente->findOrFail($id);
        $cliente->update($data);
        return $cliente;
    }

    public function borrar($id)
    {
        $cliente = $this->cliente->findOrFail($id);
        $cliente->delete();
    }
}

