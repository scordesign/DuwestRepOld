<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cultivo
 *
 * @property $id
 * @property $cultivo
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cultivo extends Model
{
    
    static $rules = [
		'cultivo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cultivo'];



}
