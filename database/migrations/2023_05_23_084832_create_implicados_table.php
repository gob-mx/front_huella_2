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
        Schema::create('implicados', function (Blueprint $table) {
            $table->unsignedBigInteger('carpeta_investigacion_id')->nullable();
            $table->unsignedBigInteger('persona_id')->nullable();
            $table->unsignedInteger('tipo_implicado_id')->nullable();
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
        Schema::dropIfExists('implicados');
    }
};
