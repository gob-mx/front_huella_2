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
        Schema::create('expediente_biometrico', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo_delito')->nullable();
            $table->unsignedInteger('tipo_registro_id')->nullable();
            $table->string('tipo_policia')->nullable();
            $table->unsignedInteger('situacion_persona_id')->nullable();
            $table->text('informacion')->nullable();
            $table->unsignedInteger('peligrosidad_id')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->unsignedInteger('registros_nacionales_id')->nullable();
            $table->string('clave_identificacion_1')->nullable();
            $table->string('clave_identificacion_2')->nullable();
            $table->string('clave_identificacion_3')->nullable();
            $table->text('contacto_agencia')->nullable();
            $table->text('comentarios')->nullable();
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
        Schema::dropIfExists('expediente_biometrico');
    }
};
