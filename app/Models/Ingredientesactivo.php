<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ingredientesactivo
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Ingredientesactivosused[] $ingredientesactivosuseds
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ingredientesactivo extends Model
{
    
    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ingredientesactivosuseds()
    {
        return $this->hasMany('App\Models\Ingredientesactivosused', 'ingmother_ing_act_id', 'id');
    }
    

}
