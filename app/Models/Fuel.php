<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    use HasFactory;
    protected $table="fuels";

    protected $fillable=[
        'fecha_carga',
        'hora_carga',
        'referencia_carga',
        'proveedor',
        'conductor',
        'tipo_combustible',
        'cantidad',
        'costo_uni',
        'total',
        'odometro',
        'vehiculo',
        'imagen_combustible'
    ];
    public function vehiculos(){
        return $this->belongsTo(VehiculoModel::class,'vehiculo');
    }

    public function proveedores(){
        return $this->belongsTo(proveedor::class,'proveedor');
    }

    public function conductores(){
        return $this->belongsTo(Conductor::class,'conductor');
    }
}
