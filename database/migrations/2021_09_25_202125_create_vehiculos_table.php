<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
 $table->id();
            $table->string('NombreVehiculo');
            $table->foreignId('TipoVehiculo')
            ->nullable()
            ->constrained('tipo_vehiculos')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->foreignId('Marca')
            ->nullable()
            ->constrained('marcas')
            ->cascadeOnUpdate()
            ->nullOnDelete();  
            $table->foreignId('StatusInicial')
            ->default('2')
            ->nullable()
            ->constrained('estado')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();    
            $table->date('fecha_compra');    
            $table->string('Modelo');    
            $table->string('MedidaUso');    
            $table->string('MedidaCombustible');    
            $table->string('anio');    
            $table->string('CompaniaSeguros');
            $table->string('NoSerie');
            $table->string('PolizaSeguro');
            $table->string('Placa');
            $table->string('Color');
            $table->string('imagen');
            $table->string('combustible');
            $table->string('motor');          
            $table->string('cilindraje');          
            $table->string('cilindrada');          
            $table->date('fecha_poliza'); 
            $table->string('factura'); 

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculos');
    }
}
