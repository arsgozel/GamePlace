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
        Schema::create('app_types', function (Blueprint $table) {
            $table->unsignedBigInteger('type_id')->index();
            $table->foreign('type_id')->references('id')->on('types')->cascadeOnDelete();
            $table->unsignedBigInteger('app_id')->index();
            $table->foreign('app_id')->references('id')->on('apps')->cascadeOnDelete();
            $table->primary(['app_id', 'type_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('app_types');
    }
};
