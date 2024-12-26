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

use App\Models\PreciosIng;
use App\Models\Blancosbiologicostieto as Blancosbiologicostieto;
use App\Http\Controllers\TietoController as TietoController;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;


class IngredientesExport implements FromView
{
    use Exportable;
    
    /**
     *
    * @return \Illuminate\Database\Query\Builder
    */
    public function view(): View
    {
            return view('exports.ingredientes', [
                'precio' => PreciosIng::join('users', 'precios_ings.id_usu', '=', 'users.id')->get()
                
                ]);
    }
}