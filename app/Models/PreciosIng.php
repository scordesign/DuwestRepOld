<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PreciosIng
 *
 * @property $id
 * @property $id_usu
 * @property $marca_comercial
 * @property $Precio
 * @property $created_at
 * @property $updated_at
 * @property $id_tieto
 * @property $desc_pre_ing
 * @property $id_pre_ing
 * @property $id_pre_ingused
 *
 * @property Ingredientesactivo $ingredientesactivo
 * @property Ingredientesactivosused $ingredientesactivosused
 * @property Tieto $tieto
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PreciosIng extends Model
{
    
    static $rules = [
		'id_usu' => 'required',
		'marca_comercial' => 'required',
		'Precio' => 'required',
		'id_tieto' => 'required',
		'desc_pre_ing' => 'required',
		'id_pre_ingused' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_usu','marca_comercial','Precio','id_tieto','desc_pre_ing','id_pre_ing','id_pre_ingused','id_pre_bb_use'];

 
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ingredientesactivo()
    {
        return $this->hasOne('App\Models\Ingredientesactivo', 'id', 'id_pre_ing');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ingredientesactivosused()
    {
        return $this->hasOne('App\Models\Ingredientesactivosused', 'id_ing_act_use', 'id_pre_ingused');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tieto()
    {
        return $this->hasOne('App\Models\Tieto', 'id', 'id_tieto');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_usu');
    }
    

}
