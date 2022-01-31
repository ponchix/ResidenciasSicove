<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusAsignacion extends Model
{
    use HasFactory;

    protected $table='estado_asignacion';
    protected $fillable=[
        'status',
      ];
      public function asignacionEstado(){
        return $this->hasMany(assignment::class,'id');
    }
}
