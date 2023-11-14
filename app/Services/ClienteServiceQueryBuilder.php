<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ClienteServiceQueryBuilder
{
    protected $table = 'clientes';

    public function todo()
    {
        return DB::table($this->table)->get();
    }

    public function buscar($id)
    {
        $cliente = DB::table($this->table)->find($id);

        if (!$cliente) {
            throw new ModelNotFoundException("Cliente no encontrado");
        }

        return $cliente;
    }

    public function crearClienteTemporal()
    {
        return (object)[
            'nombre' => '',
            'credito' => '',
            'deuda' => '',
            'estado' => '',
            'vigencia' => 'A',
        ];
    }

    public function crear(array $data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function actualizar($id, array $data)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }

    public function borrar($id)
    {
        return DB::table($this->table)->where('id', $id)->delete();
    }
}