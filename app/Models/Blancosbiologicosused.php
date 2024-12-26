<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Blancosbiologicosused
 *
 * @property $id_bb_use
 * @property $desc_bb_use
 * @property $blancobiologico_bb_use
 * @property $blancobiologico_venta_id
 * @property $blancobiologico_cultivo_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Blancosbiologico $blancosbiologico
 * @property Cultivosused $cultivosused
 * @property Venta $venta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Blancosbiologicosused extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_bb_use','desc_bb_use','blancobiologico_bb_use','blancobiologico_venta_id','blancobiologico_cultivo_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function blancosbiologico()
    {
        return $this->hasOne('App\Models\Blancosbiologico', 'id', 'blancobiologico_bb_use');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cultivosused()
    {
        return $this->hasOne('App\Models\Cultivosused', 'id_cult_use', 'blancobiologico_cultivo_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function venta()
    {
        return $this->hasOne('App\Models\Venta', 'id', 'blancobiologico_venta_id');
    }
    

}
