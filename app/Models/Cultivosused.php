<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cultivosused
 *
 * @property $id_cult_use
 * @property $desc_cult_use
 * @property $participacion
 * @property $litros
 * @property $aplicaciones
 * @property $cultivos_cult_use
 * @property $cultivo_venta_id
 * @property $cultivo_prod_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Blancosbiologicosused[] $blancosbiologicosuseds
 * @property Cultivo $cultivo
 * @property Productosused $productosused
 * @property Venta $venta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cultivosused extends Model
{
    
    static $rules = [

    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_cult_use','desc_cult_use','participacion','litros','aplicaciones','cultivos_cult_use','cultivo_venta_id','cultivo_prod_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blancosbiologicosuseds()
    {
        return $this->hasMany('App\Models\Blancosbiologicosused', 'blancobiologico_cultivo_id', 'id_cult_use');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cultivo()
    {
        return $this->hasOne('App\Models\Cultivo', 'id', 'cultivos_cult_use');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function productosused()
    {
        return $this->hasOne('App\Models\Productosused', 'id_prod_use', 'cultivo_prod_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function venta()
    {
        return $this->hasOne('App\Models\Venta', 'id', 'cultivo_venta_id');
    }
    

}
