<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Modelo
{
    protected $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function todo()
    {
        return DB::select("SELECT * FROM $this->table");
    }

    public function buscar($id)
    {
        $result = DB::select("SELECT * FROM $this->table WHERE id = ?", [$id]);

        if (!empty($result)) {
            return $result[0];
        } else {
            abort(404, 'Registro no encontrado');
        }
    }

    public function crear(array $data)
    {
        $columns = implode(', ', array_keys($data));
        $values = implode(', ', array_fill(0, count($data), '?'));

        return DB::insert("INSERT INTO $this->table ($columns) VALUES ($values)", array_values($data));
    }

    public function actualizar($id, array $data)
    {
        $updates = implode(', ', array_map(function ($column) {
            return "$column = ?";
        }, array_keys($data)));

        return DB::update("UPDATE $this->table SET $updates WHERE id = ?", array_merge(array_values($data), [$id]));
    }

    public function borrar($id)
    {
        return DB::delete("DELETE FROM $this->table WHERE id = ?", [$id]);
    }
}