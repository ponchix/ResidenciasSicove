<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;
      public function marcas(){
        return $this->belongsTo(Marca::class,'id_marca');
    }
    protected $fillable=[
      'modelo',
      'id_marca',
    ];
    
}
