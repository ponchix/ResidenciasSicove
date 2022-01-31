<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table='estado';
    protected $fillable=[
        'status',
      ];
      public function vehiculoEstado(){
        return $this->hasMany(VehiculoModel::class,'id');
    }
}
