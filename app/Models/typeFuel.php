<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TypeFuel
 *
 * @property $id
 * @property $tipo_combustible
 * @property $created_at
 * @property $updated_at
 *
 * @property Fuel[] $fuels
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TypeFuel extends Model
{
    
    static $rules = [
		'tipo_combustible' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_combustible'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fuels()
    {
        return $this->hasMany('App\Models\Fuel', 'tipo_combustible', 'id');
    }
    

}
