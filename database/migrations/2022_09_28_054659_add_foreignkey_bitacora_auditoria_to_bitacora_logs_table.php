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
        Schema::table('bitacora_logs', function (Blueprint $table) {
            //$table->foreign('bitacora_auditoria_id', 'fk_bitacora_logs_bitacora_auditoria_id')->references('id')->on('bitacora_auditoria')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bitacora_logs', function (Blueprint $table) {
            $table->dropForeign('fk_bitacora_logs_bitacora_auditoria_id');
        });
    }
};
