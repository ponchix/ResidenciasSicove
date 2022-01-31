<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConductorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conductors', function (Blueprint $table) {
           $table->id();
            $table->string('imagen');
            $table->string('NombreConductor');
            // ->nullable()
            // ->constrained('users')
            // ->cascadeOnDelete()
            // ->cascadeOnUpdate();
            $table->string('APaterno');   
            $table->string('AMaterno');    
            $table->string('edad');    
            $table->string('direccion');       
            $table->string('telefono');   
            $table->string('NoLiciencia');    
            $table->string('fecha_exp');
            $table->string('tipoLicencia');
            $table->foreignId('status')
            ->default('2')
            ->nullable()
            ->constrained('estado_conductor')
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
        Schema::dropIfExists('conductors');
    }
}
