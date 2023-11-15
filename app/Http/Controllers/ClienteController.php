<?php

namespace App\Http\Controllers;

use App\Models\ClienteModelo;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    protected $clienteModelo;

    public function __construct(ClienteModelo $clienteModelo)
    {
        $this->clienteModelo = $clienteModelo;
    }

    public function index()
    {
        $clientes = $this->clienteModelo->todo();
        return view('cliente.index', compact('clientes'));
    }


    public function show($id)
    {
        $cliente = $this->clienteModelo->buscar($id);

        if (!$cliente) {
            abort(404, 'Cliente no encontrado');
        }

        return view('cliente.show', compact('cliente'));
    }

    public function create()
    {
        $cliente = $this->clienteModelo->crearClienteTemporal();
        return view('cliente.create', compact('cliente'));
    }

    public function store(Request $request)
    {
        $data = $this->validarDatos($request, ['nombre', 'credito', 'deuda', 'estado', 'vigencia']);
        $this->clienteModelo->crear($data);
        return redirect()->route('clientes.index');
    }

    public function edit($id)
    {
        $cliente = $this->clienteModelo->buscar($id);
        return view('cliente.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['nombre', 'credito', 'deuda', 'estado', 'vigencia']);
        $this->clienteModelo->actualizar($id, $data);
        return redirect()->route('clientes.index');
    }

    public function destroy($id)
    {
        $this->clienteModelo->borrar($id);
        return redirect()->route('clientes.index');
    }

    protected function validarDatos(Request $request, $campos)
    {
        return $request->only($campos);
    }

    
}
