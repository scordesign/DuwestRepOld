<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class UsersExport implements FromView
{
    use Exportable;

    private $year;


public function view(): View
    {
       return view('exports.users',[
        'users' => User::get(),
        'productosxusers' => User::join('productosxusers', 'users.id', '=', 'productosxusers.id_usu')->join('productos', 'productosxusers.id_produc', '=', 'productos.id')->select('*')->get()
        ,'municipios' => User::join('municipiosusers', 'users.id', '=', 'municipiosusers.id_usu')->join('municipios', 'municipiosusers.id_muni', '=', 'municipios.id')->select('*')->get()
       ]);
       
    }

    // public function __construct($year){
    //     $this->year = $year;
    // }
//    use Exportable;

//     public function query()
//     {
//         return User::query()->whereYear('created_at', $this->year);
//     }
}
