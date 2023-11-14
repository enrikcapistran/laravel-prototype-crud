<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Services\ClienteService;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    protected $cliente;

    public function __construct(ClienteService $cliente)
    {
        $this->cliente = $cliente;
    }

    public function index()
    {
        $clientes = $this->cliente->todo();
        return view('cliente.index', compact('clientes'));
    }

    public function show($id)
    {
        $cliente = $this->cliente->buscar($id);
        return view('cliente.show', compact('cliente'));
    }

    public function create()
    {
        $cliente = $this->cliente->crearClienteTemporal();
        return view('cliente.create', compact('cliente'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'credito' => 'required|numeric|min:0',
            'deuda' => 'required|numeric|min:0',
            'estado' => 'required|in:BC,DURANGO,SINALOA,SONORA',
            'vigencia' => 'required|in:A,Z',
        ]);

        $this->cliente->crear($data);

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente creado exitosamente.');
    }

    public function edit($id)
    {
        $cliente = $this->cliente->buscar($id);
        return view('cliente.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'credito' => 'required|numeric|min:0',
            'deuda' => 'required|numeric|min:0',
            'estado' => 'required|in:BC,DURANGO,SINALOA,SONORA',
            'vigencia' => 'required|in:A,Z',
        ]);

        $this->cliente->actualizar($id, $data);

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente ha sido actualizado.');
    }

    public function destroy($id)
    {
        $this->cliente->borrar($id);

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente ha sido eliminado.');
    }
}