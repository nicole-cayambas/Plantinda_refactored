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
        Schema::table('products', function (Blueprint $table) {
            $table->integer('rating')->nullable()->change();
            $table->integer('range_2_min')->nullable()->change();
            $table->integer('range_2_max')->nullable()->change();
            $table->integer('range_3_min')->nullable()->change();
            $table->integer('range_3_max')->nullable()->change();
            $table->integer('range_4_min')->nullable()->change();
            $table->integer('range_4_max')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('rating')->nullable(false)->change();
            $table->integer('range_2_min')->nullable(false)->change();
            $table->integer('range_2_max')->nullable(false)->change();
            $table->integer('range_3_min')->nullable(false)->change();
            $table->integer('range_3_max')->nullable(false)->change();
            $table->integer('range_4_min')->nullable(false)->change();
            $table->integer('range_4_max')->nullable(false)->change();
        });
    }
};
