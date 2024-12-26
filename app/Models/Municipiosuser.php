<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Municipiosuser
 *
 * @property $id
 * @property $id_usu
 * @property $id_muni
 * @property $created_at
 * @property $updated_at
 *
 * @property Municipio $municipio
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Municipiosuser extends Model
{
    
    static $rules = [
		'id_usu' => 'required',
		'id_muni' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_usu','id_muni'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function municipio()
    {
        return $this->hasOne('App\Models\Municipio', 'id', 'id_muni');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_usu');
    }
    

}
