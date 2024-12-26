<?php

namespace App\Http\Controllers;

use App\Models\Blancosbiologico;
use Illuminate\Http\Request;

/**
 * Class BlancosbiologicoController
 * @package App\Http\Controllers
 */
class BlancosbiologicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blancosbiologicos = Blancosbiologico::paginate();

        return view('blancosbiologico.index', compact('blancosbiologicos'))
            ->with('i', (request()->input('page', 1) - 1) * $blancosbiologicos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blancosbiologico = new Blancosbiologico();
        return view('blancosbiologico.create', compact('blancosbiologico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Blancosbiologico::$rules);

        $blancosbiologico = Blancosbiologico::create($request->all());

        return redirect()->route('blancosbiologicos.index')
            ->with('success', 'Blancosbiologico created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blancosbiologico = Blancosbiologico::find($id);

        return view('blancosbiologico.show', compact('blancosbiologico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blancosbiologico = Blancosbiologico::find($id);

        return view('blancosbiologico.edit', compact('blancosbiologico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Blancosbiologico $blancosbiologico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blancosbiologico $blancosbiologico)
    {
        request()->validate(Blancosbiologico::$rules);

        $blancosbiologico->update($request->all());

        return redirect()->route('blancosbiologicos.index')
            ->with('success', 'Blancosbiologico updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $blancosbiologico = Blancosbiologico::find($id)->delete();

        return redirect()->route('blancosbiologicos.index')
            ->with('success', 'Blancosbiologico deleted successfully');
    }
}
