<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Blancosbiologico
 *
 * @property $id
 * @property $blancobiologico
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Blancosbiologico extends Model
{
    
    static $rules = [
		'blancobiologico' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['blancobiologico'];



}
