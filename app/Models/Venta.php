<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Venta
 *
 * @property $id
 * @property $par
 * @property $litros
 * @property $desc
 * @property $aplicaciones
 * @property $id_usu
 * @property $created_at
 * @property $updated_at
 *
 * @property BlancosbiologicosUsed[] $blancosbiologicosUseds
 * @property CultivosUsed[] $cultivosUseds
 * @property ProductosUsed[] $productosUseds
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Venta extends Model
{
    
    static $rules = [
		'par' => 'required',
		'litros' => 'required',
		'desc' => 'required',
		'aplicaciones' => 'required',
		'id_usu' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['desc','id_usu'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blancosbiologicosUseds()
    {
        return $this->hasMany('App\Models\BlancosbiologicosUsed', 'blancobiologico_venta_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cultivosUseds()
    {
        return $this->hasMany('App\Models\CultivosUsed', 'cultivo_venta_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productosUseds()
    {
        return $this->hasMany('App\Models\ProductosUsed', 'producto_venta_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_usu');
    }
    

}
