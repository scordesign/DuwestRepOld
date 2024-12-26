<?php

namespace App\Http\Controllers;

use App\Models\Cultivo;
use Illuminate\Http\Request;

/**
 * Class CultivoController
 * @package App\Http\Controllers
 */
class CultivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cultivos = Cultivo::paginate();

        return view('cultivo.index', compact('cultivos'))
            ->with('i', (request()->input('page', 1) - 1) * $cultivos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cultivo = new Cultivo();
        return view('cultivo.create', compact('cultivo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Cultivo::$rules);

        $cultivo = Cultivo::create($request->all());

        return redirect()->route('cultivos.index')
            ->with('success', 'Cultivo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cultivo = Cultivo::find($id);

        return view('cultivo.show', compact('cultivo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cultivo = Cultivo::find($id);

        return view('cultivo.edit', compact('cultivo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cultivo $cultivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cultivo $cultivo)
    {
        request()->validate(Cultivo::$rules);

        $cultivo->update($request->all());

        return redirect()->route('cultivos.index')
            ->with('success', 'Cultivo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cultivo = Cultivo::find($id)->delete();

        return redirect()->route('cultivos.index')
            ->with('success', 'Cultivo deleted successfully');
    }
}
