<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMantenimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mecanico')
            ->nullable()
            ->constrained('mecanicos')
            ->nullOnDelete()
            ->cascadeOnUpdate();
            $table->date('fecha_inicio');
            $table->date('fecha_alta')->nullable();
            $table->time('hora_entrada');
            $table->time('hora_alta')->nullable();
            $table->foreignId('vehiculo')
            ->nullable()
            ->constrained('vehiculos')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->float('odometro');
           // $table->string('servicios');
            $table->float('costo_partes');
            $table->float('mano_obra');
            $table->float('total');
            $table->string('referencia_man');
            $table->string('tipo_man');
            $table->foreignId('proveedor')
            ->nullable()
            ->constrained('proveedors')
            ->cascadeOnUpdate()
            ->nullOnDelete();;
            $table->string('comentario');
            $table->string('comentario_e')->nullable();
            $table->string('imagen_man');
            $table->foreignId('status')
            ->default('1')
            ->nullable()
            ->constrained('estado_mantenimiento')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();   ;
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
        Schema::dropIfExists('mantenimientos');
    }
}
