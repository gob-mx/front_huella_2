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
        Schema::create('huellas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_dedo',30)->nullable();
            $table->string('ruta_imagen')->nullable();
            $table->binary('huella_dactilar')->nullable();
            $table->integer('notificada')->nullable();
            $table->unsignedBigInteger('persona_id')->nullable();
            $table->foreign("persona_id")->references("id")->on("personas")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });

        // once the table is created use a raw query to ALTER it and add the LONGBLOB
        DB::statement("ALTER TABLE huellas MODIFY huella_dactilar LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('huellas');
    }
};
