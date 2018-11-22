<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapacityModificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capacity_modifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date');
            $table->integer('inspection_center_id');
            $table->integer('p_7_00');
            $table->integer('p_7_15');
            $table->integer('p_7_30');
            $table->integer('p_7_45');
            $table->integer('p_8_00');
            $table->integer('p_8_15');
            $table->integer('p_8_30');
            $table->integer('p_8_45');
            $table->integer('p_9_00');
            $table->integer('p_9_15');
            $table->integer('p_9_30');
            $table->integer('p_9_45');
            $table->integer('p_10_00');
            $table->integer('p_10_15');
            $table->integer('p_10_30');
            $table->integer('p_10_45');
            $table->integer('p_11_00');
            $table->integer('p_11_15');
            $table->integer('p_11_30');
            $table->integer('p_11_45');
            $table->integer('p_12_00');
            $table->integer('p_12_15');
            $table->integer('p_12_30');
            $table->integer('p_12_45');
            $table->integer('p_13_00');
            $table->integer('p_13_15');
            $table->integer('p_13_30');
            $table->integer('p_13_45');
            $table->integer('p_14_00');
            $table->integer('p_14_15');
            $table->integer('p_14_30');
            $table->integer('p_14_45');
            $table->integer('p_15_00');
            $table->integer('p_15_15');
            $table->integer('p_15_30');
            $table->integer('p_15_45');
            $table->integer('p_16_00');
            $table->integer('p_16_15');
            $table->integer('p_16_30');
            $table->integer('p_16_45');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('capacity_modifications');
    }
}
