<?php

namespace App\Models;

use Illuminate\Http\Request;
use App\Models\ClienteServicio;
use App\Models\Clientes;

class ClienteModelo
{
    public function index()
    {
        $json = ClienteServicio::index();
        return $this->mapClientes($json);
    }

    public function store(Request $request)
    {
        $cliente = $this->crearClientePorRequest($request);
        ClienteServicio::store($cliente);
    }

    public function editar(Request $request, string $id)
    {
        $cliente = $this->crearClientePorRequest($request, $id);
        ClienteServicio::editar($cliente);
    }

    public function eliminar(string $id)
    {
        ClienteServicio::delete($id);
    }

    private function mapClientes($json)
    {
        $clientes = [];
        foreach ($json as $value) {
            $clientes[] = new Clientes($value->id, $value->nombre, $value->credito, $value->deuda, $value->estado, $value->vigencia);
        }
        return $clientes;
    }

    private function crearClientePorRequest(Request $request, $id = null)
    {
        $nombre = $request->input('nombre');
        $credito = $request->input('credito');
        $deuda = $request->input('deuda');
        $estado = $request->input('estado');
        $vigencia = $request->input('vigencia');

        return new Clientes($id, $nombre, $credito, $deuda, $estado, $vigencia);
    }
}
