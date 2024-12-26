<?php

namespace App\Http\Controllers;

use App\Models\Blancosbiologicosused;
use Illuminate\Http\Request;
use App\Models\Producto as producto; 
use App\Models\Cultivo as cultivo;
use App\Models\Blancosbiologico as blancosbiologicos; 
use App\Models\BlancosbiologicosUsed as bbused; 
use App\Models\CultivosUsed as culused;
use App\Models\Venta as venta;
use Illuminate\Validation\Rule;
use App\Http\Controllers\VentaController as ventacontroler;


/**
 * Class BlancosbiologicosusedController
 * @package App\Http\Controllers
 */
class BlancosbiologicosusedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blancosbiologicosuseds = Blancosbiologicosused::paginate();

        return view('blancosbiologicosused.index', compact('blancosbiologicosuseds'))
            ->with('i', (request()->input('page', 1) - 1) * $blancosbiologicosuseds->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blancosbiologicosused = new Blancosbiologicosused();
        return view('blancosbiologicosused.create', compact('blancosbiologicosused'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Blancosbiologicosused::$rules);

        $blancobiologico_venta_id = $request->input('blancobiologico_venta_id');
        $blancobiologico_cultivo_id = $request->input('blancobiologico_cultivo_id');
        $blancobiologico_bb_use = $request->input('blancobiologico_bb_use');
        $nombre = blancosbiologicos::where('id', '=', $blancobiologico_bb_use)->select('*')->get();

        foreach ($nombre as $blancobiologico) {
           $desc_bb_use = $blancobiologico->blancobiologico;
       }

        $productosused = Blancosbiologicosused::create([
           'blancobiologico_venta_id' => $blancobiologico_venta_id,
           'blancobiologico_cultivo_id' => $blancobiologico_cultivo_id,
           'blancobiologico_bb_use' => $blancobiologico_bb_use,
           'desc_bb_use' => $desc_bb_use
           
      ]);
       return redirect()->action([ventacontroler::class, 'create'] , ['idventa' => $blancobiologico_venta_id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blancosbiologicosused = Blancosbiologicosused::find($id);

        return view('blancosbiologicosused.show', compact('blancosbiologicosused'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blancosbiologicosused = Blancosbiologicosused::find($id);

        return view('blancosbiologicosused.edit', compact('blancosbiologicosused'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Blancosbiologicosused $blancosbiologicosused
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blancosbiologicosused $blancosbiologicosused)
    {
        request()->validate(Blancosbiologicosused::$rules);

        $blancosbiologicosused->update($request->all());

        return redirect()->route('blancosbiologicosuseds.index')
            ->with('success', 'Blancosbiologicosused updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id,Request $request)
    {
        $idventas = $request->input('idventa');

        $cultivosused = Blancosbiologicosused::where('id_bb_use', '=', $id)->select('*')->delete();

        return redirect()->action([ventacontroler::class, 'create'] , ['idventa' => $idventas]);

    }
}
