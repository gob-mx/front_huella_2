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
        Schema::create('carpeta_investigacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('carpeta_investigacion')->nullable();
            $table->string('averiguacion_previa')->nullable();
            $table->text('delito')->nullable();
            $table->text('descripcion_delito')->nullable();
            $table->unsignedInteger('total_implicados')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamp('fecha_hechos')->nullable();
            $table->timestamp('fecha_registro')->nullable();
            $table->unsignedTinyInteger('estatus_investigacion_id')->nullable();

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
        Schema::dropIfExists('carpeta_investigacion');
    }
};
