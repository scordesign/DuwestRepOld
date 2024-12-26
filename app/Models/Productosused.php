<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Productosused
 *
 * @property $id_prod_use
 * @property $desc_prod_use
 * @property $productos_prod_use
 * @property $producto_venta_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto $producto
 * @property Venta $venta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Productosused extends Model
{
    
    static $rules = [
		 
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_prod_use','desc_prod_use','productos_prod_use','producto_venta_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'productos_prod_use');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function venta()
    {
        return $this->hasOne('App\Models\Venta', 'id', 'producto_venta_id');
    }
    

}
