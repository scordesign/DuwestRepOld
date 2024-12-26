<?php

namespace App\Http\Controllers;

use App\Models\Productosused;
use Illuminate\Http\Request;
use App\Models\Producto as producto; 
use App\Models\Cultivo as cultivo;
use App\Models\BlancosbiologicosUsed as bbused; 
use App\Models\CultivosUsed as culused;
use App\Models\Venta as venta;
use Illuminate\Validation\Rule;
use App\Http\Controllers\VentaController as ventacontroler;
use App\Models\Productosxuser as Productosxusers;
 

/**
 * Class ProductosusedController
 * @package App\Http\Controllers
 */
class ProductosusedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productosuseds = Productosused::paginate();

        return view('productosused.index', compact('productosuseds'))
            ->with('i', (request()->input('page', 1) - 1) * $productosuseds->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productosused = new Productosused();
        return view('productosused.create', compact('productosused'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Productosused::$rules);

         $idventa = $request->input('producto_venta_id');
         $productos = $request->input('productos_prod_use');
         $produsname = producto::where('id', '=', $productos)->select('nombre')->get();
         $idusers = venta::where('id', '=', $idventa)->select('*')->get();

         foreach ($produsname as $produ) {
            $nane = $produ->nombre;
        }
        foreach ($idusers as $iduse) {
            $id_usu = $iduse->id_usu;
        }

        $borrar = Productosxusers::where('id_produc', '=', $productos)->where('id_usu', '=',$id_usu )->delete();


         $productosused = Productosused::create([
            'desc_prod_use' => $nane,
            'productos_prod_use' => $productos,
            'producto_venta_id' => $idventa

       ]);
        // $productosused = Productosused::create();

        return redirect()->action([ventacontroler::class, 'create'] , ['idventa' => $idventa]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productosused = Productosused::find($id);

        return view('productosused.show', compact('productosused'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productosused = Productosused::find($id);

        return view('productosused.edit', compact('productosused'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Productosused $productosused
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productosused $productosused)
    {
        request()->validate(Productosused::$rules);

        $productosused->update($request->all());

        return redirect()->route('productosuseds.index')
            ->with('success', 'Productosused updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $productosused = Productosused::find($id)->delete();

        return redirect()->route('productosuseds.index')
            ->with('success', 'Productosused deleted successfully');
    }
}
