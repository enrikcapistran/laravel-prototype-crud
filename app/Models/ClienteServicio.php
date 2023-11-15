<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use App\Models\Clientes;
use App\Models\ClienteModelo;

class ClienteServicio
{
    public static function index()
    {
        return DB::select('select * from clientes');
    }
    

    public static function store($cliente)
    {
        DB::table('clientes')->insert([
            'nombre' => $cliente->getNombre(),
            'credito' => $cliente->getCredito(),
            'deuda' => $cliente->getDeuda(),
            'estado' => $cliente->getEstado(),
            'vigencia' => $cliente->getVigencia(),
        ]);
    }

    public static function actualizar(array $data, $id)
    {
        // Assuming $data contains the necessary fields for updating a client
        DB::update('update clientes set nombre = ?, credito = ?, deuda = ?, estado = ?, vigencia = ?, updated_at = ? where id = ?', [
            $data['nombre'],
            $data['credito'],
            $data['deuda'],
            $data['estado'],
            $data['vigencia'],
            now(), // assuming 'updated_at' is a timestamp field
            $id,
        ]);
    }

    public static function delete($id)
    {
        DB::delete('DELETE FROM clientes WHERE id = ?', [$id]);
    }
}
