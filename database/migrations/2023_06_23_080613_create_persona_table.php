<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('expediente_biometrico_id')->nullable();
            $table->bigInteger('subject_id')->nullable();
            $table->unsignedBigInteger('domicilio_id')->nullable();
            $table->string('nombre')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->unsignedInteger('sexo_id')->nullable();
            $table->unsignedInteger('estado_civil_id')->nullable();
            $table->string('curp')->nullable();
            $table->unsignedInteger('nacionalidad_id')->nullable();
            $table->string('pais_nacimiento')->nullable();
            $table->string('entidad_nacimiento')->nullable();
            $table->decimal('peso')->nullable();
            $table->decimal('estatura')->nullable();
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
        Schema::dropIfExists('persona');
    }
};
