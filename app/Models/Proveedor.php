<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
     protected $fillable=[
        'NombreProveedor',
        'RFC',
        'TelefonoP',
        'Domicilio',
        'correoP',
        'nombreContacto',
        'TelefonoC',
        'correo',
       
      ];

      public function mantenimiento(){
        return $this->hasMany(mantenimiento::class,'id');
    }
    
    public function combustible(){
      return $this->hasMany(Fuel::class,'id');
  }
}
