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
        Schema::create('moduls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable()->unique();
            $table->string('acronym')->nullable()->unique();
            $table->boolean('active')->nullable()->default(1);
            $table->timestamps();

            $table->unique(['name', 'acronym']);
        });

        Schema::create('moduls_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('modul_id');

            $table->foreign('permission_id')
            ->references('id')
            ->on('permissions')
            ->onDelete('cascade');

            $table->foreign('modul_id')
            ->references('id')
            ->on('moduls')
            ->onDelete('cascade');

            $table->primary(['permission_id', 'modul_id'], 'moduls_permissions_permission_id_modul_id_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moduls');
        Schema::dropIfExists('moduls_permissions');
    }
};
