<?php

namespace App\Http\Controllers;

use App\models\Producto;
use App\models\Cultivo;

use Illuminate\Http\Request;

class nventacontroller extends Controller
{
    public function index()
    {
        $productos = DB::select('select * from productos');
        $cultivos = DB::select('select * from cultivos');

    }

    public function create()
    {
        $productos =Producto::pluck('nombre','id');
        $cultivos =Cultivo::pluck('nombre','id');



    }
}
