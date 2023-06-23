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
        Schema::create('subject', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->binary('Template')->nullable();
            $table->bigInteger('SubjectId')->nullable();
            $table->string('GaleryId')->nullable();
            $table->string('FirstName')->nullable();
            $table->string('LastName')->nullable();
            $table->integer('YearOfBirth')->nullable();
            $table->string('GenderString')->nullable();
            $table->string('Country')->nullable();
            $table->string('City')->nullable();
            $table->binary('Thumbnail')->nullable();
            $table->binary('EnrollData')->nullable();
            $table->timestamps();
        });

        // once the table is created use a raw query to ALTER it and add the LONGBLOB
        DB::statement("ALTER TABLE subject MODIFY Template LONGBLOB");
        DB::statement("ALTER TABLE subject MODIFY Thumbnail LONGBLOB");
        DB::statement("ALTER TABLE subject MODIFY EnrollData LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject');
    }
};
