<?php

namespace App\Http\Controllers;

use App\Models\PreciosIng;
use Illuminate\Http\Request;
use App\Models\Ingredientesactivosused;

/**
 * Class PreciosIngController
 * @package App\Http\Controllers
 */
class PreciosIngController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            $preciosIngs = Ingredientesactivosused::groupBy('ingmother_ing_act_id')->join('tietos', 'ingredientesactivosuseds.tieto_ing_act_use', '=', 'tietos.id')->where("id_usu","=", auth()->id())->paginate();
        
        

        return view('precios-ing.index', compact('preciosIngs'))
            ->with('i', (request()->input('page', 1) - 1) * $preciosIngs->perPage()); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $preciosIng = new PreciosIng();
        return view('precios-ing.create', compact('preciosIng'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $precio = $request->input('precio');
        $marca_comercial = $request->input('marca_comercial');
        $idingact = $request->input('idingact');
        $preciosIng = Ingredientesactivosused::where("ingmother_ing_act_id","=",$idingact)->get();
        foreach ($preciosIng as $precios) {
            $preciosings = PreciosIng::create([
                 'id_usu' => auth()->id(),
                 'id_pre_ingused' => $precios->id_ing_act_use,
                 'marca_comercial' => $marca_comercial,
                 'Precio' => $precio,
                 'id_tieto' => $precios->tieto_ing_act_use,
                 'id_pre_ing' =>$idingact,
                 'id_pre_bb_use' => $precios->bb_ing_act_id,
                 'desc_pre_ing' => $precios->desc_ing_act_use
              ]);
        }
        return redirect()->route('precios_ings.edit',$idingact)
            ->with('success', 'PreciosIng created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $preciosIng = PreciosIng::find($id);

        return view('precios-ing.show', compact('preciosIng'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $preciosIng = Ingredientesactivosused::where("ingmother_ing_act_id","=",$id)->get();
        $preciosIngredientes = PreciosIng::where("id_pre_ing","=",$id)->groupBy('marca_comercial')->get();

        return view('precios-ing.edit', compact('preciosIng','id','preciosIngredientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PreciosIng $preciosIng
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PreciosIng $preciosIng)
    {
        request()->validate(PreciosIng::$rules);

        $preciosIng->update($request->all());

        return redirect()->route('precios_ings.index')
            ->with('success', 'PreciosIng updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id,Request $request)
    {
        $marca = $request->input('marca');
        $preciosIng = PreciosIng::where("id_pre_ing","=",$id)->where("marca_comercial","=",$marca)->delete();

        return redirect()->route('precios_ings.edit',$id)
            ->with('success', 'PreciosIng deleted successfully');
    }
}
