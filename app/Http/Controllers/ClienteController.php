<?php

namespace App\Http\Controllers;

use App\Models\ClienteModelo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ClienteController extends Controller
{
    protected $clienteModelo;

    public function __construct(ClienteModelo $clienteModelo)
    {
        $this->clienteModelo = $clienteModelo;
    }

    public function index()
    {
        $clientes = $this->clienteModelo->index(); // Asumiendo que este método no es estático
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
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'credito' => 'required|numeric|min:0',
            'deuda' => 'required|numeric|min:0',
            'estado' => ['required', Rule::in(['SINALOA', 'SONORA', 'DURANGO', 'BC'])],
            'vigencia' => 'required'
        ]);

        $this->clienteModelo->crear($validatedData);
        return redirect()->route('clientes.index');
    }

    public function edit($id)
    {
        $cliente = $this->clienteModelo->buscar($id);
        return view('cliente.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
{
    $datosValidados = $request->validate([
        'nombre' => 'required|string|max:255',
        'credito' => 'required|numeric|min:0',
        'deuda' => 'required|numeric|min:0',
        'estado' => ['required', Rule::in(['SINALOA', 'SONORA', 'DURANGO', 'BC'])],
        'vigencia' => 'required|string|in:A,B',
    ]);

    $this->clienteModelo->actualizar($id, $datosValidados);
    return redirect()->route('clientes.index');
}

    public function destroy($id)
    {
        $this->clienteModelo->borrar($id);
        return redirect()->route('clientes.index');
    }   
}
