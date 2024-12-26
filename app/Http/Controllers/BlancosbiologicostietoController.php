<?php

namespace App\Http\Controllers;

use App\Models\Blancosbiologicostieto;
use Illuminate\Http\Request;
use App\Models\Blancosbiologico as blancosbiologicos; 

/**
 * Class BlancosbiologicostietoController
 * @package App\Http\Controllers
 */
class BlancosbiologicostietoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blancosbiologicostietos = Blancosbiologicostieto::paginate();

        return view('blancosbiologicostieto.index', compact('blancosbiologicostietos'))
            ->with('i', (request()->input('page', 1) - 1) * $blancosbiologicostietos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blancosbiologicostieto = new Blancosbiologicostieto();
        return view('blancosbiologicostieto.create', compact('blancosbiologicostieto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bbmother_bb_ti_id = $request->input('bbmother_bb_ti_id');
        $temp_aplica = $request->input('temp_aplica');
        $cultivo_bb_ti_id = $request->input('cultivo_bb_ti_id');
        $incidencia = $request->input('Incidencia');
        $nombre = blancosbiologicos::where('id', '=', $bbmother_bb_ti_id)->select('*')->get();

        foreach ($nombre as $blancobiologico) {
           $desc_bb_ti = $blancobiologico->blancobiologico;
       }

        if ($temp_aplica == 0) {
            $temp_aplicas = $request->input('clima');
        } else {
            $meses = $request->input('meses');
            $temp_aplicas = implode(',', $meses);
        }
        $tieto_bb_ti_id = $request->input('tieto_bb_ti_id');
        $num_apli = $request->input('num_apli');
       
        

        $productosused = Blancosbiologicostieto::create([
           'incidencia' => $incidencia,
           'temp_aplica' => $temp_aplicas,
           'num_apli' => $num_apli,
           'cultivo_bb_ti_id' => $cultivo_bb_ti_id,
           'bbmother_bb_ti_id' => $bbmother_bb_ti_id,
           'desc_bb_ti' => $desc_bb_ti,
           'tieto_bb_ti_id' => $tieto_bb_ti_id

      ]);

       return redirect()->action([TietoController::class, 'create'] , ['idtieto' => $tieto_bb_ti_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blancosbiologicostieto = Blancosbiologicostieto::find($id);

        return view('blancosbiologicostieto.show', compact('blancosbiologicostieto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $idtieto = $request->input('idtieto');
        $Blancosbiologicostietos = Blancosbiologicostieto::find($id);

        return view('blancosbiologicostieto.edit', compact('Blancosbiologicostietos','idtieto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Blancosbiologicostieto $blancosbiologicostieto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blancosbiologicostieto $blancosbiologicostieto)
    {
        $id_bb_ti = $request->input('id_bb_ti');
        $incidencia = $request->input('incidencia');
        $num_apli = $request->input('num_apli');
        $temp_aplica = $request->input('temp_aplica');
        $idtieto = $request->input('idtieto');

        if ($temp_aplica == 0) {
            $temp_aplicas = $request->input('clima');
        } else {
            $meses = $request->input('meses');
            $temp_aplicas = implode(',', $meses);
        }

        $blancosbiologicostietos = Blancosbiologicostieto::where('id_bb_ti','=', $id_bb_ti)->update([
            'incidencia' => $incidencia,
            'temp_aplica' => $temp_aplicas,
            'num_apli' => $num_apli,
        ]);
        
        return redirect()->action([TietoController::class, 'create'] , ['idtieto' => $idtieto]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request,$id)
    {
        $idtieto = $request->input('idtieto');
        $blancosbiologicostieto = Blancosbiologicostieto::where('id_bb_ti', '=', $id)->delete();

        return redirect()->action([TietoController::class, 'create'] , ['idtieto' => $idtieto]);
    }
}
