<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ventatermina
 *
 * @property $id_ventatermina
 * @property $estado
 * @property $id_venta
 * @property $created_at
 * @property $updated_at
 *
 * @property Venta $venta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ventatermina extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_ventatermina','estado','id_venta'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function venta()
    {
        return $this->hasOne('App\Models\Venta', 'id', 'id_ventatermina');
    }
    

}
