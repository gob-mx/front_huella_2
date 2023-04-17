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
        Schema::create('bitacora_auditoria', function (Blueprint $table) {
            $table->bigIncrements('id')->comments('Identificador del registro.');
            $table->json('session')->nullable()->comments('Sesión de la acción.');
            $table->string('client_ip', 30)->nullable()->comments('Ip de cliente que realiza la acción.');
            $table->string('url', 500)->comments('URL de la petición.');
            $table->string('path', 200)->comments('Ruta de de petición.');
            $table->string('method', 50)->nullable()->comments('Método ejecutado de la clase.');
            $table->json('data')->nullable()->comments('Datos recibidos en la petición.');
            $table->bigInteger('user_id')->nullable()->comments('Id de usuario que realiza la acción.');
            $table->string('user', 40)->nullable()->comments('Nombre de usuario que realiza la acción.');
            $table->string('action', 50)->nullable()->comments('Descripción de la acción realizada');
            $table->text('response')->nullable()->comments('Permite guardar opcionalmente la respuesta del registro.');
            $table->dateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacora_auditoria');
    }
};
