<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusConductor extends Model
{
    use HasFactory;
    protected $table='estado_conductor';
    protected $fillable=[
        'status',
      ];
      public function conductorEstado(){
        return $this->hasMany(Conductor::class,'id');
    }
    }
