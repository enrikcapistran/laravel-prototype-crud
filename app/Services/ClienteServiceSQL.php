<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class ClienteServiceSQL
{
    protected $table = 'clientes';

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
            abort(404, 'Cliente no encontrado'); 
        }
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
        return DB::insert("INSERT INTO $this->table (nombre, credito, deuda, estado, vigencia) 
        VALUES (?, ?, ?, ?, ?)", $data);
    }

    public function actualizar($id, array $data)
{
    //dd($data); 
    return DB::update("UPDATE $this->table 
        SET nombre = ?, credito = ?, deuda = ?, estado = ?, vigencia = ? 
        WHERE id = ?", [$data['nombre'], $data['credito'], $data['deuda'], $data['estado'], $data['vigencia'], $id]);
}

    public function borrar($id)
    {
        return DB::delete("DELETE FROM $this->table WHERE id = ?", [$id]);
    }
}