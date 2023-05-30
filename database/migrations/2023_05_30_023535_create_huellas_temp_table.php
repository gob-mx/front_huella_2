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
        Schema::create('huellas_temp', function (Blueprint $table) {
            $table->string("id", 40);
            $table->primary("id");
            $table->binary('imagen')->nullable();
            $table->binary('huella_dactilar')->nullable();
            $table->string('persona_id_numero', 30)->nullable();
            $table->string('nombre_dedo', 30)->nullable();
            $table->string('token_pc', 100)->nullable();
            $table->string('option', 30)->nullable();
            $table->string('nombre', 200)->nullable();
            $table->string('texto', 100)->nullable();
            $table->unsignedBigInteger('persona_id')->nullable();
            $table->foreign("persona_id")->references("id")->on("personas")->onDelete("cascade")->onUpdate("cascade");
            
            $table->timestamps();
        });
        // once the table is created use a raw query to ALTER it and add the LONGBLOB
        DB::statement("ALTER TABLE huellas_temp MODIFY huella_dactilar LONGBLOB");
        DB::statement("ALTER TABLE huellas_temp MODIFY imagen LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('huellas_temp');
    }
};
