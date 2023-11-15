<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use App\Models\Clientes;

class ClienteServicio
{
    public static function index()
    {
        return DB::select('select * from clientes');
    }

    public static function store($cliente)
    {
        DB::insert('insert into clientes (nombre,credito,deuda,estado,vigencia,created_at) values (?,?,?,?,?,?)', [$cliente->getNombre(), $cliente->getCredito(), $cliente->getDeuda(), $cliente->getEstado(), $cliente->getVigencia(), date('Y-m-d H:i:s')]);
    }

    public static function editar($cliente)
    {
        DB::update('update clientes set nombre = ?, credito = ?, deuda = ?, estado = ?, vigencia = ?, updated_at = ? where id = ?', [$cliente->getNombre(), $cliente->getCredito(), $cliente->getDeuda(), $cliente->getEstado(), $cliente->getVigencia(), date('Y-m-d H:i:s'), $cliente->getId()]);
    }

    public static function delete($id)
    {
        DB::update('update clientes set Vigencia = ? where id = ?', ['A', $id]);
    }
}
