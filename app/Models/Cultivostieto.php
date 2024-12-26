<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cultivostieto
 *
 * @property $id_cult_ti
 * @property $desc_cult_ti
 * @property $cultmother_cult_ti_id
 * @property $tieto_cult_ti_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Blancosbiologicostieto[] $blancosbiologicostietos
 * @property Cultivo $cultivo
 * @property Ingredientesactivosused[] $ingredientesactivosuseds
 * @property Tieto $tieto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cultivostieto extends Model
{
    
    static $rules = [
		'id_cult_ti' => 'required',
		'desc_cult_ti' => 'required',
		'cultmother_cult_ti_id' => 'required',
		'tieto_cult_ti_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_cult_ti','desc_cult_ti','cultmother_cult_ti_id','tieto_cult_ti_id','hectareas'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blancosbiologicostietos()
    {
        return $this->hasMany('App\Models\Blancosbiologicostieto', 'cultivo_bb_ti_id', 'id_cult_ti');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cultivo()
    {
        return $this->hasOne('App\Models\Cultivo', 'id', 'cultmother_cult_ti_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ingredientesactivosuseds()
    {
        return $this->hasMany('App\Models\Ingredientesactivosused', 'cult_ing_act_id', 'id_cult_ti');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tieto()
    {
        return $this->hasOne('App\Models\Tieto', 'id', 'tieto_cult_ti_id');
    }
    

}
