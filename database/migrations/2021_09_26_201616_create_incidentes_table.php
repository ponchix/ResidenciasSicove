<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidentes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehiculo')
            ->nullable()
            ->constrained('vehiculos')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->foreignId('conductor')
            ->nullable()
            ->constrained('conductors')
            ->cascadeOnUpdate()
            ->nullOnDelete();;
            $table->date('Fecha_reporte');
            $table->string('descripcion');
            $table->string('importancia');
            $table->string('detallada');
            $table->string('foto');
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
        Schema::dropIfExists('incidentes');
    }
}
