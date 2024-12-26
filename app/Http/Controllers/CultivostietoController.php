<?php

namespace App\Http\Controllers;

use App\Models\Cultivostieto;
use Illuminate\Http\Request;
use App\Http\Controllers\TietoController as TietoController;
use App\Models\Producto as producto; 
use App\Models\Cultivo as cultivo;

/**
 * Class CultivostietoController
 * @package App\Http\Controllers
 */
class CultivostietoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cultivostietos = Cultivostieto::paginate();

        return view('cultivostieto.index', compact('cultivostietos'))
            ->with('i', (request()->input('page', 1) - 1) * $cultivostietos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cultivostieto = new Cultivostieto();
        return view('cultivostieto.create', compact('cultivostieto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hectareas = $request->input('hectareas');
        $idtieto = $request->input('tieto_cult_ti_id');
        $cultmother = $request->input('cultmother_cult_ti_id');
        $cultiv = cultivo::where('id', '=', $cultmother)->select('cultivo')->get();

        foreach ($cultiv as $cult) {
           $nane = $cult->cultivo;
       }

        $productosused = Cultivostieto::create([
           'desc_cult_ti' => $nane,
           'tieto_cult_ti_id' => $idtieto,
           'cultmother_cult_ti_id' => $cultmother,
           'hectareas' => $hectareas

      ]);

       return redirect()->action([TietoController::class, 'create'] , ['idtieto' => $idtieto]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cultivostieto = Cultivostieto::find($id);

        return view('cultivostieto.show', compact('cultivostieto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cultivostieto = Cultivostieto::find($id);

        return view('cultivostieto.edit', compact('cultivostieto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cultivostieto $cultivostieto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cultivostieto $cultivostieto)
    {
        request()->validate(Cultivostieto::$rules);

        $cultivostieto->update($request->all());

        return redirect()->route('cultivostietos.index')
            ->with('success', 'Cultivostieto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id,Request $request)
    {
        $idtieto = $request->input('idtieto');

        $cultivosused = Cultivostieto::where('id_cult_ti', '=', $id)->select('*')->delete();

        return redirect()->action([TietoController::class, 'create'] , ['idtieto' => $idtieto]);
    }
}
