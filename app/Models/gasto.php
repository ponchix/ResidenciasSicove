<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gasto extends Model
{
    use HasFactory;
    protected $table = "gastos";
    protected $fillable=[
        'fecha',
        'concepto',
        'referencia',
        'monto',
        'vehiculo',
        'conductor',
        'proveedor',
    ];

    public function VehiculosG(){
        return $this->belongsTo(VehiculoModel::class,'vehiculo');
    }
    public function conductoresG(){
        return $this->belongsTo(Conductor::class,'conductor');
    }
}
