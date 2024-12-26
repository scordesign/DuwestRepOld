<?php

namespace App\Http\Controllers;

use App\Models\Municipiosuser;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController as UserController;

/**
 * Class MunicipiosuserController
 * @package App\Http\Controllers
 */
class MunicipiosuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipiosusers = Municipiosuser::paginate();

        return view('municipiosuser.index', compact('municipiosusers'))
            ->with('i', (request()->input('page', 1) - 1) * $municipiosusers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipiosuser = new Municipiosuser();
        return view('municipiosuser.create', compact('municipiosuser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_muni = $request->input('id_muni');
        $idusu = $request->input('id');

        $productosused = Municipiosuser::create([
           'id_muni' => $id_muni,
           'id_usu' => $idusu

      ]);
       // $productosused = Productosused::create();

       return redirect()->route('users.edit',$idusu);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $municipiosuser = Municipiosuser::find($id);

        return view('municipiosuser.show', compact('municipiosuser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $municipiosuser = Municipiosuser::find($id);

        return view('municipiosuser.edit', compact('municipiosuser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Municipiosuser $municipiosuser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Municipiosuser $municipiosuser)
    {
        request()->validate(Municipiosuser::$rules);

        $municipiosuser->update($request->all());

        return redirect()->route('municipiosusers.index')
            ->with('success', 'Municipiosuser updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id,Request $request)
    {
        $municipiosuser = Municipiosuser::find($id)->delete();
        $idusu = $request->input('id');

        return redirect()->route('users.edit',$idusu);
    }
}
