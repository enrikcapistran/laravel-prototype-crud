<?php

namespace App\Http\Controllers;

use App\Models\Deuda;
use Illuminate\Http\Request;

/**
 * Class DeudaController
 * @package App\Http\Controllers
 */
class DeudaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deudas = Deuda::paginate();

        return view('deuda.index', compact('deudas'))
            ->with('i', (request()->input('page', 1) - 1) * $deudas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deuda = new Deuda();
        return view('deuda.create', compact('deuda'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Deuda::$rules);

        $deuda = Deuda::create($request->all());

        return redirect()->route('deudas.index')
            ->with('success', 'Deuda created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deuda = Deuda::find($id);

        return view('deuda.show', compact('deuda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deuda = Deuda::find($id);

        return view('deuda.edit', compact('deuda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Deuda $deuda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deuda $deuda)
    {
        request()->validate(Deuda::$rules);

        $deuda->update($request->all());

        return redirect()->route('deudas.index')
            ->with('success', 'Deuda updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $deuda = Deuda::find($id)->delete();

        return redirect()->route('deudas.index')
            ->with('success', 'Deuda deleted successfully');
    }
}
