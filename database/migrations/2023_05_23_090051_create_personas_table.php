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
        Schema::create('personas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('alias')->nullable();
            $table->string('rfc')->nullable();
            $table->string('curp')->nullable();
            $table->string('fecha_nacimiento')->nullable();
            $table->string('estatura')->nullable();
            $table->string('celular')->nullable();
            $table->string('telefono')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('pais_nacimiento')->nullable();
            $table->string('lugar_nacimiento')->nullable();
            $table->string('estudios')->nullable();
            $table->string('ocupacion')->nullable();
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
        Schema::dropIfExists('personas');
    }
};
