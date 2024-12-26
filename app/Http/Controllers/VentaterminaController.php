<?php

namespace App\Http\Controllers;

use App\Models\Ventatermina;
use Illuminate\Http\Request;
use App\Models\Producto as producto; 
use App\Models\Cultivo as cultivo;
use App\Models\BlancosbiologicosUsed as bbused; 
use App\Models\CultivosUsed as culused;
use App\Models\Venta as venta;
use Illuminate\Validation\Rule;
use App\Http\Controllers\VentaController as ventacontroler;

/**
 * Class VentaterminaController
 * @package App\Http\Controllers
 */
class VentaterminaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventaterminas = Ventatermina::paginate();

        return view('ventatermina.index', compact('ventaterminas'))
            ->with('i', (request()->input('page', 1) - 1) * $ventaterminas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ventatermina = new Ventatermina();
        return view('ventatermina.create', compact('ventatermina'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Ventatermina::$rules);

        
        $desc = $request->input('desc');
        $id_venta = $request->input('id_venta');
        $estado = $request->input('estado');

        $newdesc = venta::where('id', '=', $id_venta)->update(['desc' => $desc]);


        $ventaexist = Ventatermina::where('id_venta', '=', $id_venta)->select('*')->count();


         if ($ventaexist == 0) {
            $new = Ventatermina::create([
                'id_venta' => $id_venta,
                'estado' => $estado
             ]);
         } else {
             $update = Ventatermina::where('id_venta', '=', $id_venta)->update(['estado' => $estado]);
         }
         
        

        
       // $productosused = Productosused::create();

       return redirect()->action([ventacontroler::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ventatermina = Ventatermina::find($id);

        return view('ventatermina.show', compact('ventatermina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ventatermina = Ventatermina::find($id);

        return view('ventatermina.edit', compact('ventatermina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ventatermina $ventatermina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ventatermina $ventatermina)
    {
        request()->validate(Ventatermina::$rules);

        $ventatermina->update($request->all());

        return redirect()->route('ventaterminas.index')
            ->with('success', 'Ventatermina updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ventatermina = Ventatermina::find($id)->delete();

        return redirect()->route('ventaterminas.index')
            ->with('success', 'Ventatermina deleted successfully');
    }
}
