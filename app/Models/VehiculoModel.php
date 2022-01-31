<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiculoModel extends Model
{
  use HasFactory;
  protected $table = "vehiculos";
  protected $fillable = [
    'NombreVehiculo',
    'TipoVehiculo',
    'Marca',
    'StatusInicial',
    'fecha_compra',
    'Modelo',
    'MedidaUso',
    'MedidaCombustible',
    'anio',
    'Grupo',
    'CompaniaSeguros',
    'NoSerie',
    'PolizaSeguro',
    'Placa',
    'Color',
    'imagen',
    'combustible',
    'motor',
    'cilindraje',
    'cilindrada',
    'fecha_poliza',
    'factura',
  ];
  public function marcasVehiculo()
  {
    return $this->belongsTo(Marca::class, 'Marca');
  }
  public function modelosVehiculo()
  {
    return $this->belongsTo(Modelo::class, 'Modelo');
  }
  public function tiposVehiculo()
  {
    return $this->belongsTo(TipoVehiculo::class, 'TipoVehiculo');
  }
  //RRelacion con id foraneas
  public function incidentes()
  {
    return $this->hasMany(incidente::class, 'id');
  }
  public function gastos()
  {
    return $this->hasMany(gasto::class, 'id');
  }
  public function servicios()
  {
    return $this->hasMany(mantenimiento::class, 'id');
  }
  public function estadoVehiculo()
  {
    return $this->belongsTo(Status::class, 'StatusInicial');
  }

  public function asignaciones()
  {
    return $this->hasMany(assignment::class, 'id');
  }
  public function combustible()
  {
    return $this->hasMany(Fuel::class, 'id');
  }
}
