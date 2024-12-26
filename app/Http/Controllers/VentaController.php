<?php

namespace App\Http\Controllers;
use App\Models\Producto as producto; 
use App\Models\Cultivo as cultivo;
use App\Models\Blancosbiologico as blancosbiologicos; 
use App\Models\Blancosbiologicosused as bbused; 
use App\Models\Cultivosused as culused;
use App\Models\Productosused as prodused;
use App\Models\Venta as venta;
use App\Models\Productosxuser as Productosxuser;

use Illuminate\Http\Request;

/**
 * Class VentaController
 * @package App\Http\Controllers
 */
class VentaController extends Controller
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

        if ($rolusu=='admin'){

        $ventas = Venta::join('ventaterminas', 'ventas.id', '=', 'ventaterminas.id_venta')->join('users', 'ventas.id_usu', '=', 'users.id')->select('ventas.desc as desc','users.name as name','ventas.id as id','ventaterminas.estado as estado')->paginate();

        return view('venta.index', compact('ventas'))
            ->with('i', (request()->input('page', 1) - 1) * $ventas->perPage());
        }
        else{
            $ventas = Venta::join('ventaterminas', 'ventas.id', '=', 'ventaterminas.id_venta')->join('users', 'ventas.id_usu', '=', 'users.id')->select('ventas.desc as desc','users.name as name','ventas.id as id','ventaterminas.estado as estado')->where('ventas.id_usu', '=', $idusu)->paginate();

        return view('venta.index', compact('ventas'))
            ->with('i', (request()->input('page', 1) - 1) * $ventas->perPage());
        }
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $idusu = auth()->id();

        $idventas = $request->get('idventa');

        if ($idventas == 0) {
            $newventa = venta::create([
                'desc' => 'nueva factura',
                'id_usu' => $idusu 
           ]);

           $ventacreada = venta::select('id')->limit(1)->orderBy('id', 'desc')
        ->get();

        foreach ($ventacreada as $vencre) {
           $idventa = $vencre->id;
        }
        } else {
            $idventa = $idventas;
        }
        
        $ventacreada = venta::select('*')->where('id', '=', $idventa)
        ->get();

        $venta = new Venta();
        
        $blancosbiologicos = blancosbiologicos::select('id','blancobiologico')
        ->get();
        $cultivos = cultivo::select('id','cultivo')
        ->get();

        $productos = Productosxuser::join('productos', 'productosxusers.id_produc', '=', 'productos.id')->select('productos.nombre as nombre','productos.id  as id')->where("id_usu",$idusu)->get();



        // $bbuse = bbused::where('blancobiologico_venta_id', '=', $idventa)->select('*')
        // ->get();

        $bbusedcount = bbused::where('blancobiologico_venta_id', '=', $idventa)->select('*')
        ->count();
        
        $bbused = bbused::where('blancobiologico_venta_id', '=', $idventa)->select('*')
        ->get();

         $culused = culused::where('cultivo_venta_id', '=', $idventa)->select('*')
         ->get();

         $sumparticipacion = culused::where('cultivo_venta_id', '=', $idventa)->select('*')
         ->sum('participacion');

         $prodused = prodused::where('producto_venta_id', '=', $idventa)->select('*')
         ->get();

         $produsedcount = prodused::where('producto_venta_id', '=', $idventa)->select('*')->count();
         
        if ($produsedcount === 0) {
            $num = 0;
            $idprod =0;
        } else {
            foreach ($prodused as $produ) {
                $num = $produ->desc_prod_use;
                $idprod = $produ->id_prod_use;
            }
        }
        


        //  $culused = culused::select('*')
        //  ->get();

         return view('venta.create', compact('bbusedcount','ventacreada','venta','cultivos','productos','idventa','culused','prodused','num','idprod','blancosbiologicos','bbused','sumparticipacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Venta::$rules);

        $venta = Venta::create($request->all());

        return redirect()->route('ventas.index')
            ->with('success', 'Venta created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $ventacreada = venta::select('*')->where('id', '=', $id)
        ->get();

        

        // $bbuse = bbused::where('blancobiologico_venta_id', '=', $idventa)->select('*')
        // ->get();
        
         $bbused = bbused::where('blancobiologico_venta_id', '=', $id)->select('*')
         ->get();

         $culused = culused::where('cultivo_venta_id', '=', $id)->select('*')
         ->get();

         $sumparticipacion = culused::where('cultivo_venta_id', '=', $id)->select('*')
         ->sum('participacion');

         $prodused = prodused::where('producto_venta_id', '=', $id)->select('*')
         ->get();
         

        //  $culused = culused::select('*')
        //  ->get();

         return view('venta.show', compact('ventacreada','bbused','culused','sumparticipacion','prodused'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $venta = Venta::find($id);

        return view('venta.edit', compact('venta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        request()->validate(Venta::$rules);

        $venta->update($request->all());

        return redirect()->route('ventas.index')
            ->with('success', 'Venta updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $venta = Venta::find($id)->delete();

        return redirect()->route('ventas.index')
            ->with('success', 'Venta deleted successfully');
    }
}
