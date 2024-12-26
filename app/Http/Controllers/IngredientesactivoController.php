<?php

namespace App\Http\Controllers;

use App\Models\Ingredientesactivo;
use Illuminate\Http\Request;

/**
 * Class IngredientesactivoController
 * @package App\Http\Controllers
 */
class IngredientesactivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredientesactivos = Ingredientesactivo::paginate();

        return view('ingredientesactivo.index', compact('ingredientesactivos'))
            ->with('i', (request()->input('page', 1) - 1) * $ingredientesactivos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingredientesactivo = new Ingredientesactivo();
        return view('ingredientesactivo.create', compact('ingredientesactivo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Ingredientesactivo::$rules);

        $ingredientesactivo = Ingredientesactivo::create($request->all());

        return redirect()->route('ingredientesactivos.index')
            ->with('success', 'Ingredientesactivo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingredientesactivo = Ingredientesactivo::find($id);

        return view('ingredientesactivo.show', compact('ingredientesactivo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingredientesactivo = Ingredientesactivo::find($id);

        return view('ingredientesactivo.edit', compact('ingredientesactivo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ingredientesactivo $ingredientesactivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredientesactivo $ingredientesactivo)
    {
        request()->validate(Ingredientesactivo::$rules);

        $ingredientesactivo->update($request->all());

        return redirect()->route('ingredientesactivos.index')
            ->with('success', 'Ingredientesactivo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ingredientesactivo = Ingredientesactivo::find($id)->delete();

        return redirect()->route('ingredientesactivos.index')
            ->with('success', 'Ingredientesactivo deleted successfully');
    }
}
