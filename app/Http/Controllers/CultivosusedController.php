<?php

namespace App\Http\Controllers;

use App\Models\Cultivosused;
use Illuminate\Http\Request;
use App\Models\Producto as producto; 
use App\Models\Cultivo as cultivo;
use App\Models\BlancosbiologicosUsed as bbused; 
use App\Models\CultivosUsed as culused;
use App\Models\Venta as venta;
use Illuminate\Validation\Rule;
use App\Http\Controllers\VentaController as ventacontroler;

/**
 * Class CultivosusedController
 * @package App\Http\Controllers
 */
class CultivosusedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cultivosuseds = Cultivosused::paginate();

        return view('cultivosused.index', compact('cultivosuseds'))
            ->with('i', (request()->input('page', 1) - 1) * $cultivosuseds->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cultivosused = new Cultivosused();
        return view('cultivosused.create', compact('cultivosused'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Cultivosused::$rules);

        $cultivo_venta_id = $request->input('cultivo_venta_id');
        $cultivo_prod_id = $request->input('cultivo_prod_id');
        $cultivos_cult_use = $request->input('cultivos');
        $participacion = $request->input('participacion');
        $litros = $request->input('litros');
        $aplicaciones = $request->input('aplicaciones');
        $cultusado = cultivo::where('id', '=', $cultivos_cult_use)->select('cultivo')->get();

        foreach ($cultusado as $cultus) {
           $desc_cult_use = $cultus->cultivo;
       }

        $productosused = Cultivosused::create([
           'desc_cult_use' => $desc_cult_use,
           'participacion' => $participacion,
           'litros' => $litros,
           'aplicaciones' => $aplicaciones,
           'cultivos_cult_use' => $cultivos_cult_use,
           'cultivo_venta_id' => $cultivo_venta_id,
           'cultivo_prod_id' => $cultivo_prod_id
           

      ]);
       return redirect()->action([ventacontroler::class, 'create'] , ['idventa' => $cultivo_venta_id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cultivosused = Cultivosused::find($id);

        return view('cultivosused.show', compact('cultivosused'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $cultivosuseds = Cultivosused::where('id_cult_use','=', $id)->select('*')->get();
        $idventas = $request->input('idventa');

        return view('cultivosused.edit', compact('cultivosuseds','idventas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cultivosused $cultivosused
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $idventas = $request->input('idventa');
        $id_cult_use = $request->input('id_cult_use');
        $participacion = $request->input('participacion');
        $litros = $request->input('litros');
        $aplicaciones = $request->input('aplicaciones');
        Cultivosused::where('id_cult_use','=', $id_cult_use)->update(['participacion' => $participacion]);
        Cultivosused::where('id_cult_use','=', $id_cult_use)->update(['aplicaciones' => $aplicaciones]);
        Cultivosused::where('id_cult_use','=', $id_cult_use)->update(['litros' => $litros]);

        return redirect()->action([ventacontroler::class, 'create'] , ['idventa' => $idventas]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id,Request $request)
    {
        $idventas = $request->input('idventa');

        $cultivosused = Cultivosused::where('id_cult_use', '=', $id)->select('*')->delete();

        return redirect()->action([ventacontroler::class, 'create'] , ['idventa' => $idventas]);
    }
}
