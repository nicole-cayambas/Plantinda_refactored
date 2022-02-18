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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->text('summary');
            $table->text('description');
            $table->integer('rating');
            $table->double('unit_price_1');
            $table->double('unit_price_2');
            $table->double('unit_price_3');
            $table->double('unit_price_4');
            $table->integer('range_1_min');
            $table->integer('range_1_max');
            $table->integer('range_2_min');
            $table->integer('range_2_max');
            $table->integer('range_3_min');
            $table->integer('range_3_max');
            $table->integer('range_4_min');
            $table->integer('range_4_max');
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
        Schema::dropIfExists('products');
    }
};
