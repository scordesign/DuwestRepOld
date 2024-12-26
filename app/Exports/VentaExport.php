<?php

namespace App\Exports;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection; 
use App\Models\Ingredientesactivosused;
use App\Models\Blancosbiologico as blancosbiologicos; 
use App\Models\Cultivo as cultivo;
use App\Models\Ingredientesactivo as Ingredientesactivo;
use App\Models\Cultivostieto as Cultivostietos;
use App\Models\Blancosbiologicostieto as Blancosbiologicostieto;
use App\Http\Controllers\TietoController as TietoController;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
//use Maatwebsite\Excel\Concerns\FromQuery;
//use Maatwebsite\Excel\Concerns\Exportable;
//class VentaExport implements FromQuery

class VentaExport implements FromView
{
    use Exportable;
    
    /**
     *
    * @return \Illuminate\Database\Query\Builder
    */
    public function view(): View
    {
            return view('exports.venta', [
                'Venta' => Venta::join('users', 'ventas.id_usu', '=', 'users.id')->join('productosuseds', 'ventas.id', '=', 'productosuseds.producto_venta_id')->join('cultivosuseds', 'productosuseds.id_prod_use','=', 'cultivosuseds.cultivo_prod_id')->join('blancosbiologicosuseds', 'cultivosuseds.id_cult_use', '=', 'blancosbiologicosuseds.blancobiologico_cultivo_id')->get()
                ]);
    }
}
