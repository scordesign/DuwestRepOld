<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Productosxuser
 *
 * @property $id
 * @property $id_usu
 * @property $id_produc
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto $producto
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Productosxuser extends Model
{
    
    static $rules = [
		'id_usu' => 'required',
		'id_produc' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_usu','id_produc'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'id_produc');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_usu');
    }
    

}
