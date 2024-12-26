<?php

namespace App\Http\Controllers;

use App\Models\Ingredientesactivosused;
use Illuminate\Http\Request;
use App\Models\Ingredientesactivo;
use App\Models\PreciosIng;



/**
 * Class IngredientesactivosusedController
 * @package App\Http\Controllers
 */
class IngredientesactivosusedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredientesactivosuseds = Ingredientesactivosused::paginate();

        return view('ingredientesactivosused.index', compact('ingredientesactivosuseds'))
            ->with('i', (request()->input('page', 1) - 1) * $ingredientesactivosuseds->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingredientesactivosused = new Ingredientesactivosused();
        return view('ingredientesactivosused.create', compact('ingredientesactivosused'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingmother_ing_act_id = $request->input('ingmother_ing_act_id');
        $porcentaje = $request->input('porcentaje');
        $dosis = $request->input('dosis');
        $cult_ing_act_id = $request->input('cult_ing_act_id');
        $tieto_ing_act_use = $request->input('tieto_ing_act_use');
        $bb_ing_act_id = $request->input('bb_ing_act_id');
        $precio = $request->input('precio');

         
        $blanconame = Ingredientesactivo::where('id', '=', $ingmother_ing_act_id)->select('nombre')->get();

        foreach ($blanconame as $blanco) {
           $nane = $blanco->nombre;
       }

       

        $productosused = Ingredientesactivosused::create([
           'ingmother_ing_act_id' => $ingmother_ing_act_id,
           'porcentaje' => $porcentaje,
           'dosis' => $dosis,
           'cult_ing_act_id' => $cult_ing_act_id,
           'tieto_ing_act_use' => $tieto_ing_act_use,
           'bb_ing_act_id' => $bb_ing_act_id,
           'desc_ing_act_use' => $nane
      ]);


    //   $ingredientecreado = Ingredientesactivosused::select('id_ing_act_use')->limit(1)->orderBy('id_ing_act_use')
    //     ->get();

    //     foreach ($ingredientecreado as $ingrediente) {
    //         $idingused = $ingrediente->id_ing_act_use;
    //     }

    //     $preciosing = PreciosIng::create([
    //         'id_usu' => auth()->id(),
    //         'id_pre_ingused' => $idingused,
    //         'marca_comercial' => '',
    //         'Precio' => 0,
    //         'id_tieto' => $tieto_ing_act_use,
    //         'id_pre_ing' => $ingmother_ing_act_id,
    //         'id_pre_bb_use' => $bb_ing_act_id,
    //         'desc_pre_ing' => $nane
    //      ]);

       return redirect()->action([TietoController::class, 'create'] , ['idtieto' => $tieto_ing_act_use]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingredientesactivosused = Ingredientesactivosused::find($id);

        return view('ingredientesactivosused.show', compact('ingredientesactivosused'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $ingredientesactivosused = Ingredientesactivosused::find($id);
        $idtieto = $request->input('idtieto');

        return view('ingredientesactivosused.edit', compact('idtieto','ingredientesactivosused'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ingredientesactivosused $ingredientesactivosused
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredientesactivosused $ingredientesactivosused)
    {
        

        $ingredientesactivosused->update($request->except(['idtieto']));
        $idtieto = $request->input('idtieto');

        return redirect()->action([TietoController::class, 'create'] , ['idtieto' => $idtieto]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id,Request $request)
    {
        $idtieto = $request->input('idtieto');

        $cultivosused = Ingredientesactivosused::where('id_ing_act_use', '=', $id)->select('*')->delete();

        return redirect()->action([TietoController::class, 'create'] , ['idtieto' => $idtieto]);
    }
}
