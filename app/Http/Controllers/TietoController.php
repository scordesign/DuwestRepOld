<?php

namespace App\Http\Controllers;

use App\Models\Tieto;
use Illuminate\Http\Request;
use App\Models\Ingredientesactivosused;
use App\Models\Blancosbiologico as blancosbiologicos; 
use App\Models\Cultivo as cultivo;
use App\Models\Ingredientesactivo as Ingredientesactivo;
use App\Models\Cultivostieto as Cultivostietos;
use App\Models\Blancosbiologicostieto as Blancosbiologicostieto;
use App\Http\Controllers\TietoController as TietoController;
use App\Models\PreciosIng;




/**
 * Class TietoController
 * @package App\Http\Controllers
 */
class TietoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $idusu = auth()->id();
        $rolusu= auth()->user()->rol;
        $tietousu = Tieto::select('id_usu');


        if ($rolusu=='admin'){
        
            $tietos = Tieto::join('users', 'tietos.id_usu', '=', 'users.id')->select('tietos.desc as desc','users.name as id_usu','tietos.id as id')->paginate();

        return view('tieto.index', compact('tietos'))
            ->with('i', (request()->input('page', 1) - 1) * $tietos->perPage());
       
        }
        else{
            // $tietousu = tieto()->id_usu;
            $tietos = Tieto::join('users', 'tietos.id_usu', '=', 'users.id')->select('tietos.desc as desc','users.name as id_usu','tietos.id as id')->where('tietos.id_usu', "=", $idusu)
            ->paginate();
            // $stuff = Stuff::where('yourCondition', 1)
            // ->paginate(3);
            // $tietos = Tieto::paginate()->where($tietousu, '=', $idusu);

        return view('tieto.index', compact('tietos'))
            ->with('i', (request()->input('page', 1) - 1) * $tietos->perPage());
            
        }

   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tieto = new Tieto();

        $idusu = auth()->id();

        $idtietos = $request->get('idtieto');

        if ($idtietos == 0) {
            $newtieto = Tieto::create([
                'desc' => 'nueva tieto',
                'id_usu' => $idusu ,
                'estado' => 0
           ]);
           $tietocreada = Tieto::select('id')->limit(1)->orderBy('id', 'desc')
           ->get();
   
           foreach ($tietocreada as $tito) {
              $idtieto = $tito->id;
           }
           } else {
               $idtieto = $idtietos;
           }
        $blancobiologicogroup = Blancosbiologicostieto::select(Blancosbiologicostieto::raw('count(id_bb_ti) as counts,cultivo_bb_ti_id'))->where('tieto_bb_ti_id', '=', $idtieto)->groupByRaw('cultivo_bb_ti_id')
        ->get();

        $tietocreadarecien = Tieto::select('*')->where('id', '=', $idtieto)
        ->get();

        $Ingredientesactivo = Ingredientesactivo::select('id','nombre')
        ->get();

        $blancosbiologicos = blancosbiologicos::select('id','blancobiologico')
        ->get();

        $cultivos = cultivo::select('id','cultivo')
        ->get();

        $cultivostietos = Cultivostietos::where('tieto_cult_ti_id', '=', $idtieto)->select('*')
        ->get();

        $blancosbiologicostietos = Blancosbiologicostieto::join('blancosbiologicos', 'blancosbiologicostietos.bbmother_bb_ti_id', '=', 'blancosbiologicos.id')->where('tieto_bb_ti_id', '=', $idtieto)->select('*')
        ->get();  
        
        $ingredientesactivosusados = Ingredientesactivosused::where('tieto_ing_act_use', '=', $idtieto)->select('*')
        ->get();   



        return view('tieto.create', compact('tieto','ingredientesactivosusados','blancobiologicogroup','blancosbiologicostietos','cultivostietos','tietocreadarecien','Ingredientesactivo','blancosbiologicos','cultivos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $idtieto = $request->input('idtieto');
        $estado = $request->input('estado');
        $nombre = $request->input('nombre');

        $newdesc = Tieto::where('id', '=', $idtieto)->update(['desc' => $nombre]);
        

        
       // $productosused = Productosused::create();

       return redirect()->action([TietoController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tieto = Tieto::find($id);

        return view('tieto.show', compact('tieto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tieto = Tieto::find($id);

        return view('tieto.edit', compact('tieto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tieto $tieto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tieto $tieto)
    {
        request()->validate(Tieto::$rules);

        $tieto->update($request->all());

        return redirect()->route('tietos.index')
            ->with('success', 'Tieto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        
        $tieto = Tieto::find($id)->delete();

        return redirect()->route('tietos.index')
            ->with('success', 'Tieto deleted successfully');
    }
}
