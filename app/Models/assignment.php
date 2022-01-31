<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assignment extends Model
{
    use HasFactory;
    protected $table="assignments";

    protected $fillable=[
        'conductor',
        'vehiculo',
        'fecha_a',
        'fecha_e',
        'odometro_a',
        'odometro_e',
        'combustible_a',
        'combustible_e',
        'status',

    ];
    

    public function vehiculos(){
        return $this->belongsTo(VehiculoModel::class,'vehiculo');
    }

    public function conductores(){
        return $this->belongsTo(Conductor::class,'conductor');
    }
    public function estado(){
        return $this->belongsTo(StatusAsignacion::class,'status');
      }
}
