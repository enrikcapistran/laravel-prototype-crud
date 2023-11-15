<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function actualizar($id, array $data)
    {   
        // Assuming $data contains the necessary fields for updating a client
        ClienteServicio::actualizar($data, $id);
        // Assuming $data contains the necessary fields for updating a client
        return new Clientes(
            $id,
            $data['nombre'],
            $data['credito'],
            $data['deuda'],
            $data['estado'],
            $data['vigencia']
        );
        
    }

    public function buscar($id)
    {
        $result = DB::select('SELECT * FROM clientes WHERE id = ?', [$id]);

        if (count($result) > 0) {
            $clienteData = $result[0];
            return new Clientes($clienteData->id, $clienteData->nombre, $clienteData->credito, $clienteData->deuda, $clienteData->estado, $clienteData->vigencia);
        } else {
            // Handle not found case, for example, return null or throw an exception
            return null;
        }
    }

    public function borrar(string $id)
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

    public function crearClienteTemporal()
    {
        // You can customize this method to create a temporary client
        // For example, creating a client with default values for a new entry

        $nombreTemporal = ''; // Unique name
        $creditoTemporal = 0; // Default credit
        $deudaTemporal = 0; // Default debt
        $estadoTemporal = 'SINALOA'; // Default state
        $vigenciaTemporal = 'A'; // Default status (Active)

        return new Clientes(null, $nombreTemporal, $creditoTemporal, $deudaTemporal, $estadoTemporal, $vigenciaTemporal);
    }

    public function actualizarClienteTemporal(array $data)
    {
        // Assuming $data contains the necessary fields for updating the temporary client
        $this->crearClienteTemporal()->actualizar($data);
    }

    public function crear(array $data)
    {
        // Assuming $data contains the necessary fields for creating a client
        $cliente = new Clientes(
            null,
            $data['nombre'],
            $data['credito'],
            $data['deuda'],
            $data['estado'],
            $data['vigencia']
        );
        ClienteServicio::store($cliente);
    }
}
