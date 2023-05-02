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
        Schema::create('bitacora_logs', function (Blueprint $table) {
            $table->bigIncrements('id')->comments('Identificador del registro.');
            $table->string('class_info', 100)->nullable()->comments('Información de la clase.');
            $table->string('file', 200)->nullable()->comments('Archivo en que se origina el log.');
            $table->integer('line')->nullable()->comments('Número de línea.');
            $table->string('message', 2000)->nullable()->comments('Mensaje log.');
            $table->string('description', 200)->nullable()->comments('Descripción del log.');
            $table->string('type_log',15)->nullable()->comments('Tipo de log: critical|error|warning|info|debug')->index();
            $table->unsignedBigInteger('bitacora_auditoria_id')->nullable()->comments('Permite generar asociación con bitacora auditoria.');
            $table->dateTime('created_at')->comments('Información de creación del registro.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacora_logs');
    }
};
