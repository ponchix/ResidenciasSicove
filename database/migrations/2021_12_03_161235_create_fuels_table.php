<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuels', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_carga');
            $table->time('hora_carga');
            $table->string('referencia_carga');
            $table->foreignId('proveedor')
            ->nullable()
            ->constrained('proveedors')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->foreignId('conductor')
            ->nullable()
            ->constrained('conductors')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->foreignId('tipo_combustible')
            ->nullable()
            ->constrained('type_fuels')
            ->nullOnDelete()
            ->cascadeOnUpdate();
            $table->foreignId('vehiculo')
            ->nullable()
            ->constrained('vehiculos')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->string('cantidad');
            $table->string('costo_uni');
            $table->string('total')->nullable();
            $table->string('odometro');
            $table->string('imagen_combustible');
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
        Schema::dropIfExists('fuels');
    }
}
