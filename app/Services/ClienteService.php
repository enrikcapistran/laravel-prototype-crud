<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class ClienteService
{
    protected $table = 'clientes';

    public function index()
    {
        $clientes = DB::select("SELECT * FROM {$this->table}");
        return $clientes;
    }

    public function buscar($id)
    {
        $cliente = DB::select("SELECT * FROM {$this->table} WHERE id = :id", ['id' => $id]);

        if (empty($cliente)) {
            abort(404, 'Cliente no encontrado');
        }

        return $cliente[0];
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
        DB::table($this->table)->insert($data);
    }

    public function actualizar($id, array $data)
    {
        DB::update("UPDATE {$this->table} SET nombre = ?, credito = ?, deuda = ?, estado = ?, vigencia = ? WHERE id = ?", [
            $data['nombre'],
            $data['credito'],
            $data['deuda'],
            $data['estado'],
            $data['vigencia'],
            $id
        ]);
    }

    public function borrar($id)
    {
        DB::delete("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }
}
