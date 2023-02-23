<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('app_characteristic_value', function (Blueprint $table) {
            $table->unsignedBigInteger('app_id')->index();
            $table->foreign('app_id')->references('id')->on('apps')->cascadeOnDelete();
            $table->unsignedBigInteger('characteristic_value_id')->index();
            $table->foreign('characteristic_value_id')->references('id')->on('characteristic_values')->cascadeOnDelete();
            $table->primary(['app_id', 'characteristic_value_id']);
            $table->unsignedInteger('sort_order')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_attribute_value');
    }
};
