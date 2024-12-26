<?php

namespace App\Http\Controllers;

use App\Models\Productosxuser;
use Illuminate\Http\Request;

/**
 * Class ProductosxuserController
 * @package App\Http\Controllers
 */
class ProductosxuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productosxusers = Productosxuser::paginate();

        return view('productosxuser.index', compact('productosxusers'))
            ->with('i', (request()->input('page', 1) - 1) * $productosxusers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productosxuser = new Productosxuser();
        return view('productosxuser.create', compact('productosxuser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_produc = $request->input('id_produc');
        $id_usu = $request->input('id');

        $productosused = Productosxuser::create([
           'id_produc' => $id_produc,
           'id_usu' => $id_usu

      ]);
       // $productosused = Productosused::create();

       return redirect()->route('users.edit',$id_usu);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productosxuser = Productosxuser::find($id);

        return view('productosxuser.show', compact('productosxuser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productosxuser = Productosxuser::find($id);

        return view('productosxuser.edit', compact('productosxuser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Productosxuser $productosxuser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productosxuser $productosxuser)
    {
        request()->validate(Productosxuser::$rules);

        $productosxuser->update($request->all());

        return redirect()->route('productosxusers.index')
            ->with('success', 'Productosxuser updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request,$id)
    {
        $productosxuser = Productosxuser::find($id)->delete();
        $idusu = $request->input('id');

        return redirect()->route('users.edit',$idusu);
    }
}
