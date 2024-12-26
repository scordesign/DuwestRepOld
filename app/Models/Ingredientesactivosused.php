<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ingredientesactivosused
 *
 * @property $id_ing_act_use
 * @property $aplicaciones
 * @property $porcentaje
 * @property $desc_ing_act_use
 * @property $dosis
 * @property $tieto_ing_act_use
 * @property $ingmother_ing_act_id
 * @property $cult_ing_act_id
 * @property $bb_ing_act_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Blancosbiologicostieto $blancosbiologicostieto
 * @property Cultivostieto $cultivostieto
 * @property Ingredientesactivo $ingredientesactivo
 * @property Tieto $tieto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ingredientesactivosused extends Model
{
    
    static $rules = [

    ];

    protected $perPage = 20;
    protected $primaryKey = 'id_ing_act_use';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_ing_act_use','marcacomercial','precio','porcentaje','desc_ing_act_use','dosis','tieto_ing_act_use','ingmother_ing_act_id','cult_ing_act_id','bb_ing_act_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function blancosbiologicostieto()
    {
        return $this->hasOne('App\Models\Blancosbiologicostieto', 'id_bb_ti', 'bb_ing_act_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cultivostieto()
    {
        return $this->hasOne('App\Models\Cultivostieto', 'id_cult_ti', 'cult_ing_act_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ingredientesactivo()
    {
        return $this->hasOne('App\Models\Ingredientesactivo', 'id', 'ingmother_ing_act_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tieto()
    {
        return $this->hasOne('App\Models\Tieto', 'id', 'tieto_ing_act_use');
    }
    

}
