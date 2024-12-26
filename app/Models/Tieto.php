<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tieto
 *
 * @property $id
 * @property $desc
 * @property $estado
 * @property $id_usu
 * @property $created_at
 * @property $updated_at
 *
 * @property Blancosbiologicostieto[] $blancosbiologicostietos
 * @property Cultivostieto[] $cultivostietos
 * @property Ingredientesactivosused[] $ingredientesactivosuseds
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tieto extends Model
{
    
    static $rules = [
		'desc' => 'required',
		'estado' => 'required',
		'id_usu' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['desc','estado','id_usu'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blancosbiologicostietos()
    {
        return $this->hasMany('App\Models\Blancosbiologicostieto', 'tieto_bb_ti_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cultivostietos()
    {
        return $this->hasMany('App\Models\Cultivostieto', 'tieto_cult_ti_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ingredientesactivosuseds()
    {
        return $this->hasMany('App\Models\Ingredientesactivosused', 'tieto_ing_act_use', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_usu');
    }
    

}
