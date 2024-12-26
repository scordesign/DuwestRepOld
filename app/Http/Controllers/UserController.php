<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Municipio as Municipio;
use App\Models\Municipiosuser as Municipiosuser;
use App\Models\Producto as producto; 
use App\Models\Productosxuser;
use App\Models\PreciosIng;
use App\Models\Ingredientesactivo;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();

        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $Municipios = Municipio::select('id','desc')
        ->get();
        return view('user.create', compact('user','Municipios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(User::$rules);

        $user = User::create($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        $productos = producto::select('id','nombre')
        ->get();

        $Municipios = Municipio::select('id','desc')
        ->get();




        $Municipiosusers = Municipiosuser::join('municipios', 'municipiosusers.id_muni', '=', 'municipios.id')->select('municipios.desc as desc','municipiosusers.id as id')->where("id_usu",$id)->get();


        $productosxuser = Productosxuser::join('productos', 'productosxusers.id_produc', '=', 'productos.id')->select('productos.nombre as nombre','productosxusers.id   as id')->where("id_usu",$id)->get();


        return view('user.edit', compact('user','productos','Municipios','Municipiosusers','productosxuser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate(User::$rules);

        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::where('id', '=', $id)->update(['estatus' => 0]);

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
