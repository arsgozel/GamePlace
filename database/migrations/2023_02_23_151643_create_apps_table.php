<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('apps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_id')->index()->nullable();
            $table->foreign('type_id')->references('id')->on('types')->nullOnDelete();
            $table->unsignedBigInteger('age_rating_id')->index()->nullable();
            $table->foreign('age_rating_id')->references('id')->on('characteristic_values')->nullOnDelete();
            $table->unsignedBigInteger('language_id')->index()->nullable();
            $table->foreign('language_id')->references('id')->on('characteristic_values')->nullOnDelete();
            $table->string('name_tm');
            $table->string('name_en')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('slug');
            $table->string('image')->nullable();
            $table->unsignedInteger('downloads')->default(0);
            $table->unsignedInteger('size')->default(0);
            $table->unsignedInteger('rating')->default(0);
            $table->unsignedInteger('version')->default(0);
            $table->text('description')->nullable();
            $table->unsignedInteger('random')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('apps');
    }
};
