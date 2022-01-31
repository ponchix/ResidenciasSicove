<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoVehiculo extends Model
{
    use HasFactory;
    protected $table = "tipo_vehiculos";
    protected $fillable=[
        'Nombre',
    ];

    public function vehiculos(){
        return $this->hasMany(VehiculoModel::class,'id');
    }
}
