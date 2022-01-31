<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusMantenimiento extends Model
{
    use HasFactory;
    protected $table='estado_mantenimiento';
    protected $fillable=[
        'status',
      ];
      public function mantenimiento(){
        return $this->hasMany(mantenimiento::class,'id');
    }
}
