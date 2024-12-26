<?php

namespace App\Exports;
use App\Models\Tieto;
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
class TietoExport implements FromView

{
    use Exportable;
    
    /**
     *
    * @return \Illuminate\Database\Query\Builder
    */
    public function view(): View
    {
            return view('exports.tieto', [
                'tieto' => Tieto::join('users', 'tietos.id_usu', '=', 'users.id')->join('cultivostietos', 'tietos.id', '=', 'cultivostietos.tieto_cult_ti_id')->join('blancosbiologicostietos', 'cultivostietos.id_cult_ti', '=', 'blancosbiologicostietos.cultivo_bb_ti_id')->join('ingredientesactivosuseds', 'blancosbiologicostietos.id_bb_ti', '=', 'ingredientesactivosuseds.bb_ing_act_id')->select('*')->get()
                ]);
    }
}
