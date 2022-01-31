<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMantenimientoServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimiento_service', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mantenimiento_id')
            ->nullable()
            ->constrained('mantenimientos')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('service_id')
            ->nullable()
            ->constrained('services')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
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
        Schema::dropIfExists('mantenimiento_service');
    }
}
