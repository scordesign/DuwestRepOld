<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Blancosbiologicostieto
 *
 * @property $id_bb_ti
 * @property $desc_bb_ti
 * @property $cultivo_bb_ti_id
 * @property $bbmother_bb_ti_id
 * @property $tieto_bb_ti_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Blancosbiologico $blancosbiologico
 * @property Cultivostieto $cultivostieto
 * @property Ingredientesactivosused[] $ingredientesactivosuseds
 * @property Tieto $tieto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Blancosbiologicostieto extends Model
{
    
    static $rules = [

    ];

    protected $perPage = 20;
    protected $primaryKey = 'id_bb_ti';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['desc_bb_ti','id_bb_ti','incidencia','temp_aplica','num_apli','cultivo_bb_ti_id','bbmother_bb_ti_id','tieto_bb_ti_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function blancosbiologico()
    {
        return $this->hasOne('App\Models\Blancosbiologico', 'id', 'bbmother_bb_ti_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cultivostieto()
    {
        return $this->hasOne('App\Models\Cultivostieto', 'id_cult_ti', 'cultivo_bb_ti_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ingredientesactivosuseds()
    {
        return $this->hasMany('App\Models\Ingredientesactivosused', 'bb_ing_act_id', 'id_bb_ti');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tieto()
    {
        return $this->hasOne('App\Models\Tieto', 'id', 'tieto_bb_ti_id');
    }
    

}
